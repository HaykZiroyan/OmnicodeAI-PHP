<?php

// echo $_POST['text'];

$txt = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
$num = 0;

$mysql = new mysqli('127.0.0.1', 'root', 'root', 'commentsdb');

$mysql->query("INSERT INTO `comment` (`text`, `subCommentNum`) VALUES('$txt', '$num')");
header('Location: index.php');

?>