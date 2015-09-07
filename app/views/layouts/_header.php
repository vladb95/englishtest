<?php
include_once("_includes.php");
?>
<nav>
	<?if(!isset($_SESSION['login'])):?>
		<div class="nav-wrapper blue lighten-2">
		<a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li><a href="?action=login">Войти</a></li>
	        <li><a href="?action=singup">Регистрация</a></li>
	      </ul>
	      <ul class="side-nav" id="mobile-demo">
        	<li><a href="?action=login">Войти</a></li>
	        <li><a href="?action=singup">Регистрация</a></li>
     	  </ul>
	    </div>
	<?else:?><?/*Меню для админки*/?>
		<?if($_COOKIE['role']==md5("admingodasdfg")):?>
	    <div class="nav-wrapper">
	    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li><a href="?action=test">Тесты</a></li>
	        <li><a href="?action=result">Результаты</a></li>
	        <li><a href="?action=top">Toп пользователей </a></li>
	      </ul>
	      <ul class="side-nav" id="mobile-demo">
        	<li><a href="?action=test">Тесты</a></li>
	        <li><a href="?action=result">Результаты</a></li>
	       <li><a href="?action=top">Toп пользователей </a></li>
     	  </ul>
	    </div>
	    <?else:?><?/*Меню для юзера*/?>
	    <div class="nav-wrapper teal lighten-2">
	    <a href="#" data-activates="mobile-demo" class="button-collapse"><i class="material-icons">menu</i></a>
	      <ul id="nav-mobile" class="right hide-on-med-and-down">
	        <li><a href="?action=test">Тесты</a></li>
	        <li><a href="badges.html">Components</a></li>
	        <li><a href="collapsible.html">JavaScript</a></li>
	      </ul>
	      <ul class="side-nav" id="mobile-demo">
        	<li><a href="?action=test">Тесты</a></li>
	        <li><a href="badges.html">Components</a></li>
	        <li><a href="collapsible.html">JavaScript</a></li>
     	  </ul>
	    </div>
	    <?endif;?>
	<?endif;?>
  </nav>
