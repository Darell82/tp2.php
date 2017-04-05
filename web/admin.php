<?php
use Core\Auth\DBAuth;

define('ROOT', dirname(__DIR__));
require ROOT.'/app/App.php';
App::load();

if (isset($_GET['p'])) {
	$page = $_GET['p'];
}else{
	$page = "home";
}

$app = App::getInstance();
$auth = new DBAuth($app->getDb());

//connexion utilisateur via login.php
if ($_POST) {
	if (isset($_POST['username'], $_POST['password'])) {
		if ($auth->login($_POST['username'], $_POST['password'])) {
			//prevoir un message flash
		}else{
			header('location: index.php?p=login');
			exit();
		}
	}
}
//fin connexion utilisateur via login.php

if (!$auth->logged()) {
	$app->forbidden();
}

$connect = "Disconnect";

ob_start();
if ($page==='home') {
	require ROOT.'/pages/admin/index.php';
	/////suite pour clients
}
elseif ($page==='clients') {
	require ROOT.'/pages/admin/clients/index.php';
	/////detail clients
}elseif ($page==='clients.detail') {
		require ROOT.'/pages/admin/clients/detail.php';


}elseif ($page==='clients.add') {
	require ROOT.'/pages/admin/clients/add.php';

//credits
}
elseif ($page==='credits') {
	require ROOT.'/pages/admin/credits/index.php';


}elseif ($page==='credits.add') {
	require ROOT.'/pages/admin/credits/add.php';


	/////suite pour post
}
else{
	require ROOT.'/pages/errors/404.php';
}
$content = ob_get_clean();
require ROOT.'/pages/templates/default.php'; 