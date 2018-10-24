#!/bin/bash
wc -l data2.csv > tmp
sed -r 's/ .*//g' tmp > temp1
echo "1" > temp2
paste temp1 temp2 | awk '{print $1 - $2}' > tmp_setup.txt
rm tmp
rm temp1
rm temp2
sed -r 's/([A-Z])\ ([a-z])/\1\n\2/g' data2.csv > data_nameok.txt
sed -r 's/([a-z])\ ([0-9])/\1\n\2/g' data_nameok.txt > data_idok.txt
rm data_nameok.txt
sed -r 's/([0-9])\,([0-9])/\1\n\2/g' data_idok.txt > data_digit.txt
rm data_idok.txt
sed -r 's/([0-9])\,([0-9])/\1\n\2/g' data_digit.txt >> tmp_setup.txt
rm data_digit.txt
grep -o "," tmp_setup.txt | wc -l > wow.txt
cat tmp_setup.txt >> wow.txt
rm tmp_setup.txt
sed 's/,/\n/g' wow.txt > data_setup2.txt
rm wow.txt