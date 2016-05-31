SQL=/opt/lampp/bin/mysql

$SQL -u root -e "CREATE DATABASE Todolist DEFAULT CHARACTER SET utf8;"
$SQL -u root -e "CREATE TABLE Todolist.todo (id INT NOT NULL AUTO_INCREMENT, name TEXT, PRIMARY KEY(id));"
