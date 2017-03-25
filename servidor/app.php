<?php
require 'Slim/Slim.php';
require 'model/main.php';



\Slim\Slim::registerAutoloader();


$app = new \Slim\Slim();
$app->config('debug', false);
$app->response()->header('Content-Type', 'application/json;charset=utf-8');

$app->get('/estudiante','alumnos');
$app->post('/addestudiante','addstudents');
$app->post('/delestudiante','delstudents');




function alumnos() {
  $query ="select * from estudiante;";
  try {
    $con = Connection();
    $st = $con->query($query);
    $result = $st->fetchAll(PDO::FETCH_OBJ);
    $con = null;
    echo  json_encode($result);
  } catch(PDOException $err) {
    echo '{"error":{"ERROR":'. $err->getMessage() .'}}';
  }
}


function addstudents(){
  $req = \Slim\Slim::getInstance()->request();
  $d = json_decode($req->getBody());
  $query = "INSERT INTO
  estudiante
  (num_ctrl,nombre,a_paterno,a_materno,telefono,promedio)
  VALUES
  (:num_control,:nombre,:paterno,:materno,:telefono,:promedio);";
  try {
    $con = Connection();
    $st = $con->prepare($query);
    $st->bindParam("num_control",   $d->num_control);
    $st->bindParam("nombre", $d->nombre);
    $st->bindParam("paterno",   $d->paterno);
    $st->bindParam("materno", $d->materno);
    $st->bindParam("telefono",   $d->telefono);
    $st->bindParam("promedio", $d->promedio);
    $st->execute();
    $con = null;
  } catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
  }
}

function delstudents(){
  $req = \Slim\Slim::getInstance()->request();
  $d = json_decode($req->getBody());
  $query = "DELETE FROM estudiante WHERE num_ctrl =:control";
  try {
    $con = Connection();
    $st = $con->prepare($query);
    $st->bindParam("control",  $d->control);
    $st->execute();
    $con = null;
  } catch(PDOException $e) {
    echo '{"error":{"text":'. $e->getMessage() .'}}';
  }
}

$app->run();

?>
