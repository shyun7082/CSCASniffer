import sys
import pylcs
from dataclasses import dataclass
from datetime import datetime
import os
import re
import time


SECRET_OPEN = 'BPBPBPB{'
SECRET_CLOSE = 'BPBPBPB}'

@dataclass
class ObservedMatch:
    mStartIndex: int
    mMatchLength: int

@dataclass
class ObservedMatchCounter:
	mObservedMatch: ObservedMatch
	mMatchCount: int = 1

@dataclass
class TimeSuspiciousMonitor:
	lastUpdateTime: datetime
	numOfSuspicious: int = 0

# return the longest common substring between str1 and str2
def findLCSubstring(str1, str2):
	res = pylcs.lcs_string_idx(str1, str2)
	lcsFound = ''.join([str2[i] for i in res if i != -1])
	return lcsFound

def extract_number(filename):
    numbers = re.findall(r'\d+', filename)
    return int(numbers[0]) if numbers else float('inf')


# minimum match length (=3) enforced in LZ77
minMatchLen = 3

thresholdForSuspisious = int(sys.argv[2]) # LCSCountThreshold
threshold2 = int(sys.argv[1]) # attackThreshold


secretMatchHistory = {}

listOfDetected = []


total_time = 0
experiment_type = sys.argv[4] # "dataset" or "page"


#
totalSecrets = []
main_folder = sys.argv[3]
items_in_main_folder = sorted(os.listdir(main_folder))
for item in items_in_main_folder:
    item_path = os.path.join(main_folder, item)

    if os.path.isdir(item_path):
        files_in_folder = sorted(os.listdir(item_path), key=extract_number)

        for file in files_in_folder:
            original = open(f"{main_folder}/{item}/{file}", "r").read()

            if experiment_type == "page":
                secretMatchHistory = {}
                totalSecrets = []

            # Extract the secret data and store separately
            listOfSecrets = []
            i = 0
            while i < len(original):
                secret_open_idx = original.find(SECRET_OPEN, i)
                if secret_open_idx == -1:
                    break

                secret_close_idx = original.find(SECRET_CLOSE, secret_open_idx + len(SECRET_OPEN))
                if secret_close_idx == -1:
                    break

                secret_element = original[secret_open_idx + len(SECRET_OPEN): secret_close_idx]
                totalSecrets.append(secret_element)
                if secret_element not in listOfSecrets:
                    listOfSecrets.append(secret_element)
                i = secret_close_idx + len(SECRET_CLOSE)

            start_time = time.time()

            for i in range(1, len(listOfSecrets)):
                currentString = listOfSecrets[i]

                bestMatch = ""
                bestLength = 0

                for j in range(i):
                    matchCandidate = listOfSecrets[j]

                    matchLength = pylcs.lcs_string_length(matchCandidate, currentString)

                    if (matchLength >= (minMatchLen - 1)) and (matchLength > bestLength):
                        bestLength = matchLength
                        bestMatch = matchCandidate

                if bool(bestMatch): # bestMatch is not empty string
                    longestCommonSubstring = findLCSubstring(bestMatch, currentString)

                    # the observed lcs between bestMatch and currentString is added into secretMatchHistory
                    if bestMatch in secretMatchHistory:
                        curObservedMatch = ObservedMatch(bestMatch.find(longestCommonSubstring), bestLength)

                        k = 1
                        while k < len(secretMatchHistory[bestMatch]):
                            if secretMatchHistory[bestMatch][k].mObservedMatch == curObservedMatch:
                                secretMatchHistory[bestMatch][k].mMatchCount += 1
                                if (secretMatchHistory[bestMatch][k].mMatchCount == thresholdForSuspisious) and (len(bestMatch) > bestLength):
                                    secretMatchHistory[bestMatch][0].numOfSuspicious += 1
                                    if secretMatchHistory[bestMatch][0].numOfSuspicious >= threshold2:
                                        if bestMatch not in listOfDetected:
                                            listOfDetected.append(bestMatch)
                                break
                            k += 1

                        if k == len(secretMatchHistory[bestMatch]): # curObservedMatch not in the list of secretMatchHistory[bestMatch]
                            secretMatchHistory[bestMatch].append(ObservedMatchCounter(curObservedMatch, 1))

                        secretMatchHistory[bestMatch][0].lastUpdateTime = datetime.now()
                        
                        if currentString in secretMatchHistory:
                            curObservedMatch = ObservedMatch(currentString.find(longestCommonSubstring), bestLength)

                            k = 1
                            while k < len(secretMatchHistory[currentString]):
                                if secretMatchHistory[currentString][k].mObservedMatch == curObservedMatch:
                                    secretMatchHistory[currentString][k].mMatchCount += 1
                                    if (secretMatchHistory[currentString][k].mMatchCount == thresholdForSuspisious) and (len(currentString) > bestLength):
                                        secretMatchHistory[currentString][0].numOfSuspicious += 1
                                        if secretMatchHistory[currentString][0].numOfSuspicious >= threshold2:
                                            if currentString not in listOfDetected:
                                                listOfDetected.append(currentString)
                                    break
                                k += 1

                            if k == len(secretMatchHistory[currentString]): # curObservedMatch not in the list of secretMatchHistory[currentString]
                                secretMatchHistory[currentString].append(ObservedMatchCounter(curObservedMatch, 1))

                            secretMatchHistory[currentString][0].lastUpdateTime = datetime.now()

                    elif currentString in secretMatchHistory:
                        curObservedMatch = ObservedMatch(currentString.find(longestCommonSubstring), bestLength)

                        k = 1
                        while k < len(secretMatchHistory[currentString]):
                            if secretMatchHistory[currentString][k].mObservedMatch == curObservedMatch:
                                secretMatchHistory[currentString][k].mMatchCount += 1
                                if (secretMatchHistory[currentString][k].mMatchCount == thresholdForSuspisious) and (len(currentString) > bestLength):
                                    secretMatchHistory[currentString][0].numOfSuspicious += 1
                                    if secretMatchHistory[currentString][0].numOfSuspicious >= threshold2:
                                        if currentString not in listOfDetected:
                                            listOfDetected.append(currentString)
                                break
                            k += 1

                        if k == len(secretMatchHistory[currentString]): # curObservedMatch not in the list of secretMatchHistory[currentString]
                            secretMatchHistory[currentString].append(ObservedMatchCounter(curObservedMatch, 1))

                        secretMatchHistory[currentString][0].lastUpdateTime = datetime.now()

                    else: # neither bestMatch nor currentString in secretMatchHistory
                        secretMatchHistory[bestMatch] = [TimeSuspiciousMonitor(datetime.now(), 0), ObservedMatchCounter(ObservedMatch(bestMatch.find(longestCommonSubstring), bestLength), 1)]
                        secretMatchHistory[currentString] = [TimeSuspiciousMonitor(datetime.now(), 0), ObservedMatchCounter(ObservedMatch(currentString.find(longestCommonSubstring), bestLength), 1)]



                else: pass # bestMatch is empty

            end_time = time.time()
            total_time += (end_time - start_time)

            if experiment_type == "page":
                print(f'Page file: {main_folder}/{item}/{file}, time taken: {end_time - start_time} sec')
                print(f'secretMatchHistory size: {sys.getsizeof(secretMatchHistory)}')

                print(f'NumOfSecrets: {len(totalSecrets)}')
                totalSizeOfSecrets = 0
                for e in totalSecrets:
                    totalSizeOfSecrets += len(e)
                print(f'TotalSizeOfSecrets: {totalSizeOfSecrets}\n')
                

start_time = time.time()
maxDistance = 3
refinedListOfDetected = []
for eachDetectedSecret in listOfDetected:
    refinedNumOfSuspicious = 0
    suspiciousMatch = []

    for k in range(1, len(secretMatchHistory[eachDetectedSecret])):
        if secretMatchHistory[eachDetectedSecret][k].mMatchCount >= thresholdForSuspisious:
            suspiciousMatch.append(secretMatchHistory[eachDetectedSecret][k].mObservedMatch)
    
    k = 0
    start_0 = suspiciousMatch[k].mStartIndex
    end_0 = suspiciousMatch[k].mStartIndex + suspiciousMatch[k].mMatchLength - 1
    isSuspicious = False
    for l in range(1, len(suspiciousMatch)):
        nextStart = suspiciousMatch[l].mStartIndex
        nextEnd = suspiciousMatch[l].mStartIndex + suspiciousMatch[l].mMatchLength - 1
        
        if (start_0 <= nextStart) and (nextStart <= (end_0 - minMatchLen + 2)) and ((end_0 < nextEnd) and ((nextEnd - end_0) < maxDistance)):
            isSuspicious = True
            break
        # else:
        #     isSuspicious = False
    
    if isSuspicious == True:
        refinedNumOfSuspicious += 1



    for k in range(1, len(suspiciousMatch)):
        currentStart = suspiciousMatch[k].mStartIndex
        currentEnd = suspiciousMatch[k].mStartIndex + suspiciousMatch[k].mMatchLength - 1
        isSuspicious = False        

        for l in range(k):
            previousStart = suspiciousMatch[l].mStartIndex
            previousEnd = suspiciousMatch[l].mStartIndex + suspiciousMatch[l].mMatchLength - 1
            
            if (previousStart <= currentStart) and (currentStart <= (previousEnd - minMatchLen + 2)) and ((previousEnd < currentEnd) and ((currentEnd-previousEnd) < maxDistance)):
                isSuspicious = True
                break
            # else:
            #     isSuspicious = False
        
        for l in range(k):
            previousStart = suspiciousMatch[l].mStartIndex
            previousEnd = suspiciousMatch[l].mStartIndex + suspiciousMatch[l].mMatchLength - 1
            
            if (previousStart <= currentStart) and (currentEnd <= previousEnd):
                isSuspicious = False
                break
        
        if isSuspicious == True:
            refinedNumOfSuspicious += 1

    if refinedNumOfSuspicious >= threshold2:
        refinedListOfDetected.append(eachDetectedSecret)

end_time = time.time()
total_time += (end_time - start_time)


if experiment_type == "dataset":
    print(f'ListOfDetected = {refinedListOfDetected}, total = {len(refinedListOfDetected)}')
    print("The size of the secretMatchHistory is {} bytes".format(sys.getsizeof(secretMatchHistory)))
    print(f'{total_time} sec taken')
    totalSizeOfSecrets = 0
    for e in totalSecrets:
        totalSizeOfSecrets += len(e)
    print(f'totalNumOfSecrets = {len(totalSecrets)}, totalSizeOfSecrets = {totalSizeOfSecrets}')


    

