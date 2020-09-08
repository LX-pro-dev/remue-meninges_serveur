<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Mon super site</title>
    </head>

    <body>

       <?php

       if(isset($_POST['password']))
       	{
       		$tentative = $_POST['password'];
       		if($tentative == 'kangourou'){
       			       		echo '<p>Voici le code secret pour tous les secrets : Mt5:3</p>';
       		}
       		else
       		{
       			echo '<p>Nice try !</p>';
       			echo '<p>Si tu veux retenter ta chance <a href="formulaire.php">clique ici</a> pour revenir à la page formulaire.php.</p>';

       		}
		}
		?>
    </body>

</html>