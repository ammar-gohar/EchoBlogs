<?php

require_once "../db-connection.php";
require_once "../session.config.php";
require_once "../Controllers/commentController.php";
require_once "../Models/Comment.php";

if($_SERVER["REQUEST_METHOD"] !== "POST" || !isset($_SESSION["user"])){
  header("location: ../View/html/articles/index.php?slug=" . $_POST["slug"]);
  die();
};

if (isset($_POST["comment_del"]) && $_POST["comment_del"] === "true"){
  comment_deletion($connection, $_POST["comment_id"]);
  header("location: ../View/html/articles/index.php?slug=" . $_POST["post_slug"]);
  die();
};

$id = $_SESSION["user"]["id"];
$articleId = $_POST["post_id"];
$body = $_POST["body"];

if(isset($_POST["comment_id"])){
  $commentId = $_POST["comment_id"];
  add_reply($connection, $id, $articleId, $commentId,$body);
  header("location: ../View/html/articles/index.php?slug=" . $_POST["slug"]);
  die();
};

add_comment($connection, $id, $articleId, $body);
header("location: ../View/html/articles/index.php?slug=" . $_POST["slug"]);
die();

