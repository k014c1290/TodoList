<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="UTF-8"/>
<title>Todolist</title>

</head>

<body>

<?php

  $dsn = 'mysql:dbname=todolist;host=localhost;charset=UTF-8'
  $user = 'root'
  $password = 'root'
  $dbh = new PDO($dsn,$user,$password);
  $dbh->query('SET NAMES utf8');
  $dbh=>setAttribute(PDO::ATTR_EMULATE_PREPARES,false);

  if(isset($_GET['add'])){
    $item = $_GET['item'];
  }
  ?>

  <h1>Todolist</h1>
  <table border ="１"　width="500" cellspacing="0" cellpadding="5" id="table1">
  <tr>
    <td><input type = "text"name="name"size="30"maxlength="20"></td>
    <td><input type="button"value="add"></td>
  </tr>


  <table border ="2"  id="table2">
  <hr><br>
  <tr>
    <td class="task"><li name="name" value="" size="10" maxlength="20"/></td>
    <td><input type="image" src="ico_ashcan1_9.gif" name="delete" alt="削除"></td>
  </tr>

</body>

</html>

