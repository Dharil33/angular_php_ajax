<?php  

 $connect = mysqli_connect("localhost", "root", "passwd", "mydb");  
 $data = json_decode(file_get_contents("php://input"));  
 if(count($data) > 0)  
 {  
      $id = $data->id; 
      $query = "UPDATE register SET name='$name',email='$email',password='$password' WHERE id='$id'";  
      if(mysqli_query($connect, $query))  
      {  
           echo "Updated Successfully";  
      }  
      else  
      {  
           echo false;  
      }  
 }  
 ?> 



<div ng-controller="ModalDemoCtrl as $ctrl" class="modal-demo">
    <script type="text/ng-template" id="myModalContent.html">
        <div class="modal-header">
            <h3 class="modal-title" id="modal-title">I'm a modal!</h3>
        </div>
        <div class="modal-body" id="modal-body">
            <ul>
                <li ng-repeat="item in $ctrl.items">
                    <a href="#" ng-click="$event.preventDefault(); $ctrl.selected.item = item">{{ item }}</a>
                </li>
            </ul>
            Selected: <b>{{ $ctrl.selected.item }}</b>
        </div>
        <div class="modal-footer">
            <button class="btn btn-primary" type="button" ng-click="$ctrl.ok()">OK</button>
            <button class="btn btn-warning" type="button" ng-click="$ctrl.cancel()">Cancel</button>
        </div>
    </script>
    <script type="text/ng-template" id="stackedModal.html">
        <div class="modal-header">
            <h3 class="modal-title" id="modal-title-{{name}}">The {{name}} modal!</h3>
        </div>
        <div class="modal-body" id="modal-body-{{name}}">
            Having multiple modals open at once is probably bad UX but it's technically possible.
        </div>
    </script>

    <button type="button" class="btn btn-default" ng-click="$ctrl.open()">Open me!</button>
    <button type="button" class="btn btn-default" ng-click="$ctrl.open('lg')">Large modal</button>
    <button type="button" class="btn btn-default" ng-click="$ctrl.open('sm')">Small modal</button>
    <button type="button" 
        class="btn btn-default" 
        ng-click="$ctrl.open('sm', '.modal-parent')">
            Modal appended to a custom parent
    </button>
    <div ng-show="$ctrl.selected">Selection from a modal: {{ $ctrl.selected }}</div>
    <div class="modal-parent">
    </div>
</div>