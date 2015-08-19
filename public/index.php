<?
session_start();
include("../app/views/layouts/_header.php");
include("../app/controllers/menuController.php");
$menu=new menuController();
include($menu->itemEvent());
?>