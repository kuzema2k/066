Encoding	

UTF-8
<?php

session_start();

$url = explode("/", $_SERVER["REQUEST_URI"]);
require_once("php/db.php");
require_once("php/classes/User.php");

if ($url[1] == "login") {
  $content = file_get_contents("pages/login.html");
} else if ($url[1] == "register") {
  $content = file_get_contents("pages/register.html");
} else if ($url[1] == "contact") {
  $content = file_get_contents("pages/contact.html");
} else if ($url[1] == "tracking") {
  $content = file_get_contents("pages/tracking-order.html");
} else if ($url[1] == "users") {
  require_once("pages/users/index.html");
} else if ($url[1] == "regUser") {
  echo User::addUser($_POST["name"], $_POST["lastname"], $_POST["email"], $_POST["pass"]);
} else if ($url[1] == "authUser") {
  echo User::authUser($_POST["email"], $_POST["pass"]);
} else if ($url[1] == "getUser") {
  echo User::getUser($_SESSION["id"]);
} else if ($url[1] == "getUsers") {
  echo User::getUsers();
} else if ($url[1] == "changeUser") {
  echo User::changeUser($_SESSION["id"], $_POST["value"], $_POST["item"]);
} else {
  $content = file_get_contents("pages/index.html");
}

if (!empty($content)) require_once("template.php");
