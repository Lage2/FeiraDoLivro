#!/bin/bash
echo -n "Enter the MySQL root passoword: "
read -s rootpw

db="use g00961_book; CREATE TABLE product_book (id INT(100) NOT NULL UNIQUE AUTO_INCREMENT, isbn char(13) NOT NULL, seller char(50) NOT NULL, price DECIMAL(10,2) NOT NULL, valid char(1), sold char(1), PRIMARY KEY (id), FOREIGN KEY (isbn) REFERENCES book(isbn));"

mysql -u root --password=$rootpw -e "$db"

if [ $? != "0" ]; then
 echo "[Error]: Table 'product_book' creation failed"
 exit 1
else
 echo "[SUCCESS]: Table 'product_book' created"
fi
