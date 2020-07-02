<?php

	session_start();
	
	ini_set("display_errors", 0);
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: sphp.php');
		exit();
	}

	if (isset($_POST['temat']))
	{
		// Udana Walidacja? Załózmy, że tak
		$wszystko_OK=true;
		
		//patern do sprawdzania znaków specialnych;
		$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';	
		
		//Sorawdź poprawność nickname  Zmiena nick i przypisanie jej wartosci z formularza
		$pacient = $_POST['pacient'];
		
		//sprawdzenie długości nicka  walidacia nicka czy ma odpowiednia długośc
		if (strlen($pacient)<3 || (strlen($pacient)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_pacient']="Imię pacienta musi posiadać od 3 do 20 znaków";
		}

		if(preg_match($pattern, $pacient)==true)
		{
			$wszystko_OK=false;
			$_SESSION['e_pacient']="Imię może składać się tylko z liter i cyfr (bez znaków specjalnych)";
		}
		
		//------------ Sprawdź poprawnośc nazwiska
		$nazwisko = $_POST['nazwisko'];
		
		if (strlen($nazwisko)<3 || (strlen($nazwisko)>20))
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwisko']="Nazwisko pacienta musi posiadać od 3 do 20 znaków";
		}

		if(preg_match($pattern, $nazwisko)==true)
		{
			$wszystko_OK=false;
			$_SESSION['e_nazwisko']="Nazwisko może składać się tylko z liter i cyfr (bez znaków specjalnych)";
		}
		//------------radio 
		
		//Czy radio jest zaznaczone
				
		if(!(isset($_POST['plec'])))
		{
			$wszystko_OK=false;
			$_SESSION['e_plec']="Zaznacz jedną z opcji";
		} 
		
		$plec = $_POST['plec'];
		
		//-----------choroba
		$choroba = $_POST['temat'];
		
		if (strlen($choroba)<3 || (strlen($choroba)>50))
		{
			$wszystko_OK=false;
			$_SESSION['e_temat']="Nazwa choroby musi posiadać od 3 do 20 znaków";
		}
		
		if(preg_match($pattern, $choroba)==true)
		{
			$wszystko_OK=false;
			$_SESSION['e_temat']="Możesz podać tylko litery i cyfry (bez znaków specjalnych)";
		}
		//----------tesc
		$tresc = $_POST['tresc'];
		
		$pattern2 = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>\\\]/';
		if(strlen($tresc)<3)
		{
			$wszystko_OK=false;
			$_SESSION['e_tresc']="Podaj minimum trzy znaki (bez znaków specjalnych)";	
		}
		if(preg_match($pattern2, $tresc)==true)
		{
			$wszystko_OK=false;
			$_SESSION['e_tresc']="Możesz podać tylko litery i cyfry (bez znaków specjalnych, dozwolone są przecinki i kropki ale nie nawiasy)";
		}		
		//------------------------------ Dodawanie do bazy danych --------------------------------//
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
				//Sprawdzenie czy wszystkie powysze testy się powiodły
				if ($wszystko_OK==true)
					{
					   //Wszystkie testy zaliczone - dodajemy formularz
					   //echo "Udana walidacja!"; exit();	
						$loged_user = $_SESSION['user'];
						
						if($polaczenie->query("INSERT INTO formularze VALUES (NULL,'$pacient','$nazwisko','$plec','$choroba','$tresc','$loged_user')"))
						{	
							$_SESSION['formularzwypelniony']=true;					
							header('Location: odpowiedzi.php');
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
			echo '<span style="color:red;">Błąd servera! Przeproszamy za niedogodności i prosimy o wypełnienie formularza w innym terminie!</span>';
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
		
	<div id="buttonsmals_php2">
	<a id="wyslij_php3" href="logout.php" >Logout</a>
	<a class="btnrejestracja" href="odpowiedzi.php" >Wypełnione formularze</a>
	</div>
			
			<!--<a id="wyslij_php3" href="logout.php" >Logout</a>
			<a class="btnrejestracja" href="odpowiedzi.php">Wypełnione formularze</a>-->
									
				<div id="headtitle1"><h2 style="color:#9baf00;">Formularz pacienta</h2></div>

				 <form method="post" class="form2 form-horizontal" name="login_form" id="form2">
				
					<div id="rad_div">
					<label id="user"> Imie: </label> <br /> <input type="text" name="pacient" id="user" /><br />
					
					<?php
						//e_nick to error czyli nasza zmienna ustawiona w walidacj nicka jeżeli ona się pojawi to znaczy że użytkownik źle podał nick
						if(isset($_SESSION['e_pacient']))
						{
							echo '<div class="error">'.$_SESSION['e_pacient'].'</div>';
							unset($_SESSION['e_pacient']);
						}
					?>
					
					<label id="user"> Nazwisko:</label><br /><input type="text" name="nazwisko" id="user"/><br />
					<?php
					//jeżeli e mail jest zły to wyświetlany jest error
						if(isset($_SESSION['e_nazwisko']))
						{
							echo '<div class="error">'.$_SESSION['e_nazwisko'].'</div>';
							unset($_SESSION['e_nazwisko']);
						}
					?>
					</div>
					<div id="rad_div2">
						<label id="user_radio"> Kobieta:</label>  <input id="user3_PHP" type="radio" name="plec" value="Kobieta" /> 
						<label id="user_radio"> Mężczyzna:  </label>  <input id="user4_PHP" type="radio" name="plec" value="Mężczyzna"/>
					
					<?php
					//radio check
						if(isset($_SESSION['e_plec']))
						{
							echo '<div class="error">'.$_SESSION['e_plec'].'</div>';
							unset($_SESSION['e_plec']);
						}
					?>
					
					</div>
				
					<div id="rad_div">
						<label id="Choroba_PHP"> Choroba: </label> <input id="temat_PHP" type="text" name="temat" size="30" placeholder="COVID19"> 

					<?php
						//choroba error
						if(isset($_SESSION['e_temat']))
						{
							echo '<div class="error2">'.$_SESSION['e_temat'].'</div>';
							unset($_SESSION['e_temat']);
						}	
					?>

						<textarea id="textinpu" name="tresc" cols="50" rows="9" placeholder="Podaj objawy"></textarea>
					<?php
						//tresc error
						if(isset($_SESSION['e_tresc']))
						{
							echo '<div class="error">'.$_SESSION['e_tresc'].'</div>';
							unset($_SESSION['e_tresc']);
						}	
					?>
					</div>
				
					<div id="buttonsmals_php">
						<button id="wyslij_php2" type="submit" value="Login" >Wyślij</button> 
						<button id="wyslij_php2" type="Reset" value="Reset">Wyczyść</button>
					</div>
				
				</form>
		
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