<?php
	session_start();
	
	if (!isset($_SESSION['zalogowany']))
	{
		header('Location: sphp.php');
		exit();
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
			else 
			{ 
				echo "<p id='login'> nie jesteś zalogowany </p>";
			}	
		?>
	<div id="buttonsmals_php2">
	<a id="wyslij_php3" href="logout.php" >Logout</a>
	<a id="wyslij_php3" href="formularz.php" >Nowy Formularz</a>
	</div>
		
		
	</div>

	<div id="formula clearfix">	

	<div id="headtitle2_PHP"><h2 style="color:#9baf00;">Wypełnione formularze</h2></div>
	
	<div id="tableMain">
    <table id="table_php" align="center" cellpadding="0" cellspacing="0">
        <tr>
        <?php
            ini_set("display_errors", 0);
            require_once "connection.php";
            $polaczenie = mysqli_connect($host, $db_user, $db_password);
			mysqli_query($polaczenie, "SET CHARSET utf8");
			mysqli_query($polaczenie, "SET NAMES 'utf8' COLLATE 'utf8_polish_ci'");
            mysqli_select_db($polaczenie, $db_name);
            
            //$zapytanietxt = file_get_contents("zapytanie.txt");
            $zapytanietxt = "SELECT * FROM formularze";
            $rezultat = mysqli_query($polaczenie, $zapytanietxt);
            $ile = mysqli_num_rows($rezultat);
                     
if ($ile>=1) 
{
echo<<<END

	<td id="tabela_TOP">id</td>
	<td id="tabela_TOP">Imie</td>
	<td id="tabela_TOP">Nazwisko</td>
	<td id="tabela_TOP">Płeć</td>
	<td id="tabela_TOP">Choroba</td>
	<td id="tabela_TOP">Opis</td>
	<td id="tabela_TOP">Nazwa Autora</td>
	</tr><tr>

END;
}

	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat);
		$a1 = $row['id'];
		$a2 = $row['imie'];
		$a3 = $row['nazwisko'];
		$a4 = $row['plec'];
		$a5 = $row['choroba'];
		$a6 = $row['opis'];
		$a7 = $row['fuser'];		
		
echo<<<END
		
		<td id="tabela_id">$a1</td>
		<td id="tabela">$a2</td>
		<td id="tabela">$a3</td>
		<td id="tabela">$a4</td>
		<td id="tabela">$a5</td>
		<td id="tabela_Opis">$a6</td>
		<td id="tabela">$a7</td>
		</tr>
		
END;
		
}

?>
</table>
 <table id="table_php" align="center" cellpadding="0" cellspacing="0">
	<tr>
<?php
$loged_user = $_SESSION['user'];
echo '<div id="tableTitle"><h3>Formularze użytkownika: '.$loged_user.'</h3></div>';

$zapytanietxt2 = "SELECT * FROM formularze WHERE fuser = '".$loged_user."' ";
            $rezultat2 = mysqli_query($polaczenie, $zapytanietxt2);
            $ile = mysqli_num_rows($rezultat2);
                    
if ($ile>=1) 
{

echo<<<END

	<td id="tabela_TOP">id</td>
	<td id="tabela_TOP">Imie</td>
	<td id="tabela_TOP">Nazwisko</td>
	<td id="tabela_TOP">Płeć</td>
	<td id="tabela_TOP">Choroba</td>
	<td id="tabela_TOP">Opis</td>
	<td id="tabela_TOP">Nazwa Autora</td>
	</tr>

END;
}

	for ($i = 1; $i <= $ile; $i++) 
	{
		
		$row = mysqli_fetch_assoc($rezultat2);
		$am1 = $row['id'];
		$am2 = $row['imie'];
		$am3 = $row['nazwisko'];
		$am4 = $row['plec'];
		$am5 = $row['choroba'];
		$am6 = $row['opis'];
		$am7 = $row['fuser'];		
				
echo<<<END
		<tr>
		<td id="tabela_id">$am1</td>
		<td id="tabela">$am2</td>
		<td id="tabela">$am3</td>
		<td id="tabela">$am4</td>
		<td id="tabela">$am5</td>
		<td id="tabela_Opis">$am6</td>
		<td id="tabela">$am7</td>
		</tr>
		
END;
	
}

?>
	</tr></table>
	</div>
</div>
	<br />
	<br />
	<br />
	<div class="footer">
	<label id="footer_label">Łukasz Bilnik strona do pokazywania działania przykładowych skryptów</label>
	</div>

</body>
</html>

