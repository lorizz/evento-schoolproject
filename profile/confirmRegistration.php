<?php SessionManager::startSession(); if(isset($_SESSION['forcedToCompile'])) { ?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="../css/register.css" type="text/css">
    <?php include __DIR__ . '../../components/header.php'; ?>
        <div class="container-fluid" id="wrapper">
            <form action="../php/register.php" method="POST" id="form-register">
                <div class="row">
                    <div class="col">
                        <div class="form-group">
                            <label for="email">Email</label>
                            <input type="email" class="form-control" name="email" id="form-email" placeholder="Inserisci la tua email" value="<?=$_SESSION['reg-email']; ?>" required readonly>
                        </div>
                        <div class="form-group">
                            <label for="password">Password</label>
                            <input type="password" class="form-control" name="password" id="form-password" placeholder="Inserisci la tua password" value="<?=$_SESSION['reg-password'] ?>" required readonly>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="firstname">Password</label>
                            <input type="text" class="form-control" name="firstname" id="form-firstname" placeholder="Inserisci il tuo nome" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Password</label>
                            <input type="text" class="form-control" name="lastname" id="form-lastname" placeholder="Inserisci il tuo cognome" required>
                        </div>
                        <div class="form-group">
                            <label for="residence">Password</label>
                            <input type="text" class="form-control" name="residence" id="form-residence" placeholder="Inserisci la tua città" required>
                        </div>
                    </div>
                </div>
                <button type="submit" name="register" class="btn btn-primary">Registrati!</button><br>
                <small class="hover-link">Sei già membro? Clicca qui!</small>
            </form>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
    </body>
</html>
<?php } else echo "Error 500: Forbidden request!"; ?>