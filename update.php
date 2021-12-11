 <!DOCTYPE html>
 <html lang="en">
 <head>
     <meta charset="UTF-8">
     <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
     <meta name="viewport" content="width=device-width, initial-scale=1.0">
     <meta http-equiv="X-UA-Compatible" content="ie=edge">
     <title>Update Form</title>
 </head>
 <body>
     
 <form id="myform" ng-controller="myctrl">
   <p>Name : <input type="text" ng-model="name" name="name" value= <?php echo $query['name']; ?> required></p>
  <p>Email:
    <input type="email" ng-model="email" name="email" value=<?php echo $query['email']; ?> required>
  </p>
  <p>Password : <input type="password" name="password" ng-model="password" value=<?php echo $query['password']; ?> required></p>
    <button name="button" ng-click="updateData(name,email,password)">Update</button>
  <br/>
</form>

<script>

    var app = angular.module("myapp",[]);
    app.controller("myctrl",function($scope){
      $scope.updateData = function(name,email,password){  
                $http.post("edit.php", {'name': name, 'email':email,'password':password})  
                .success(function(data){  
                     alert(data);
                });    
        }
        $scope.displayData = function(){
        $http.get("get.php")
        .success(function(data){
        $scope.names = data;
    });
  }
    });

 </script>   
 </body>
 </html>