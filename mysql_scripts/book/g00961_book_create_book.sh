#!/bin/bash
echo -n "Enter the MySQL root passoword: "
read -s rootpw

db="use g00961_book; create table book (isbn char(13) NOT NULL UNIQUE, name VARCHAR(50) NOT NULL UNIQUE, author1 varchar(128), author2 varchar(128), PRIMARY KEY (isbn));"

mysql -u root --password=$rootpw -e "$db"


if [ $? != "0" ]; then
 echo "[Error]: Table 'book' creation failed"
 exit 1
else
 echo "[SUCCESS]: Table 'book' created successfully"
fi
