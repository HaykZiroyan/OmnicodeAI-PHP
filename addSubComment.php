<?php


$txt = filter_var(trim($_POST['text']), FILTER_SANITIZE_STRING);
$id = $_POST['commentId'];

$mysql = new mysqli('127.0.0.1', 'root', 'root', 'commentsDB');
$result = $mysql->query("SELECT `subCommentNum` FROM `comment` where `id` = $id");
while ($row = mysqli_fetch_assoc($result)) {
    $update = $row['subCommentNum'] + 1;
}

$mysql->query("INSERT INTO `subcomment`(`text`, `parent-id`) VALUES ('$txt','$id')");

$mysql->query("UPDATE `comment` SET `subCommentNum` = $update WHERE `id` = $id");

header('Location: index.php');

?>