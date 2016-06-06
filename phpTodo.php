<!DOCTYPE html>
<html lang="ja">
<head>
<meta charset="utf-8">
<title>Todo list</title>
</head>
<body>
  <h1>Todolist</h1>
  <form method="GET" action="./phpTodo.php">
  <table border="1"　width="500" cellspacing="0" cellpadding="5" id="table1">
  <tr>
    <td><input type="text" name="name" size="30" maxlength="20" required></td>
    <td>
      <input type="hidden" name="add" value="1">
      <input type="submit" value="add"></td>
  </tr>
</form>

  <table border ="2" id="table2">
  <hr><br>
  <?php
    $db = new PDO('mysql:host=localhost;dbname=Todolist;charset=utf8', 'root', '');
    if(isset($_GET['add'])){
      $stt = $db->prepare('INSERT INTO todo (name) VALUES (:name)');
      $stt->bindValue(':name', $_GET['name'], PDO::PARAM_STR);
      $stt->execute();
    }else if(isset($_GET['delete'])){
      $stt = $db->prepare('DELETE FROM todo WHERE id = :id');
      $stt->bindValue(':id', $_GET['id'], PDO::PARAM_INT);
      $stt->execute();
    }
  
    $stt = $db->prepare('SELECT * FROM todo');
    $stt->execute();
    while($row = $stt->fetch()){
  ?>
  <tr>
    <td class="task">
    <p><?php print($row['name']); ?></p>
    </td>
    <td>
      <form method="GET" action="./phpTodo.php?delete=1">
        <input type="image" src="ico_ashcan1_9.gif" name="delete" alt="削除">
        <input type="hidden" name="delete" value="1">
        <input type="hidden" name="id" value="<?php print($row['id']); ?>">
      </form>
    </td>
  </tr>

<?php } ?>
</body>
</html>
