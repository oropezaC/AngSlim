var angular = require('angular');
// url_base = 'http://localhost/SlimApp/servidor/app.php';
url_base = 'http://localhost/tienda/server/app.php';

angular.module('escuela', []);
var url = url_base;
require('./controller/estudiante');
