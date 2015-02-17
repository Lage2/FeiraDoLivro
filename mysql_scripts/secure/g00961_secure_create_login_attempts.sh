#!/bin/bash
echo -n "Enter the MySQL root passoword: "
read -s rootpw

db="use g00961_secure; create table login_attempts (user_id INT(11) UNSIGNED NOT NULL, time TIMESTAMP NOT NULL ON UPDATE CURRENT_TIMESTAMP, PRIMARY KEY (user_id));" 
mysql -u root --password=$rootpw -e "$db"


if [ $? != "0" ]; then
 echo "[Error]: Table 'login_attempts' creation failed"
 exit 1
else
 echo "[SUCCESS]: Table 'login_attemps' created successfully"
fi
