<?php
include 'config.php';

include 'classes/SessionManager.php';
include 'classes/Authenticator.php';
if(isset($_POST['confirm'])) {
    SessionManager::startSession();
    $_SESSION['forcedToCompile'] = true;
    $_SESSION['reg-email'] = $_POST['email'];
    $_SESSION['reg-password'] = $_POST['password'];
    include __DIR__ . '/../profile/confirmRegistration.php';
}

if(isset($_POST['register'])) {
	SessionManager::destroySession();
	$email = $_POST['email'];
	$password = hash('sha256', $_POST['password']);
	$firstname = $_POST['firstname'];
	$lastname = $_POST['lastname'];
	$residence = $_POST['residence'];
	
	$token = Authenticator::generateToken();
	
	$query = "INSERT INTO utenti(password, email, cognome, nome, CLuogo) 
			VALUES('$password', '$email', '$lastname', '$firstname', '$residence')";
	
	if($pdo->exec($query)) {
			SessionManager::startSession();
			$_SESSION['token'] = $token;
			$_SESSION['email'] = $email;
	}
}