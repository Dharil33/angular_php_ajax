<!DOCTYPE html>
<html lang="en-US">
<script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
<link rel="stylesheet" href="index.css"/>
<body>

<div ng-app="myapp" ng-controller="myctrl">
    <form id="myform" ng-submit="userLogin()">
  <p>Email:
    <input type="email" name="email" ng-model="email" required>
    <!-- <span style="color:red" ng-show="myform.email.$dirty && myform.email.$invalid">
    <span ng-show="myform.email.$error.required">Email is required.</span>
    <span ng-show="myform.email.$error.email">Invalid email address.</span>
    </span> -->
  </p>
  <p>Password : <input type="password" ng-model="password" name="password" required></p>
  <button name="button">Sign in</button> 
</form>
</div>


<script>
 
var app = angular.module("myapp", []);
app.controller("myctrl", function($scope, $http){
$scope.userLogin = function(){
var request = $http({
method: "POST",
url: "fetch.php",
data: {
email: $scope.email,
password: $scope.password
},
headers: { 'Content-Type': 'application/x-www-form-urlencoded' }
});
request.then(function(response){
if(response.data==1){
$scope.email = "";
$scope.password = "";
window.location = "ud.php";
return true;
}else{
$scope.result="Invalid email or Password";
}
});
};
});

</script>
<footer><b>Created with love by STAAH</b></footer>
</body>
</html>