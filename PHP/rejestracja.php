<?php

	session_start();
	ini_set("display_errors", 0);
	if(isset($_POST['email']))
	{
		// Udana Walidacja? Załózmy, że tak
		$wszystko_OK=true;
		
		//Sorawdź poprawność nickname  Zmiena nick i przypisanie jej wartosci z formularza
		$nick = $_POST['nick'];
		
		//sprawdzenie długości nicka  walidacia nicka czy ma odpowiednia długośc
		if (strlen($nick)<3 || (strlen($nick)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick musi posiadać od 3 do 20 znaków";
		}

		if(ctype_alnum($nick)==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_nick']="Nick może składać się tylko z liter i cyfr (bez polskich znaków)";
		}
		
		// Sprawdź poprawnośc adresu email
		$email = $_POST['email'];
		$emailB = filter_var($email,FILTER_SANITIZE_EMAIL);     //filter_var(zmienna, filtr)
		
		if((filter_var($emailB, FILTER_VALIDATE_EMAIL)==false) || ($emailB!=$email))  //filtr sanityzujący usuwa niedozwolone znaki również polskie dlatego po || sprawdzamy czy to co zostało jest równe temu co uzytkownik wpisał
		{
			$wszystko_OK=false;
			$_SESSION['e_email']="Podaj poprawny adres email";
		}
		
		//Sorawdź poprawnośc hasła
		$haslo1 = $_POST['haslo1'];
		$haslo2 = $_POST['haslo2'];
		
		if (strlen($haslo1)<8 || (strlen($haslo1)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Hasło musi posiadać od 8 do 20 znaków!";
		}
		
		if($haslo1!=$haslo2)
		{
			$wszystko_OK=false;
			$_SESSION['e_haslo']="Podane hasła nie są identyczne";
		}
		
		$haslo_hash = password_hash($haslo1,PASSWORD_DEFAULT);
		
		//Czy zaakceptowano regulamin?
		if(!isset($_POST['regulamin']))
		{
			$wszystko_OK=false;
			$_SESSION['e_regulamin']="Potwierdź akceptację regulaminu";
		}
			//echo $_POST['regulamin']; exit(); sprawdzanie czy checkbox jest zaznaczony
		
		//BOT or NOT? recaptcha
		$sekret = "***********************************************";
		
		$sprawdz = file_get_contents('https://www.google.com/recaptcha/api/siteverify?secret='.$sekret.'&response='.$_POST['g-recaptcha-response']);
		
		$odpowiedz = json_decode($sprawdz);
		
		if($odpowiedz->success==false)
		{
			$wszystko_OK=false;
			$_SESSION['e_bot']="Powtwierdź że nie jesteś botem";
		}
		
		require_once "connection.php";
		
		mysqli_report(MYSQLI_REPORT_STRICT); //zamiast warningu wyrzucamy nasze zdefiniowane exceptions
		
		try
		{
			$polaczenie = new mysqli($host, $db_user, $db_password, $db_name);
			if ($polaczenie->connect_errno!=0)
			{
				throw new Exception(mysqli_connect_errno());
			}
			else
			{
				//czy email już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE email='$email'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_maili = $rezultat->num_rows;
				if($ile_takich_maili>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_email']="Istnieje już konto przypisane do tego adresu e-mail";
				}
				
				//czy login już istnieje?
				$rezultat = $polaczenie->query("SELECT id FROM uzytkownicy WHERE user='$nick'");
				
				if(!$rezultat) throw new Exception($polaczenie->error);
				
				$ile_takich_nickow = $rezultat->num_rows;
				if($ile_takich_nickow>0)
				{
					$wszystko_OK=false;
					$_SESSION['e_nick']="Istnieje już gracz o takim nicku! Wybierz inny";
				}

				//Sprawdzenie czy wszystkie powysze testy się powiodły
				if ($wszystko_OK==true)
					{
					   //Wszystkie testy zaliczone - dodajemy gracza
					   //echo "Udana walidacja!"; exit();	
						if($polaczenie->query("INSERT INTO uzytkownicy VALUES (NULL,'$nick','$haslo_hash','$email',100, 100, 100, 14)"))
						{	
							$_SESSION['udanarejestracja']=true;
							header('Location: witamy.php');
						}
						else
						{
							throw new Exception($polaczenie->error);
						}
					}
				
				$polaczenie->close();
			}				
		}
		catch(Exception $e)
		{
			echo '<span style="color:red;">Błąd servera! Przeproszamy za niedogodności i prosimy o rejestrację w innym terminie!</span>';
			//echo '<br />Informacja developerska: '.$e;   tylko w trybie developrskim
		}
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

<script src="https://www.google.com/recaptcha/api.js" async defer></script>

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
			else 
			{ 
				echo "<p id='login'> nie jesteś zalogowany </p>";
			}	
		?>

			<div id="formula clearfix">				
				
				<div id="headtitle_php"><h2 style="color:#9baf00;">Rejestracja</h2></div>

				<form method="post" class="form2 form-horizontal" name="login_form" id="form2">
				
					<label id="user"> Nickname: </label> <br /> <input type="text" name="nick" id="user" /><br />
					
					<?php
						//e_nick to error czyli nasza zmienna ustawiona w walidacj nicka jeżeli ona się pojawi to znaczy że użytkownik źle podał nick
						if(isset($_SESSION['e_nick']))
						{
							echo '<div class="error">'.$_SESSION['e_nick'].'</div>';
							unset($_SESSION['e_nick']);
						}
						
						?>
					
					<label id="user"> E-mail:</label>  <br /> <input type="text" name="email" id="user"/><br />
				
					<?php
					//jeżeli e mail jest zły to wyświetlany jest error
					if(isset($_SESSION['e_email']))
					{
						echo '<div class="error">'.$_SESSION['e_email'].'</div>';
						unset($_SESSION['e_email']);
					}
					
					?>
				
					<label id="user">Twoje hasło:</label> <br /><input type="password" name="haslo1" id="user"/><br />
					<label id="user">Powtórz hasło:</label><br /><input type="password" name="haslo2" id="user_Powtorzhaslo"/><br />
					<?php
					//złe haslo
					if(isset($_SESSION['e_haslo']))
					{
						echo '<div class="error">'.$_SESSION['e_haslo'].'</div>';
						unset($_SESSION['e_haslo']);
					}
					
					?>	
					<input type="checkbox" name="regulamin" id="user2"/> <label> Akceptuje regulamin </label>
					
					<?php
					//jeżeli e mail jest zły to wyświetlany jest error
					if(isset($_SESSION['e_regulamin']))
					{
						echo '<div class="error">'.$_SESSION['e_regulamin'].'</div>';
						unset($_SESSION['e_regulamin']);
					}
					
					?>
								
					<div class="g-recaptcha" data-sitekey="*******************************"></div> 
					<br />
					
					<?php
					//jeżeli e mail jest zły to wyświetlany jest error
					if(isset($_SESSION['e_bot']))
					{
						echo '<div class="errorCPATCH">'.$_SESSION['e_bot'].'</div>';
						unset($_SESSION['e_bot']);
					}
					
					?>
					<div id="buttonsmals_php3">
						<button id="wyslij_php" type="submit" value="Login" >Wyślij</button> 
						<a id="wyslij_php3" href="sphp.php">Powrót</a>
					</div>
				<!--	<input type="submit" value="Zarejestruj się" /> -->
				</form>
			</div>
	</div>
		<br />
		<br />
	<div class="footer">
	<label id="footer_label">Łukasz Bilnik strona do pokazywania działania przykładowych skryptów</label>
	</div>
	<?php
	if(isset($_SESSION['blad'])) 
	echo $_SESSION['blad'];
	?>
	</body>

</html>
