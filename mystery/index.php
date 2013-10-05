<?php
require 'flight/Flight.php';

Flight::route('/', function(){
	Flight::render('home.php');
});

Flight::route('/index', function(){
	Flight::render('home.php');
});

Flight::route('/login', function () {
	Flight::render('login.php');
});

Flight::route('/maze', function() {
	Flight::render('maze.php');
});

Flight::route('/try-login', function() {
	include 'try-login.php';
});

Flight::route('/@name/@id:[0-9]{3}', function($name, $id){
    echo "Welcome $name!  Your id is $id";
});

Flight::route('/@name/', function($name){
    echo "Welcome $name!";
});

Flight::route('/checkAnswer', function(){
	include 'checkAnswer.php';
});



Flight::start();
?>
