<?php
	 session_start();
	
	if ((isset($_SESSION['zalogowany'])) && ($_SESSION['zalogowany']==true))
	{
		header('Location: formularz.php');
		exit();
	}
	if((isset($_SESSION['blad'])) && (isset($_POST['login'])))
	{
	unset($_SESSION['blad']);
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

								<li><a href="AngularJs.php">AngularJs</a></li>

								<li><a href="less.html">Strona Less</a></li>
								
								<li><a href="BootStrap.html">BootStrap</a></li>

                            </ul>

							

                    	</nav>

                	</div>

					</div>

            </div>  

              	  

	            <div class="row">     	  

					<div id="intro">
						<div class="col-6 col-sm-12 col-md-3">
						<div class="intro-item">

							<h3>Javascript</h3>

							<p>Przykładowe Skrypty javascript | działanie </p>

						</div>
						</div>

					<div class="col-6 col-sm-12 col-md-3">
					<div class="intro-item">

						<h3>PHP</h3>

						<p>Przykładowe Skrypty PHP | działanie </p>

					</div>
					</div>
				   
				   <div class="col-6 col-sm-12 col-md-3">
				   <div class="intro-item">

						<h3>Skrypty</h3>

						<p>Systematycznie do strony będą dodawane nowe skrypty</p>

					</div>
					</div>
				
						<div class="col-6 col-sm-12 col-md-3">
						<div id="lnb">

						<h1><a id="logo" href="index.html"><img src="img/logo2.png" alt=""></a></h1>

						</div>
						</div>
	</div>
	</div>
		<div class="row">
			<div class="col-10 col-sm-10 col-md-12">
			<h4 id="InformacjeGlowne">Na tej stronie można przetestować działanie przeróżnych skryptów napisanych przeze mnie wiele z nich powstało podczas nauki technologi webowych - Front-End jak i Back-End.</h4>
			</div>
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
				
				<div id="source"><p style="color:white;">System logowania i rejestracji. Jeżeli jeszcze nie masz konta to się zarejestruj. Zalogowany użytkownik przechodzi do przykładowego formularza pacjenta, który wypełnia a jego informacje są zapisywane do bazy danych. Zalogowany użytkownik może również zobaczyć wcześniejsze wypełnione formularze (odczyt danych z bazy danych)</p></div>
				<div id="headtitle_php"><h2 style="color:#9baf00;">Logowanie</h2></div>

				<form action="login.php" method="post" class="form2 form-horizontal" name="login_form" id="form2">			

				<label>Login:</label><input type="text" name="login" id="user3_PHP"/><br/>

				<label>Password:</label><input type="password" name="haslo" id="user"/><br />
						
						<?php
						if(isset($_SESSION['blad'])) 
						{
							echo $_SESSION['blad'];
							unset($_SESSION['blad']);
						}
						?>
					
					<div id="buttonsmals_php2">
						<button id="wyslij_php" type="submit" value="Login" >Zaloguj</button> 
						<a href="rejestracja.php" class="btnrejestracja">  Przejdź do formularza rejestracj </a>
					</div>
				</form>

			</div>
			
	 </div>
	<div class="XMLTableDiv">
	<h3 id="headtitle2_PHP">Przykładowe pobieranie danych z pliku XML i wyświetlanie ich</h3>
	
	 <table id="tableXML_php" align="center" cellpadding="0" cellspacing="0">
	<tr>
	<?php 

	$src = "includes/produkty.xml";

	$xml = simplexml_load_file($src);

	$limit = 10;

	/*echo "<ul id='xml_list'>";*/

	foreach($xml->produkt as $produkt){
		echo "<tr>";
		echo '<td id="tabela_XML">'.$produkt->name.'</td>';
		
		echo '<td id="tabela_sXML">'.$produkt->numer.'</td>';

		echo '<td id="tabela_sXML">'.$produkt->cena.'</td>';
		echo "</tr>";

		$limit--;

		if($limit == 0) {break;}

	}

	?>
	</tr>
	</table>
	<table id="tableXML_php" align="center">
	<tr>
	<?php 
	$src = "includes/links.xml";

	$xml = simplexml_load_file($src);

	$limit = 10;

	foreach($xml->pracownik as $pracownik){

		echo "<tr>";
		
		echo '<th id="tabela_XML">'.$pracownik->title.'</th>';

		echo '<td id="tabela_sXML">'.$pracownik->numer2.'</td>';

		echo '<td id="tabela_sXML">'.$pracownik->zatrudnienie.'</td>';

		echo '<td id="tabela_sXML">'.$pracownik->stanwisko.'</td>';

		echo "</tr>";

		$limit--;

		if($limit == 0) {break;}

	}

	?>
	</tr>
	</table>
	</div>

	<div class="footer">
	<label id="footer_label">Łukasz Bilnik strona do pokazywania działania przykładowych skryptów</label>
	</div>

	</body>

</html>