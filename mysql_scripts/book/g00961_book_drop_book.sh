#!/bin/bash
echo -n "Enter the MySQL root passoword: "
read -s rootpw

db="use g00961_book; drop table if exists book;"

mysql -u root --password=$rootpw -e "$db"

if [ $? != "0" ]; then
 echo "[Error]: Failed to drop table 'book'"
 exit 1
else
 echo "[SUCCESS] Table 'book' has been droped"
fi
