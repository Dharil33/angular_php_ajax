<!DOCTYPE html>  

<?php
session_start();

if(!isset($_SESSION['user_id']))
{
  header("Location:login.php");
}

?>

 <html>  
      <head>    
           <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" />  
           <script src="http://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script> 
           <link rel="stylesheet" href="ud.css"/> 
      </head>  
      <body>  
           <br /><br />  
           <h4 id="logout"><a href="logout.php">Log out</a></h4>
           <div class="container" style="width:500px;">  
                <h3 id="das"><b><i><u>Dashboard</u></i></b></h3>
  
                <div ng-app="myapp" ng-controller="myctrl" ng-init="displayData()">  
                     <label>Name</label>  
                     <input type="text" name="name" ng-model="name" class="form-control" />  
                     <br />  
                     <label>Email</label>  
                     <input type="email" name="email" ng-model="email" class="form-control" />  
                     <br /> 
                     <label>Password</label>  
                     <input type="password" name="password" ng-model="password" class="form-control" />  
                     <br />  
                     <input type="hidden" ng-model="id" />  
                     <input type="submit" id="mainbtn" name="btnInsert" class="btn btn-info" ng-click="deleteData(id,name,email,password)" value="{{btnName}}"/>  
                     <br /><br />  
                     <table class="table table-hover table-dark">  
                          <tr> 
                               <th>Id</th> 
                               <th>Name</th>  
                               <th>Email</th>
                               <th>Password</th>  
                               <th>Update</th>
                               <th>Delete</th>  
                          </tr>  
                          <tr ng-repeat="x in names" id="hover">  
                               <td>{{x.id}}</td>
                               <td>{{x.name}}</td>
                               <td>{{x.email}}</td>
                               <td>{{x.password}}</td>   
                               <td><button id="btn1" ng-click="updateData(x.id, x.name, x.email,x.password)" class="btn btn-info btn-xs">Update</button></td>  
                               <td><button id="btn2" ng-click="deleteData(x.id,x.name,x.email,x.password)" class="btn btn-info btn-xs">Delete</button></td>
                          </tr>  
                     </table>  
                </div>  
           </div>  
      </body>  
 </html>  
 <script>  
 var app = angular.module("myapp",[]);  
 app.controller("myctrl", function($scope, $http){  
      $scope.btnName = "Update";  
      $scope.deleteData = function(id,name,email,password){  
                $http.post(  
                     "deletedata.php",  
                     {'id':$scope.id,'name':name,'email':email,'password':password,'btnName':$scope.btnName}  
                ).success(function(data){ 
                     alert(data);   
                     $scope.btnName = "Delete";  
                     $scope.displayData();  
                });    
      }  
      $scope.displayData = function(){  
           $http.get("get.php")  
           .success(function(data){  
                $scope.names = data;  
           });  
      }  
      $scope.updateData = function(id,name,email,password){  
           $scope.id = id;  
           $scope.name = name;  
           $scope.email = email;
           $scope.password = password;  
           $scope.btnName = "Update";  
      }  
 });  
 </script>  