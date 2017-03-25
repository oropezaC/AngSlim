var angular = require('angular');
require('../service/estudiantes')
angular.module('escuela')
.controller('studianteCtrl', ['$scope','estudiantes', function($scope, estudiantes){

  $scope.init=function() {
    $scope.verEstudents();

  }

  $scope.verEstudents=function(){
    estudiantes.verEst()
    .then(function(result){
      $scope.alumnos=result.data;
    });
  }

  $scope.agregarEstudiante=function(i){
     var d =i;
     var item = {};
     item.nombre=i.nombre;
     item.a_paterno=i.paterno
     item.a_materno=i.materno
     item.num_ctrl=i.num_control;
     estudiantes.saveEst(d)
     .then(function(result){
       if (result.status==200) {
        $scope.alumno=undefined;
        $scope.alumnos.push(item);
       }
     })
  }

  $scope.eliminar=function(i) {
    var d = {control:i};
    console.log("datos",d);
    estudiantes.delEst(d)
    .then(function(result){
      if (result.status==200) {
       location.reload();
      }
    });
  }


}]);
