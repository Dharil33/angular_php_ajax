<!DOCTYPE html>
<html lang="en-US">
<script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>  
<link rel="stylesheet" href="index.css"/>
<body>

<div ng-app="myapp" ng-controller="myctrl">
    <form id="myform">
  <p>Name : <input type="text" ng-model="name" name="name" required></p>
  <p>Email:
    <input type="email" ng-model="email" name="email" required>
  </p>
  <p>Password : <input type="password" name="password" ng-model="password" required></p>
    <button name="button" ng-click="insertdata()">Sign up</button>
  <br/>
  <p>Already Registerd? <a href="login.php">Sign in</a></p>
</form>
</div>

<script>

var app = angular.module("myapp",[]);  
 app.controller("myctrl", function($scope, $http){  
      $scope.insertdata = function(){  
           $http.post(  
                "ip.php",  
                {'name':$scope.name, 'email':$scope.email
                ,'password':$scope.password}  
           ).success(function(data){  
                console.log(data);  
                $scope.name = null;  
                $scope.email = null;  
                $scope.password = null;
                window.location = "login.php";
                return true;
           });  
      }  
 });  

//  app.controller('myctrl', function ($scope, $http){
//    $http({
//       method: 'POST',
//       url: 'ip.php',
//       data: $scope.name
//    }).then(function (response){
//     data = response.data;
//    },function (error){

//    });
</script>
<footer><b>Created with love by STAAH<b></footer>
</body>
</html>