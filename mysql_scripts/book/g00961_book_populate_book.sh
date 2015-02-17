#!/bin/bash
echo -n "Enter the MySQL root passoword: "
read -s rootpw

db="use g00961_book; INSERT INTO book (isbn, name, author1) VALUES ('9789727221561', 'Linguagem C', 'Manuel Luís Damas'), ('9789727227563', 'Sistemas Operativos', 'José Alves Marques');"

mysql -u root --password=$rootpw -e "$db"

if [ $? != "0" ]; then
 echo "[Error]: Failed to drop table 'book'"
 exit 1
else
 echo "[SUCCESS] Table 'book' has been droped"
fi
