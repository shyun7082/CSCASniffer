# CSCASniffer

This is the repository for the method presented in the paper: "CSCASniffer: A Reliable Approach to Detecting Compression Side-Channel Attacks against Web Servers." This repository contains the implementation code of CSCASniffer and the datasets for tests.

## Usage

The following instructions were tested on 64-bit Ubuntu 24.04 LTS with Python 3 installed.

#### Running CSCASniffer on datasets

To run CSCASniffer on each dataset provided under the `datasets/` directory, use the following command.
We tested values of AttackThreshold ∈ {2, 3, 4} and LCSCountThreshold ∈ {4, 7, 10}.

```shell
python3 ./cscasniffer.py [AttackThreshold] [LCSCountThreshold] [dataset_directory_path] dataset
```

##### Example:
```shell
python3 ./cscasniffer.py 3 7 ./datasets/adminer/dataset1 dataset
```

#### Running CSCASniffer on individual web pages

To run CSCASniffer on each web page of a web application under the `pages/` directory, use the command below:

```shell
python3 ./cscasniffer.py [AttackThreshold] [LCSCountThreshold] ./pages/[application_ directory] page
```

##### Example:
```shell
python3 ./cscasniffer.py 3 7 ./pages/adminer page
```




## Author
- Sangwon Hyun (shyun@mju.ac.kr), Myongji University


