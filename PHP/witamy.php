<?php

	session_start();
	
	if (!isset($_SESSION['udanarejestracja']))
	{
		header('Location: sphp.php');
		exit();
	}
	else
	{
		unset($_SESSION['udanarejestracja']);
	}
?>

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

<meta name="Keywords" content="BootStrap, StronaBoot, StronaTestowa" />

<meta name="Description" content="BootStrona, Strona główna" />

<meta name="viewport" content="width=device-width, initial-scale=1.0" />

 <meta name="viewport" content="width=device-width, initial-scale=1">

<title>PHP</title>

<link href="style/style_php.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">

</head>
	<body class="body">

	<header id="header">

	<div class="top-content container clearfix">

			<div id="top">

					<div class="Menus">

					<h3>Menu</h3>

                	<div id="header-menu-wrap">

                    	<nav id="menu-top">

                			<ul>

                            	<li><a href="index.html">JavaScript</a></li>

                                <li class="current-menu-item"><a href="sphp.php">PHP</a></li>

								<li><a href="jQuery.html">jQuery</a></li>

								<li><a href="AngularJs.html">AngularJs</a></li>

								<li><a href="less.html">Strona Less</a></li>

                            </ul>

							

                    	</nav>

                	</div>

					</div>

            </div>  

              	  

	    <div id="intro">

			<div class="intro-item">

            	<h3>Javascript</h3>

				<p>Przykładowe Skrypty javascript </br>| działanie </p>

            </div>

            <div class="intro-item">

            	<h3>PHP</h3>

				<p>Przykładowe Skrypty PHP </br>| działanie </p>

            </div>

            <div class="intro-item">

            	<h3>Skrypty</h3>

				<p>Systematycznie do strony będą dodawane nowe skrypty</p>

            </div>

		</div>

		<div id="lnb">

		<h1><a id="logo" href="index.html"><img src="img/logo2.png" alt=""></a></h1>

		</div>

	</div>

	</header>

	<div class="container clearfix">

		<?php
			 if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
			{	
				echo "<p id='login'>jesteś zalogowany </p>";
			} 
			else { 
					echo "<p id='login'> nie jesteś zalogowany </p>";
				 }	
		?>

			<div id="formula clearfix">				
			
				<div id="headtitle_php"><h2 style="color:#9baf00;">Witamy</h2></div>
				<p id="tekst_php"> Rejestracja przebiegła pomyślnie proszę się zalogować na stronie głównej.</p>				
				<a href="sphp.php" class="btnrejestracja">Zaloguj się na swoje konto</a> 

			</div>

	</div>
	<div class="footer">
	<label id="footer_label">Łukasz Bilnik strona do pokazywania działania przykładowych skryptów</label>
	</div>
	<?php
	if(isset($_SESSION['blad'])) 
	echo $_SESSION['blad'];

	?>

	</body>

</html>