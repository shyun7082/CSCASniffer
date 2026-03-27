#include "zutil.h"
#include <stdio.h>
#include <stdlib.h>
#include <string.h>

#include <gcrypt.h>
#define NEED_LIBGCRYPT_VERSION "1.6.5"

#define TYPE_INPUT 1
#define TYPE_SECRET 2

const char *const marker_secret = "BPBPBPB";
const char *const marker_input = "TGTGTGT";

const char *const marker_secret_start = "BPBPBPB{";
const char *const marker_secret_end = "BPBPBPB}";
const char *const marker_input_start = "TGTGTGT{";
const char *const marker_input_end = "TGTGTGT}";

char *read_file(char *filename, long *fsize)
{
    FILE *f = fopen(filename, "rb");
    fseek(f, 0, SEEK_END);
    *fsize = ftell(f);
    fseek(f, 0, SEEK_SET);

    char *string = (char *)malloc(*fsize + 1);
    fread(string, 1, *fsize, f);
    fclose(f);

    string[*fsize] = '\0';

    return string;
}

typedef struct
{
    int *arr;
    size_t len, cap;
} vector;

vector *new_vec()
{
    vector *v = (vector *)malloc(sizeof(vector));
    v->len = 0;
    v->cap = 1000;
    v->arr = (int *)malloc(sizeof(int) * v->cap);

    return v;
}

void push_vec(vector *v, int val)
{
    if (v->len == v->cap)
    {
        v->cap *= 2;
        v->arr = (int *)realloc(v->arr, sizeof(int) * v->cap);
    }
    v->arr[v->len++] = val;
}

void print_brs(char *filename, vector *brs)
{
    FILE *fp = fopen(filename, "w");
    size_t i;

    if (brs->len == 0)
    {
        fprintf(fp, "0,0");
    }
    else
    {
        for (i = 0; i < brs->len; i++)
        {
            if (i == 0)
            {
                fprintf(fp, "%d", brs->arr[i]);
            }
            else
            {
                fprintf(fp, ",%d", brs->arr[i]);
            }
        }
    }
    fclose(fp);
}

size_t write_file(void *buf, char *fname, char *mode, size_t size, size_t n) {
    FILE *fp = fopen(fname, mode);
    if (fp == NULL)
    {
        printf("file open error\n");
        exit(1);
    }

    size_t count = fwrite(buf, size, n, fp);
    //printf("count=%d\n", count);

    fclose(fp);

    return count;
}

void foo(char *in_buf, long len, char *filename) {
    char *last = in_buf;
    char *in_buf_end = in_buf + len;
    char *out_buf = (char *)malloc(sizeof(char) * len);

    unsigned short *next_secret = (unsigned short *)malloc(sizeof(unsigned short) * len);
    unsigned short *next_userinput = (unsigned short *)malloc(sizeof(unsigned short) * len);
    //printf("sizeof(next_secret)=%ld, sizeof(next_userinput)=%ld\n", sizeof(next_secret), sizeof(next_userinput));   

    char *cur_secret_start, *cur_userinput_start, *cur_taint_start, *cur_taint_end;
    short cur_taint_type = 0; // 1: secret, 2: user input

    unsigned int i = 0;

    while (last < in_buf_end) {
        cur_secret_start = strstr(last, marker_secret_start);
        cur_userinput_start = strstr(last, marker_input_start);

        if (cur_secret_start == NULL) {
            cur_secret_start = in_buf_end;
        }
        if (cur_userinput_start == NULL) {
            cur_userinput_start = in_buf_end;
        }

        cur_taint_start = (cur_secret_start < cur_userinput_start) ? cur_secret_start : cur_userinput_start;
        cur_taint_type = (cur_secret_start < cur_userinput_start) ? 1 : 2;

        while (last < cur_taint_start) {
            next_secret[i] = ((cur_secret_start - last) > MAX_MATCH) ? MAX_MATCH : (cur_secret_start - last);
            next_userinput[i] = ((cur_userinput_start - last) > MAX_MATCH) ? MAX_MATCH : (cur_userinput_start - last);
            out_buf[i] = *last;
            // if (i > 7346 && i < 7562) {
            //     printf("out_buf[%d]=%c\n", i, out_buf[i]);
            // }
            i++;
            last++;
        }

        if (last < in_buf_end) {
            last += strlen(marker_secret_start);

            if (cur_taint_type == 1) {
                cur_taint_end = strstr(last, marker_secret_end);
            } else if (cur_taint_type == 2) {
                cur_taint_end = strstr(last, marker_input_end);
            } else {
                printf("invalid cur_taint_type %d\n", cur_taint_type);
                exit(1);
            }

            if (cur_taint_end == NULL) {
                printf("invalid cur_taint_end\n");
                exit(1);
            }

            while (last < cur_taint_end) {
                if (cur_taint_type == 1) {
                    next_secret[i] = 0;
                    next_userinput[i] = ((cur_userinput_start - last) > MAX_MATCH) ? MAX_MATCH : (cur_userinput_start - last);
                } else {
                    next_secret[i] = ((cur_secret_start - last) > MAX_MATCH) ? MAX_MATCH : (cur_secret_start - last);
                    next_userinput[i] = 0;
                }

                out_buf[i] = *last;
                i++;
                last++;
            }

            last += strlen(marker_secret_end);
        }
    }

    // To print out the secret data size of each webpage
    unsigned int secret_size = 0;
    for (int j=0; j<i; j++) {
        if (next_secret[j] == 0) {
            ++secret_size;
        }
    }
    printf("%d", secret_size); // to print out the secret data size of each webpage

    // for (int j=0; j<i; j++) {
    //     printf("%d,", next_secret[j]);
    // }
    // printf("\n\n");

    // for (int j=0; j<i; j++) {
    //     printf("%d,", next_userinput[j]);
    // }
    // printf("\n\n");

    //printf("web page size1=%d\n", i);

    /**
     * write next_secret[] to brs_secret file
     */
    size_t result = write_file(next_secret, "brs_secret", "wb", sizeof(unsigned short), i);
    

    /**
     * write next_userinput[] to brs_input file
     */
    result = write_file(next_userinput, "brs_input", "wb", sizeof(unsigned short), i);

    /**
     * write out_buf to argv[1].nomarkers file
     */
    result = write_file(out_buf, filename, "wb", sizeof(char), i);

    free(out_buf);
    free(next_userinput);
    free(next_secret);
}

void verify_brs_secret() {
    FILE *in_fp = fopen("shyun_brs_secret", "rb");
    if (in_fp == NULL)
    {
        printf("file open error\n");
        exit(1);
    }

    fseek(in_fp, 0, SEEK_END);
    long file_size = ftell(in_fp);
    fseek(in_fp, 0, SEEK_SET);
    printf("file_size=%ld\n", file_size);

    unsigned short *read_next_secret = (unsigned short *)malloc(file_size);

    size_t read_count = fread(read_next_secret, file_size, 1, in_fp);

    fclose(in_fp);

    if (file_size % sizeof(unsigned short) != 0) {
        printf("invalid file_size %ld\n", file_size);
        exit(1);
    }

    unsigned int len = file_size / sizeof(unsigned short);
    printf("next_secret len = %d\n", len);

    for (int kk=0; kk<len; kk++) {
        printf("%d\n", read_next_secret[kk]);
    }

    unsigned int *brs = (unsigned int *)malloc(sizeof(unsigned int) * len);

    unsigned int index = 0, j = 0;
    while (index < len) {
        while (read_next_secret[index] > 0) {
            index++;
        }

        if (index < len) {
            brs[j++] = index;
            while (read_next_secret[index] == 0) {
                index++;
            }
            brs[j++] = index - 1;
        }
    }

    if (j == 0) {
        brs[j++] = 0;
        brs[j++] = 1;
    }
    printf("brs len = %d\n", j);

    FILE *out_fp = fopen("shyun_brs", "w");
    if (out_fp == NULL) {
        printf("file open error\n");
        exit(1);
    }

    for (int k=0; k<j; k++) {
        if (k == 0) {
            fprintf(out_fp, "%d", brs[k]);
        } else {
            fprintf(out_fp, ",%d", brs[k]);
        }
    }

    fclose(out_fp);

    free(read_next_secret);
    free(brs);
}

void verify_brs_secret2(unsigned short *read_next_secret, unsigned int len) {
    unsigned int *brs = (unsigned int *)malloc(sizeof(unsigned int) * len);

    unsigned int index = 0, j = 0;
    while (index < len) {
        while (read_next_secret[index] > 0) {
            index++;
        }

        if (index < len) {
            brs[j++] = index;
            while (read_next_secret[index] == 0) {
                index++;
            }
            brs[j++] = index - 1;
        }
    }

    if (j == 0) {
        brs[j++] = 0;
        brs[j++] = 1;
    }
    printf("brs len = %d\n", j);

    FILE *out_fp = fopen("shyun_brs", "w");
    if (out_fp == NULL) {
        printf("file open error\n");
        exit(1);
    }

    for (int k=0; k<j; k++) {
        if (k == 0) {
            fprintf(out_fp, "%d", brs[k]);
        } else {
            fprintf(out_fp, ",%d", brs[k]);
        }
    }

    fclose(out_fp);

    free(read_next_secret);
    free(brs);
}

// #define MAX_MATCH 258
int main(int argc, char **argv)
{
    if (argc < 2)
    {
        printf("no file specified\n");
        return 1;
    }
    long fsize;
    char *in_buf = read_file(argv[1], &fsize);
    char *last = in_buf;

    // printf("fsize=%ld, in_buf[0]=%c, in_buf[1]=%c\n", fsize, in_buf[0], in_buf[1]);

    char output_filename[300] = "";
    strcat(output_filename, argv[1]);
    strcat(output_filename, ".nomarkers");

    foo(in_buf, fsize, output_filename);
    // verify_brs_secret();
}
