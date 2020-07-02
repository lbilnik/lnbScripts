var app = angular.module('sa_display', []);

app.controller("db_controller", function($scope, $http, $interval) {
	$scope.display_data = function() {
		$http.get("display.php")
		.then(function successCallback(response) {
			$scope.names = response.data;
		});
	}
			$interval(function(){
			$scope.display_data();
		}, 2000);
});

var formAng = angular.module("formapp",[]);
formAng.controller("formcontroller", function($scope, $http){
	$scope.insert = {};
	$scope.insertData = function(){
		$http({
			method: "POST",
			url: "insert.php",
			data:$scope.insert,
		}).success(function(data){
			if(data.error)
			{
				$scope.errorFirstname = data.error.first_name;
				$scope.errorLastname = data.error.last_name;
				$scope.errorEmail = data.error.email;
				$scope.showInfo = data.error.showInfo;
			}
			else
			{
				$scope.insert = null;
				$scope.errorFirstname = null;
				$scope.errorLastname = null;
				$scope.errorEmail = null;		
				$scope.showInfo = null;				
			}			
		});
	}
});
