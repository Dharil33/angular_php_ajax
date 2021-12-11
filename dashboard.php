<!DOCTYPE html>
<?php
session_start();

if(!isset($_SESSION['user_id']))
{
  header("Location:login.php");
}

?>
<html lang="en-US">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<link rel="stylesheet" href="style.css"/>
<body>

  <!-- <div id="model">
      <div id="model-form">
          <h2>Edit Form</h2>
</div>
</div> -->
<h1 id="dash"><i><u>Dashboard</u></i></h1>

<h4 id="logout"><a href="logout.php">Log out</a></h4>
<button id="api"><a href="getapi.php">Get API</a></button>

<div ng-app="myapp" ng-controller="myctrl" ng-init="displayData()">



<table class="table table-hover table-dark">  
<thead>
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Operation</th>
    </tr>
  </thead>
<tr ng-repeat="x in names">  
<td scope="row">{{x.id}}</td> 
<td>{{x.name}}</td> 
<td>{{x.email}}</td>  
<td>{{x.password}}</td>
<td><button name="update" id="btn1">Update</button></td>
<td><button name="delete" id="btn2">Delete</button></td>
</tr>  
</table>  
  </div>


<script>

var app = angular.module("myapp",[]);
app.controller("myctrl",function($scope,$http){
  $scope.displayData = function(){
    $http.get("get.php")
    .success(function(data){
      $scope.names = data;
    });
  }
});

</script>

<footer><b>Created with love by STAAH</b></footer>

</body>
</html>