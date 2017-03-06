#!/bin/bash
while IFS='' read -r line || [[ -n $line ]]; do
python lexconvert.py --phones unicode-ipa $line >> phonemes.txt
done < "$1"
