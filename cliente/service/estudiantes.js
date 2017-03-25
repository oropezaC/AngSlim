var angular = require('angular');
angular.module('escuela')
.service('estudiantes', ['$http', function ($http){
	var urlBase = url_base;

	this.verEst = function (d) {
		return $http.get(urlBase+'/estudiante');
	}

	this.saveEst = function (d) {
		return $http.post(urlBase+'/addestudiante',d);
	}

	this.delEst = function (d) {
		return $http.post(urlBase+'/delestudiante',d);
	}



}]);
