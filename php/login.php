<?php
include_once 'classes/SessionManager.php';
include 'config.php';
include 'token.php';

if(isset($_POST['confirm'])) {
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);

    $token = generateRandomToken();

    $selQuery = "SELECT * FROM utente WHERE Email='$email'";
    $stmt = $pdo->prepare($selQuery);
    $stmt->execute();
    if($stmt->rowCount() > 0) {
        while($row = $stmt->fetch()) {
            $updateQuery = "UPDATE utente SET 'Token'='$token' WHERE Email='$email'";
            $stmt2 = $pdo->prepare($updateQuery);
            $stmt2->execute();
            
            SessionManager::startSession();
            $_SESSION['id'] = $row['CodU'];
            $_SESSION['nickname'] = $row['Nickname'];
            $_SESSION['token'] = $token;
        }
    }
}