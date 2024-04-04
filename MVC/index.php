<?php
session_start();

require_once('src/controllers/homepage.php');
require_once('src/controllers/post.php');
require_once('src/controllers/add_comment.php');
  
if (isset($_POST['send_con']))
{
    $login=$_POST['login'];
    $mdp=$_POST['mdp'];
    $mdphash=md5($mdp);
    $user=Test_connexion($login,$mdphash);
    if ($user==0)
    {
        echo "erreur login/mdp";
    }
    else 
    {
	    $_SESSION['login']=$login;
    }
}
if (isset($_POST['send_decon']))
{
   session_destroy();
   header("Refresh:0");
}


if (isset($_GET['action']) && $_GET['action'] !== '') {
	if ($_GET['action'] === 'post') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];

        	post($identifier);
    	} else {
        	echo 'Erreur : aucun identifiant de billet envoyé';

        	die;
    	}
	}
    elseif ($_GET['action'] === 'addComment') {
    	if (isset($_GET['id']) && $_GET['id'] > 0) {
        	$identifier = $_GET['id'];

        	addComment($identifier, $_POST);
    	} else {
        	echo 'Erreur : aucun identifiant de billet envoyé';

        	die;
    	}
    }
    else {
    	echo "Erreur 404 : la page que vous recherchez n'existe pas.";
	}
} else {
	homepage();
}
?>