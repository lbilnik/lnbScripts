<!DOCTYPE html>
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<?php 	
session_start(); ?>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="Keywords" content="BootStrap, StronaBoot, StronaTestowa" />
<meta name="Description" content="BootStrona, Strona główna" />
 <meta name="viewport" content="width=device-width, initial-scale=1">
<title>AngularJS</title>
<link href="style/styleAngular.css" rel="stylesheet" type="text/css" />

<link rel="stylesheet" href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">


<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<!--<script type="text/javascript" src="jsAng/edit.js"></script>-->
<script type="text/javascript" src="jsAng/rootAngular.js"></script>
<script type="text/javascript" src="jsAng/apps.js"></script>
<script type="text/javascript" src="jsAng/fetch.js"></script>
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
                                <li><a href="sphp.php">PHP</a></li>
								                <li><a href="jQuery.html">jQuery</a></li>
											<li class="current-menu-item"><a href="AngluarJs.html">AngluarJs</a></li>
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
<div class="container main-content" ng-app="rootApp">

		<div class="container">
			<h3 id="Angh3">Zapisywanie i wyświetlanie danych z Mysqli wykorzystując AngularJS za pomocą PHP Api</h3>
			
			<p id="Angp3">Wprowadź dane do formularza a następnie wciśnij "Wyślij" by dane te zostały zapisane w bazie danych i wyświetlone w tabeli obok. Aby sprawdzić że wszystko jest obsługiwane przez AngularJS włącz inspektor(F12) i szukaj przedrostka ng. Całość działa zgodnie z założeniami MVC - Model, View, Controller.</p>
			<div class="row">
			<div class="col-sm-10 col-md-6">
				<div ng-controller="db_controller" ng-init="display_data()">
					<table class="table table-bordered" id="tableAng">
						<tr>
							<th>Id
							<span id="pointer1" ng-click="order = 'Id'" class="glyphicon glyphicon-menu-up"></span>
							</th>
							
							<th>Imię
							<span id="pointer1" ng-click="order = 'first_name'" class="glyphicon glyphicon-menu-up"></span>
							<span id="pointer1" ng-click="order = '-first_name'" class="glyphicon glyphicon-menu-down"></span>
							</th>
							
							<th>Nazwisko
							<span id="pointer1" ng-click="order = 'last_name'" class="glyphicon glyphicon-menu-up"></span>
							<span id="pointer1" ng-click="order = '-last_name'" class="glyphicon glyphicon-menu-down"></span>
							</th>
							
							<th>E-mail
							<span id="pointer1" ng-click="order = 'email'" class="glyphicon glyphicon-menu-up"></span>
							<span id="pointer1" ng-click="order = '-email'" class="glyphicon glyphicon-menu-down"></span>
							</th>	
						</tr>
					<tr ng-repeat="x in names | orderBy:order">
					<td>{{x.id}}</td>
					<td>{{x.first_name}}</td>
					<td>{{x.last_name}}</td>
					<td>{{x.email}}</td>
					</tr>
					</table>
				</div>			
			</div>
				   <div class="col-sm-6 col-md-4" id="mainFormAngular" ng-controller="formcontroller">
						<form method="post" class="userForm" name="userForm" ng-submit="insertData()">
							<label class="text-success" ng-show="successInsert">{{successInsert}}</label>
							<span class="text-success" name="showInfo" ng-show="showInfo">{{showInfo}}</span>
							<div class="form-group" id="AngForm">
								
								<label>Imię <span class="text-danger"></span></label>
								<input type="text" name="first_name" ng-model="insert.first_name" class="form-control"/>
								<span class="text-danger" ng-show="errorFirstname">{{errorFirstname}}</span>							
							</div>
							
							<div class="form-group">
								
								<label>Nazwisko <span class="text-danger"></span></label>
								<input type="text" name="last_name" ng-model="insert.last_name" class="form-control"/>
								<span class="text-danger" ng-show="errorLastname">{{errorLastname}}</span> 
							</div>
							
							<div class="form-group">
								
								<label>E-mail <span class="text-danger"></span></label>
								<input type="text" name="email" ng-model="insert.email" class="form-control"/>
								<span class="text-danger" ng-show="errorEmail">{{errorEmail}}</span>
	
							</div>
							
							<div class="form-group">
								
								<input type="submit" name="insert" value="Wyślij" class="btn btn-info" ng-click="display_data()"/>
						
							</div>
							
						</form>
					
					</div>
			
			</div>
		</div>

	<div class="container" ng-controller="eight_controller" >

	  <div class="row" >
		<div class="col-sm-12 col-md-12" >
		  <form class="form-inline well-sm" >
			<span class="glyphicon glyphicon-search" ></span >

			<div class="form-group" >
				<input type="text"
					   class="form-control"
					   id="name"
					   ng-model="search"
					   placeholder="Wyszukaj"
					/>
			</div >

			<span class="glyphicon glyphicon-sort-by-attributes" ></span >

			<div class="form-group" >
			  <select class="form-control"
					  ng-model="order">
				<option value="name" >Imię (ASC)</option >
				<option value="-name" >Imię (DEC)</option >
				<option value="email" >Email (ASC)</option >
				<option value="-email" >Email (DEC)</option >
			  </select >
			</div >
			
			<span class="glyphicon glyphicon-resize-vertical" ></span >
			<div class="form-group" >
			<input class="form-control" id="name" type="number" step="1" min="1" max="32" ng-model="rowLimit"/>
			</div>

		  </form >
		</div >
	  </div >


	  <div class="row" >
		<div class="col-sm-6 col-md-8" id="angTabela" >

		  <table class="table table-bordered" >

			<tr >
			  <th >#</th >
			  <th >Imię
				<span id="pointer1" ng-click="order = 'name'" class="glyphicon glyphicon-menu-up"></span>
				<span id="pointer1" ng-click="order = '-name'" class="glyphicon glyphicon-menu-down"></span>
			  </th >
			  <th >Email
				<span id="pointer1" ng-click="order = 'email'" class="glyphicon glyphicon-menu-up"></span>
				<span id="pointer1" ng-click="order = '-email'" class="glyphicon glyphicon-menu-down"></span>
			  </th >
			  <th >Urodzony</th >
			</tr >

			<tr ng-repeat="person in filteredPersons = (persons | filter:sensitiveSearch | orderBy:order | limitTo:rowLimit)"
				ng-style="{
				   'background-color': $index == selectedIndex ? '#9baf00' : ''
				}"
				ng-click="selectPerson(person, $index)" >
			  <td >{{ $index }}</td >
			  <td >{{ person.name }}</td >
			  <td >{{ person.email }}</td >
			  <td >{{ person.birthdate | date:"longDate" }}</td >
			</tr >
			<tr ng-show="filteredPersons.length == 0">
			  <td colspan="4">
				<div class="alert alert-info">
				  <p class="text-center">No results found for search term '{{ search }}'</p>
				</div>
			  </td>
			</tr>


		  </table >

		</div >
		<div class="col-sm-12 col-md-4" >

		  <div class="panel panel-default" id="colorpanelsecond">
			<div class="panel-heading" >Informacje</div >
			<div class="panel-body">

			  <dl id="colorpanelsecond">
				<dt >Imię</dt >
				<dd >{{selectedPerson.name}}</dd >
				<dt >Email</dt >
				<dd >{{selectedPerson.email}}</dd >
				<dt >Urodzony</dt >
				<dd >{{selectedPerson.birthdate | date:"longDate"}}</dd >
				<dt >Telefon</dt >
				<dd >{{selectedPerson.phonenumber}}</dd >
				<dt >Adres</dt >
				<dd >{{selectedPerson.address}}</dd >
				<dt >Miasto</dt >
				<dd >{{selectedPerson.city}}</dd >
				<dt >Kraj</dt >
				<dd >{{selectedPerson.country}}</dd >
			  </dl >

			</div >
		  </div >

		</div >
	  </div >

	</div >

</div>

 <!-- JQuery-->
 <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>

</body>
</html>
	