<?php
include 'classes/SessionManager.php';
if(isset($_POST['confirm'])) {
    SessionManager::startSession();
    $_SESSION['forcedToCompile'] = true;
    $_SESSION['reg-email'] = $_POST['email'];
    $_SESSION['reg-password'] = $_POST['password'];
    include __DIR__ . '/../profile/confirmRegistration.php';
}