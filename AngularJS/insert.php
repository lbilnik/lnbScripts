<?php
$wszystko_OK=true;
$connect = mysqli_connect("xxx", "xxxx", "xxxx", "xxxx");
$form_data = json_decode(file_get_contents("php://input"));
$data = array();
$error = array();

// First Name
if(empty($form_data->first_name))
		{
			$error["first_name"] = "Podaj Imię";
		}
// Last Name
if(empty($form_data->last_name))
		{
			$error["last_name"] = "Poidaj Nazwisko";
		}
//email
if(empty($form_data->email))
		{
			$error["email"] = "Podaj E-mail";
		}
if(!empty($error))
{
	$data['error'] = $error;
}
else 
{
	$first_name = mysqli_real_escape_string($connect, $form_data->first_name);
	$last_name = mysqli_real_escape_string($connect, $form_data->last_name);
	$email = mysqli_real_escape_string($connect, $form_data->email);
	
	$pattern = '/[\'\/~`\!@#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\.\?\\\]/';
	$pattern2 = '/[\'\/~`\!#\$%\^&\*\(\)_\-\+=\{\}\[\]\|;:"\<\>,\?\\\]/';
	
		//Imię
		if (strlen($first_name) < 3 || (strlen($first_name) > 20))
		{
			$wszystko_OK=false;
			$error["first_name"] = "Imię musi posiadać od 3 do 20 znaków";
			$data['error'] = $error;
		}
		if(preg_match($pattern, $first_name)==true)
		{
			$wszystko_OK=false;
			$error["first_name"] = "Możesz podać tylko litery i cyfry (bez znaków specjalnych)";
			$data['error'] = $error;
		}
		
		//Nazwisko
		if (strlen($last_name) < 3 || (strlen($last_name) > 20))
		{
			$wszystko_OK=false;
			$error["last_name"] = "Nazwisko musi posiadać od 3 do 20 znaków";
			$data['error'] = $error;
		}		
		if(preg_match($pattern, $last_name)==true)
		{
			$wszystko_OK=false;
			$error["last_name"] = "Możesz podać tylko litery i cyfry (bez znaków specjalnych)";
			$data['error'] = $error;
		} 
		
		//Email
		if (strlen($email) < 3 || (strlen($email) > 30))
		{
			$wszystko_OK=false;
			$error["email"] = "E-mail musi posiadać od 3 do 20 znaków";
			$data['error'] = $error;
		}
		if(preg_match($pattern2, $email)==true)
		{
			$wszystko_OK=false;
			$error["email"] = "Możesz podać tylko litery, cyfry, kropki oraz @";
			$data['error'] = $error;
		} 

	if($wszystko_OK==true){
	$query = " INSERT INTO tbl_user(first_name, last_name, email) VALUES ('$first_name', '$last_name', '$email') ";
		
		if(mysqli_query($connect, $query))
		{
			$data["successInsert"] = "Dane dodano tabela zaraz zostanie zaktualizowana";
			$error["showInfo"] = "Dane dodano tabela zaraz zostanie zaktualizowana";
			$data['error'] = $error;
		}
	
	}
}
echo json_encode($data);

	
?>