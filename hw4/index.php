<?php
require 'flight/Flight.php';

Flight::route('/', function(){
	Flight::render('home.php');
});



Flight::route('/reminders/', function() {
	Flight::render('reminders.php');
});

Flight::route('/login', function () {
	Flight::render('login.php');
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
	Flight::render('users.php');
});

Flight::route('/reminders/priority/@priority:[1-5]', function($priority) {
	Flight::render('priority.php', array('priority' => $priority));
});

Flight::route('/reminders/delete/', function() {
	include 'delete_reminder.php';
});

Flight::route('/reminders/insert/', function() {
	include 'create_reminder.php';
});

Flight::route('/reminders/view/@id/', function($id) {
	Flight::render('view_reminder.php', array('id' => $id));
});

Flight::route('/@name/@id:[0-9]{3}', function($name, $id){
    echo "Welcome $name!  Your id is $id";
});

Flight::route('/@name/', function($name){
    echo "Welcome $name!";
});



Flight::start();
?>
