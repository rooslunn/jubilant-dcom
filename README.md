#### Installation

```
composer install
cp .env.example .env

mysql> CREATE DATABASE dcom;
mysql> CREATE USER dcom IDENTIFIED BY 'dcom';
mysql> GRANT ALL ON dcom.* TO dcom;
```