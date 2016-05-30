<html>
<head>
<title>Todo list</title>
</head>
<body>
<?php

$link = mysql_connect('localhost', 'testuser', 'testuser');
if (!$link) {
    die('接続失敗です。'.mysql_error());
}

$db_selected = mysql_select_db('ToDolist', $link);
if (!$db_selected){
    die('データベース選択失敗です。'.mysql_error());
}

mysql_set_charset('utf8');

if(isset($_GET['add'])){
  $sql = "INSERT INTO todo (name) VALUES (テキストフィールドのやつ)";
  $result_flag = mysql_query($sql);
}
else if(isset($_GET['delete'])){
  $sql = sprintf("DELETE FROM todo WHERE id = 消したい行列の番号"
         , quote_smart($id));

$result_flag = mysql_query($sql);

if (!$result_flag) {
    die('DELETEクエリーが失敗しました。'.mysql_error());
}
}

//select的な
$result = mysql_query('SELECT id,name FROM todo');
if (!$result) {
    die('SELECTクエリーが失敗しました。'.mysql_error());
}
while ($row = mysql_fetch_assoc($result)) {
    print('<p>');
    print('id='.$row['id']);
    print(',name='.$row['name']);
    print('</p>');
}

$close_flag = mysql_close($link);
if ($close_flag){
    print('<p>切断に成功しました。</p>');
}

?>
</body>
</html>
