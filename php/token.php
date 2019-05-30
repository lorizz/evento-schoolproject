<?php
include_once 'classes/SessionManager.php';

function generateRandomToken() {
    $token = '';
    $numbers = array('0', '1', '2', '3', '4', '5', '6', '7', '8', '9');
    $characters = array('a', 'b', 'c', 'd', 'e', 'f', 'g', 'h', 'i', 'j', 'k', 'l', 'm', 'n', 'o', 'p', 'q', 'r', 's', 't', 'u', 'v', 'w', 'x', 'y', 'z');
    for($i = 0; $i < 256; $i++) {
        $rndSelector = rand(0, 1); // Per scegliere l'array 0 = caratteri 1 = numeri
        $rndTrans = rand(0, 1); // Per scegliere se è uppercase o lowercase IN CASO DI LETTERE 0 = uppercase 1 = lowercase
        if($rndSelector === 0) { // Solo se sono caratteri esegue questo codice
            if($rndTrans === 0) {
                $token .= strtoupper($characters[rand(0, 25)]);
            } else {
                $token .= $characters[rand(0, 25)]; // non ho messo strtolower perchè l'array è già in lowercase
            }
        } else {
            $token .= $numbers[rand(0, 9)];
        }
    }
    return $token;
}

// Questa funzione ogni volta fa una select con l'ID dell'utente (che è in sessione) e confronta il token in sessione con quello del database
function validateToken() {
    $servername = 'localhost';
    $username = 'root';
    $password = '';

    $pdo = null;

    try {
        $pdo = new PDO("mysql:host=$servername;dbname=cipurza", $username, $password);
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    } catch(PDOException $e) {
        echo "Connection failed: " . $e->getMessage();
    }
    if(isset($_SESSION['id'])) {
        $id = $_SESSION['id'];
        if(isset($_SESSION['token'])) {
            $token = $_SESSION['token'];
            $selUser = "SELECT * FROM utente WHERE CodU=$id";
            $stmt = $pdo->prepare($selUser);
            $stmt->execute();
            if($stmt->rowCount() > 0) {
                while($row = $stmt->fetch()) {
                    if($token != $row['Token'])
                        SessionManager::destroySession(); // se i token non corrispondono, viene buttato fuori
                }
            }
        } else {
            SessionManager::destroySession(); // se il token in sessione non esiste più, viene buttato fuori
        }
    }
}