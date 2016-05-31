<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Todo list</title>
</head>
<body>
  <h1>Todolist</h1>
  <form method="GET" >
  <table border ="１"　width="500" cellspacing="0" cellpadding="5" id="table1">
  <tr>
    <td><input type = "text"name="name"size="30"maxlength="20"></td>
    <td><input type="submit"value="add"></td>
  </tr>
</form>

  <table border ="2"  id="table2">
  <hr><br>
<?php
  $db = new PDO('mysql:host=localhost;dbname=Todolist;charset=utf8', 'root', '');
  $stt = $db ->prepare('SELECT * FROM todo');
  $stt->execute();
  while($row = $stt->fetch()){
 ?>
  <tr>
    <td class="task">
      <li name="name"
      size="10" maxlength="20"/>
      <?php print($row['name']) ?>
    </td>
    <td><input type="image" src="ico_ashcan1_9.gif" name="delete" alt="削除"></td>
  </tr>

<?php }?>

<?php

if(isset($_GET['add'])){
  $db = "INSERT INTO todo (name) VALUES (todoInput)";
  $stt = $db ->prepare('SELECT * FROM todo');
  $stt->execute();
}
else if(isset($_GET['delete'])){
  $sql = sprintf("DELETE FROM todo WHERE id = 消したい行列の番号"
         , quote_smart($id));

}


?>
</body>
</html>
