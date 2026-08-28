-- コマンドログ

-- ルートユーザーのパスワード設定は下記を参照した
-- https://www.javadrive.jp/xampp/mysql/index2.html#section1

-- -----------------------------------------------------------------------------------

C:\Users\XXX>cd ../../xampp/mysql/bin

-- -----------------------------------------------------------------------------------

C:\xampp\mysql\bin>mysqladmin -u root password
New password: ********
Confirm new password: ********

-- -----------------------------------------------------------------------------------

C:\xampp\mysql\bin>mysql -u root -p
Enter password: ********
Welcome to the MariaDB monitor.  Commands end with ; or \g.
Your MariaDB connection id is 9
Server version: 10.4.32-MariaDB mariadb.org binary distribution

Copyright (c) 2000, 2018, Oracle, MariaDB Corporation Ab and others.

Type 'help;' or '\h' for help. Type '\c' to clear the current input statement.

-- -----------------------------------------------------------------------------------

MariaDB [(none)]> CREATE DATABASE study CHARACTER SET utf8;
Query OK, 1 row affected (0.014 sec)

-- -----------------------------------------------------------------------------------

MariaDB [(none)]> SHOW DATABASES;
+--------------------+
| Database           |
+--------------------+
| information_schema |
| mysql              |
| performance_schema |
| phpmyadmin         |
| study              |
| test               |
+--------------------+
6 rows in set (0.043 sec)

-- -----------------------------------------------------------------------------------

MariaDB [(none)]> USE study
Database changed

-- -----------------------------------------------------------------------------------

MariaDB [study]> CREATE TABLE member (id INT PRIMARY KEY AUTO_INCREMENT,name VARCHAR(255) NOT NULL, sex CHAR(1) DEFAULT '男',old INT NOT NULL,enter DATE NOT NULL,memo VARCHAR(255) DEFAULT NULL);
Query OK, 0 rows affected (0.023 sec)

-- -----------------------------------------------------------------------------------

MariaDB [study]> SHOW FIELDS FROM member;
+-------+--------------+------+-----+---------+----------------+
| Field | Type         | Null | Key | Default | Extra          |
+-------+--------------+------+-----+---------+----------------+
| id    | int(11)      | NO   | PRI | NULL    | auto_increment |
| name  | varchar(255) | NO   |     | NULL    |                |
| sex   | char(1)      | YES  |     | 男      |                |
| old   | int(11)      | NO   |     | NULL    |                |
| enter | date         | NO   |     | NULL    |                |
| memo  | varchar(255) | YES  |     | NULL    |                |
+-------+--------------+------+-----+---------+----------------+
6 rows in set (0.029 sec)

-- -----------------------------------------------------------------------------------

MariaDB [study]> INSERT INTO member(id,name,sex,old,enter,memo) VALUES(1,'山田花子','女',55,2026-08-29,NULL);
Query OK, 1 row affected, 1 warning (0.053 sec)

-- -----------------------------------------------------------------------------------

MariaDB [study]> SELECT * FROM member;
+----+----------+------+-----+------------+------+
| id | name     | sex  | old | enter      | memo |
+----+----------+------+-----+------------+------+
|  1 | 山田花子 | 女   |  55 | 0000-00-00 | NULL |
+----+----------+------+-----+------------+------+
1 row in set (0.003 sec)

-- -----------------------------------------------------------------------------------

MariaDB [study]> INSERT INTO member(id,name,sex,old,enter,memo) VALUES(2,'佐藤小次郎','男',28,'2026-08-29',NULL);
Query OK, 1 row affected (0.007 sec)

-- -----------------------------------------------------------------------------------

MariaDB [study]> SELECT * FROM member;
+----+------------+------+-----+------------+------+
| id | name       | sex  | old | enter      | memo |
+----+------------+------+-----+------------+------+
|  1 | 山田花子   | 女   |  55 | 0000-00-00 | NULL |
|  2 | 佐藤小次郎 | 男   |  28 | 2026-08-29 | NULL |
+----+------------+------+-----+------------+------+
2 rows in set (0.004 sec)

-- -----------------------------------------------------------------------------------

MariaDB [study]> quit
Bye

-- -----------------------------------------------------------------------------------