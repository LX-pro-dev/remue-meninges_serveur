<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8"/>
        <title>Le super site secret des codes secret de la naza</title>
    </head>

    <body>
       <?php

       if(!isset($_POST['password']) OR $_POST['password']!='kangourou'){
       	?>
       	<form action="formulaire.php" method="POST">
            <p><label>Bonjour ! Entrer le mot de passe : <input type="password" name="password"></label></p>
            <p><input type="submit" /></p>          
        </form>
       <?php        		
       	}
       	else
       	{
       	?>
       		<p>Voici le code secret pour tous les secrets : Mt5:3</p>
       		<pre>
       			<?php 
       		  		print_r($_ENV);
				?>
			</pre>
		<?php
       	}
		?>
    </body>

</html>