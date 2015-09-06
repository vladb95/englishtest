<?
include '../app/controllers/adminController.php';
include '../app/controllers/helperController.php';
$admin=new adminController();
$helper=new helperController();
var_dump($admin->getTestsResult());
?>