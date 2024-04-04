<!DOCTYPE html>
<html>
   <head>
      <meta charset="utf-8" />
      <title><?= $title ?></title>
      <link href="style.css" rel="stylesheet" /> 
   </head>

   <body>

   <?php
 if (!isset($_SESSION['login']))
 {   ?>

   <form method="post">
   login <input type="text" name="login"><br>
   mot de passe <input type="text" name="mdp"><br>
    <input type="submit" name="send_con" value="ok"><br>
    </form>
 <?php
 }
 else
 {
     echo "Vous êtes connecté en tant que ".$_SESSION['login']."<br>";
     ?>
        <form method="post">
    <input type="submit" name="send_decon" value="DECONNEXION"><br>
    </form>

    
 <?php 
 } ?>
      <?= $content ?>
   </body>
</html>