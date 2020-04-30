<?php 

	session_start(); 
	

	if(isset($_SESSION['painel.php']) == true){

		header("Location: ./painel.php");

	}
?>

<!DOCTYPE html>
<html>

<head>
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="./css/bootstrap.min.css">
    <link href="./css/signin.css" rel="stylesheet">
    <link href="./css/bootstrap.min.css" rel="stylesheet">
</head>

<body class="text-center" style="margin-left:42%">
<form enctype="multipart/form-data" method="post" action="">
        <img class="mb-4" src="./assets/logovirtua.png" alt="" width="200" height="72">
        <h1 class="h3 mb-3 font-weight-normal"></h1>
        <label for="inputEmail" class="sr-only">Login</label>
        <input type="" id="inputEmail" name="inputUser"class="form-control" placeholder="Email address" required autofocus>
        <label for="inputPassword" class="sr-only">Senha</label>
        <input type="password" name="inputPassword" class="form-control" placeholder="Password" required>
        <button class="btn btn-lg btn-primary btn-block" id="btnLogin" name="loginButton" type="submit">Logar</button>
    </form>
    <script src="./jquery-3.5.0.js"></script>
    <script src="./js/bootstrap.min.js"></script>
    <script type="text/javascript" src="app.js"></script>
</body>

</html>
	
	<?php

		if(isset($_POST['loginButton'])){


            $default_user = "virtua";
            $user = $_POST['inputUser'];

			$default_password = "virtu@";
			$password = $_POST['inputPassword'];

			if($user == $default_user && $password == $default_password ){

                $_SESSION['inputUser'] = $user;
				$_SESSION['inputPassword'] = $password;
	
				header("Location: ./painel.php");

			}else{

    ?>
                 <script>
                   alert('Email ou senha inválidos!');
                 </script>    
    <?php
			}

		}

	?>

<?php 
	// session_start(); 


	// if(!isset($_SESSION['password']) == true){

	// 	unset($_SESSION['password']);
	// 	// header("Location: index.php");

    // }


?>