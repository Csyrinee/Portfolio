  <?php

  function dbconnect()
  {
      // Connexion à la base de données
      try
      {
          $database = new PDO('mysql:host=localhost;dbname=mvc;charset=utf8', 'root', '');
            return $database;
      }
      catch(Exception $e){
          die('Erreur : '.$e->getMessage());
      }

  }

  function createComment(string $post, string $author, string $comment)
{
	$database = dbConnect();
	$statement = $database->prepare(
    	'INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())'
	);
	$affectedLines = $statement->execute([$post, $author, $comment]);

	return ($affectedLines > 0);
}


  function getPosts()
  {
  // Connexion à la base de données
  $database=dbconnect();
      // On récupère les 5 derniers billets
      $statement = $database->query('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');
      $posts=[];
		while (($row = $statement->fetch())) {
			$post = [
                 'id' => $row['id'],
				'title' => $row['title'],
				'french_creation_date' => $row['date_creation_fr'],
				'content' => $row['content'],
			];

			$posts[] = $post;
		}
       return $posts;
      $statement->closeCursor();
  }




  function getComments($idpost)
  {
    // Connexion à la base de données
    $database=dbconnect();

      $statement = $database->prepare('
SELECT comments.id,user.login as authorName,comments.author as author, comment, 
DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS french_creation_date 
FROM comments,user 
WHERE comments.author=user.id 
AND post_id = ? 
ORDER BY comment_date DESC');
      $statement->execute([$idpost]);
      $comments=[];
		while (($row = $statement->fetch())) {
	  	$comment = [
        	'authorName' => $row['authorName'],
            'author' => $row['author'],
        	'french_creation_date' => $row['french_creation_date'],
        	'comment' => $row['comment'],
    	];

			$comments[] = $comment;
		}
       return $comments;
      $statement->closeCursor();
  }



  function getPost($id)
  {
  // Connexion à la base de données
  $database=dbconnect();
      // On récupère les 5 derniers billets
      $statement = $database->prepare('SELECT id, title, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS date_creation_fr FROM posts where id=?');
      $statement->execute([$id]);
      $row = $statement->fetch();
			$post = [
                'identifier' => $row['id'],
				'title' => $row['title'],
				'french_creation_date' => $row['date_creation_fr'],
				'content' => $row['content'],
			];

		
       return $post;
      $statement->closeCursor();
  }

  function Test_connexion($login,$mdp)
  {
      // Connexion à la base de données
        $database=dbconnect();
      // On récupère les 5 derniers billets
      $statement = $database->prepare('SELECT * FROM user 
    where login=?
    and mdp=?;');
      $statement->execute([$login,$mdp]);
      $post=0;
		while (($row = $statement->fetch())) {
            //echo "ok";
			$post = [
                 'id' => $row['id'],
				'nom' => $row['nom'],
				'prenom' => $row['prenom'],
				'login' => $row['login'],
                'email' => $row['email'],
                'mdp' => $row['mdp'],
			];
		}
       return $post;
      $statement->closeCursor();
  }


      ?>