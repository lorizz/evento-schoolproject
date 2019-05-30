<?php
include_once 'classes/SessionManager.php';
include 'config.php';
include 'token.php';

if(isset($_POST['confirm'])) {
    SessionManager::startSession();
    $_SESSION['forcedToCompile'] = true;
    $_SESSION['reg-email'] = $_POST['email'];
    $_SESSION['reg-password'] = $_POST['password'];
    include __DIR__ . '/../profile/confirmRegistration.php';
}

elseif(isset($_POST['register'])) {
    $email = $_POST['email'];
    $password = hash('sha256', $_POST['password']);
    $firstname = $_POST['firstname'];
    $lastname = $_POST['lastname'];
    $nickname = $_POST['nickname'];
    $region = $_POST['region'];
    $city = $_POST['city'];
    $address = $_POST['address'];

    $token = generateRandomToken();

    $selQuery = "SELECT * FROM luogo WHERE Citta = '$city'";
    $stmt = $pdo->prepare($selQuery);
    $stmt->execute();
    if($stmt->rowCount() == 0) {
        $insertCity = "INSERT INTO luogo(Citta, Regione) VALUES('$city', '$region')";
        $pdo->exec($insertCity);
    }

    $codl = null;

    $stmt = $pdo->prepare($selQuery);
    $stmt->execute();
    if($stmt->rowCount() > 0) {
        while($row = $stmt->fetch()) {
            $codl = $row['CodL'];
        }
    }
    
    $insertUser = "INSERT INTO utente(Token, Cognome, Nome, Password, Email, Nickname, Indirizzo, CodL) VALUES(:token, :lastname, :firstname, :password, :email, :nickname, :address, :codl)";
    
    $stmt = $pdo->prepare($insertUser);
    $stmt->bindParam(':token', $token);
    $stmt->bindParam(':lastname', $lastname);
    $stmt->bindParam(':firstname', $firstname);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':nickname', $nickname);
    $stmt->bindParam(':address', $address);
    $stmt->bindParam(':codl', $codl);
    $stmt->execute();

    $codu = null;

    $selUser = "SELECT * FROM utente WHERE Nickname='$nickname'";
    $stmt = $pdo->prepare($selUser);
    $stmt->execute();
    if($stmt->rowCount() > 0) {
        while($row = $stmt->fetch()) {
            $codu = $row['CodU'];
        }
    }

    SessionManager::restartSession();
    $_SESSION['id'] = $codu;
    $_SESSION['nickname'] = $nickname;
    $_SESSION['token'] = $token;
}