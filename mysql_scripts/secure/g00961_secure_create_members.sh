#!/bin/bash
echo -n "Enter the MySQL root passoword: "
read -s rootpw

db="use g00961_secure; create table members (id INT(11) UNSIGNED NOT NULL UNIQUE AUTO_INCREMENT, username VARCHAR(30) NOT NULL UNIQUE, email VARCHAR(50) NOT NULL UNIQUE, password CHAR(128) NOT NULL, salt CHAR(128) NOT NULL, admin INT(1), PRIMARY KEY (id));" 
mysql -u root --password=$rootpw -e "$db"


if [ $? != "0" ]; then
 echo "[Error]: Table 'members' creation failed"
 exit 1
else
 echo "[SUCCESS]: Table 'members' created successfully"
fi
