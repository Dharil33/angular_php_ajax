<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <script src="https://ajax.googleapis.com/ajax/libs/angularjs/1.4.8/angular.min.js"></script>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Delete Data</title>
</head>
<body>
    <div ng-app="myapp" ng-controller="myctrl">
<form id="myform">
   <p>Id : <input type="text" ng-model="id" name="id" required></p>
   <br/>
    <button name="button" ng-click="deleteData(id)">Delete</button>
  <br/>
</form>
</div>

<script>

    var app = angular.module("myapp",[]);
    app.controller("myctrl",function($scope,$http){
        $scope.deleteData = function(id){  
           if(confirm("Are you sure you want to delete this data?"))  
           {  
                $http.post("deletedata.php", {'id': id})  
                .success(function(data){  
                     alert(data);
                });  
           }  
           else  
           {  
                return false;  
           }  
        }
    });

</script>



</body>
</html>
