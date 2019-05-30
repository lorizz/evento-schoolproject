<?php include 'php/classes/SessionManager.php'; include 'php/token.php'; SessionManager::startSession(); validateToken(); SessionManager::destroySession();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>Homepage</title>
        <link rel="stylesheet" href="css/index.css" type="text/css">
    <?php include __DIR__ . '/components/header.php'; ?>
        <div class="container-fluid" id="wrapper">
            <section class="fullscreen" id="intro">
                <div class="fullscreen" id="intro-background">
                    <div id="intro-inside">
                        <?php if(isset($_SESSION['nickname'])) { echo "<h1>Benvenuto " . $_SESSION['nickname'] . " ad Evento!</h1>"; } else { echo "<h1>Benvenuto ad Evento!</h1>"; }?>
                        <small>Perchè io non mento!</small><br>
                        <div class="button-default">Continua</div>
                    </div>
                </div>
            </section>
            <section id="info">
                <div id="info-inside">
                    <h1>Cos'è Evento!</h1>
                    <div class="row">
                        <div class="col">
                            <h2>Evento! è un...</h2>
                            <p>
                                Gestore di eventi di varie categorie dove l'utente può scegliere<br>
                                a quali iscriversi, determinati utenti avranno la possibilità di<br>
                                creare od ospitare il loro evento grazie a questa piattaforma.<br>
                                
                                Questo gestionale si basa su richieste ed autenticazioni crittografate<br>
                                quindi ogni dato sensibile è protetto durante il trasferimento di pacchetti.<br>
                                In caso di corruzione del token di accesso o della sessione, l'utente viene<br>
                                automaticamente sloggato.
                            </p>
                        </div>
                        <div class="col">
                            <h2>Evento! è stato realizzato da...</h2>
                            <p>
                                Alessandro Burza e Giovanni Rabilas utilizzando Bootstrap 4 e AJAX.<br>
                                Per il back-end è stato utilizzando MySQL e InnoDB come RDBMS,<br>
                                hostato utilizzando il webserver XAMPP con PHP 5.3<br>
                            </p>
                        </div>
                    </div>
                    <?php if(!isset($_SESSION['nickname'])) { ?>
                    <div class="row">
                        <div class="col">
                            <h2>Iscriviti ora!</h2>
                            <p>
                                La registrazione al sito è totalmente gratuita e sicura!<br>
                                Post-registrazione ti verrà inviata una mail di conferma,<br>
                                senza confermare l'email, non è possibile creare od ospitare eventi!
                            </p>
                            <h2 class="link-box" onclick="showRegister();">Registrati</h2>
                            <small class="link">Sei già registrato? Clicca qui per accedere!</small>
                        </div>
                    </div>
                    <form class="medium centered" action="php/register.php" method="POST">
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="form-email" placeholder="Inserisci la tua email" required>
                        </div>
                        <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="form-password" placeholder="Inserisci la tua password" required>
                        </div>
                        <button type="submit" name="confirm" class="btn btn-primary">Submit</button>
                    </form>
                    <form class="medium centered" action="php/login.php" method="POST">
                        <div class="form-group">
                        <label for="email">Email</label>
                        <input type="email" class="form-control" name="email" id="form-email" placeholder="Inserisci la tua email" required>
                        </div>
                        <div class="form-group">
                        <label for="password">Password</label>
                        <input type="password" class="form-control" name="password" id="form-password" placeholder="Inserisci la tua password" required>
                        </div>
                        <button type="submit" name="confirm" class="btn btn-primary">Submit</button>
                    </form>
                    <?php } ?>
                </div>
            </section>
        </div>
        <!-- Optional JavaScript -->
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
        <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
        <script>
            $(window).bind('scroll', function() {
                $navbar = $('#navbar');
                if($(window).scrollTop() >= $('#info-inside').offset().top + $('#info-inside').outerHeight() - window.innerHeight) {
                    if($navbar.hasClass('navbar-default')) {
                        $navbar.removeClass('navbar-default');
                        $navbar.addClass('navbar-white');
                    }
                } else {
                    if($navbar.hasClass('navbar-white')) {
                        $navbar.removeClass('navbar-white');
                        $navbar.addClass('navbar-default');
                    }
                }
            })

            $(window).ready(function() {
                $('.hidden').hide();
                $('#navbar').removeClass('navbar-white');
                $('#navbar').addClass('navbar-default');
            })

            function showRegister() {
                $('.hidden').show();
                $('#info-inside').hide();
            }
        </script>
    </body>
</html>