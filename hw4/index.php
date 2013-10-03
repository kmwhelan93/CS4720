<?php
require 'flight/Flight.php';

Flight::route('/', function(){
    include 'home.php';
});



Flight::route('/reminders/', function() {
	include 'reminders.php';
});

Flight::route('/login', function () {
	include 'login.php';
});

Flight::route('/try-login', function() {
	include 'try-login.php';
});

Flight::route('/test', function () {
	include 'test.php';
});

Flight::route('/getListItemsPriority', function() {
	include 'getListItemsPriority.php';
});

Flight::route('/users', function() {
	include 'users.php';
});

Flight::route('/reminders/priority/@priority:[1-5]', function($priority) {
	include 'priority.php';
});

Flight::route('/reminders/delete/', function() {
	include 'delete_reminder.php';
});

Flight::route('/reminders/insert/', function() {
	include 'create_reminder.php';
});

Flight::route('/reminders/view/@id/', function($id) {
	include 'view_reminder.php';
});

Flight::route('/@name/@id:[0-9]{3}', function($name, $id){
    echo "Welcome $name!  Your id is $id";
});

Flight::route('/@name/', function($name){
    echo "Welcome $name!";
});



Flight::start();
?>
