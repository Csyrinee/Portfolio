<?php
// post.php
 
require_once('src/model.php');

function post (string $identifier)
{
    $post=getPost($identifier);
    $comments=getComments($identifier);
    require('templates/postpage.php');
}


?>