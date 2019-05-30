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
                        <div class="form-group">
                            <label for="nickname">Nickname</label>
                            <input type="text" class="form-control" name="nickname" id="form-nickname" placeholder="Inserisci il tuo nickname" required>
                        </div>
                    </div>
                    <div class="col">
                        <div class="form-group">
                            <label for="firstname">Nome</label>
                            <input type="text" class="form-control" name="firstname" id="form-firstname" placeholder="Inserisci il tuo nome" required>
                        </div>
                        <div class="form-group">
                            <label for="lastname">Cognome</label>
                            <input type="text" class="form-control" name="lastname" id="form-lastname" placeholder="Inserisci il tuo cognome" required>
                        </div>
                        <div class="form-group">
                            <label for="region">Regione</label>
                            <select name="region" class="form-control" id="form-region" required>
                                <option value="Abruzzo">Abruzzo</option>
                                <option value="Basilicata">Basilicata</option>
                                <option value="Calabria">Calabria</option>
                                <option value="Campania">Campania</option>
                                <option value="Emilia-Romagna">Emilia-Romagna</option>
                                <option value="Friuli-Venezia Giulia">Friuli-Venezia Giulia</option>
                                <option value="Lazio">Lazio</option>
                                <option value="Liguria">Liguria</option>
                                <option value="Lombardia">Lombardia</option>
                                <option value="Marche">Marche</option>
                                <option value="Molise">Molise</option>
                                <option value="Piemone">Piemone</option>
                                <option value="Puglia">Puglia</option>
                                <option value="Sardegna">Sardegna</option>
                                <option value="Sicilia">Sicilia</option>
                                <option value="Toscana">Toscana</option>
                                <option value="Trentino-Alto Adige">Trentino-Alto Adige</option>
                                <option value="Umbria">Umbria</option>
                                <option value="Valle d'Aosta">Valle d'Aosta</option> 
                                <option value="Veneto">Veneto</option> 
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="city">Città</label>
                            <select name="city" class="form-control" id="form-city" required>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="address">Indirizzo</label>
                            <input type="text" class="form-control" name="address" id="form-address" required>
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
        <script>
            var lookup = {
            'Abruzzo': [
                'Chieti', 'L\'Aquila', 'Pescara', 'Teramo'
            ],
            'Basilicata': [
                'Matera', 'Potenza'
            ],
            'Calabria': [
                'Catanzaro', 'Cosenza', 'Crotone', 'Reggio Calabria', 'Vibo Valentia'
            ],
            'Campania': [
                'Avellino', 'Benevento', 'Caserta', 'Napoli', 'Salerno'
            ],
            'Emilia-Romagna': [
                'Bologna', 'Ferrara', 'Forlì-Cesena', 'Modena', 'Parma', 'Piacenza', 'Ravenna', 'Reggio Emilia', 'Rimini'
            ],
            'Friuli-Venezia Giulia': [
                'Gorizia', 'Pordenone', 'Trieste', 'Udine'
            ],
            'Lazio': [
                'Frosinone', 'Latina', 'Rieti', 'Roma Capitale', 'Viterbo'
            ],
            'Liguria': [
                'Genova', 'Imperia', 'La Spezia', 'Savona'
            ],
            'Lombardia': [
                'Bergamo', 'Brescia', 'Como', 'Cremona', 'Lecco', 'Lodi', 'Mantova', 'Milano', 'Monza (e Brianza)', 'Pavia', 'Pavia', 'Sondrio', 'Varese'
            ],
            'Marche': [
                'Ancona', 'Ascoli Piceno', 'Fermo', 'Macerata', 'Pesaro (e Urbino)'
            ],
            'Molise': [
                'Campobasso', 'Isernia'
            ],
            'Piemonte': [
                'Alessandria', 'Asti', 'Biella', 'Cuneo', 'Novara', 'Torino', 'Verbano-Cusio-Ossola', 'Vercelli'
            ],
            'Puglia': [
                'Bari', 'Barietta-Andria-Trani', 'Brindisi', 'Lecce', 'Foggia', 'Taranto'
            ],
            'Sardegna': [
                'Cagliari', 'Nuoro', 'Oristano', 'Sassari', 'Sud Sardegna'
            ],
            'Sicilia': [
                'Agrigento', 'Caltanissetta', 'Catania', 'Enna', 'Messina', 'Palermo', 'Ragusa', 'Siracusa', 'Trapani'
            ],
            'Toscana': [
                'Arezzo', 'Firenze', 'Grosseto', 'Livorno', 'Lucca', 'Massa e Carrara', 'Pisa', 'Pistoia', 'Prato', 'Siena'
            ],
            'Trentino-Alto Adige': [
                'Bolzano', 'Trento'
            ],
            'Umbria': [
                'Perugia', 'Terni'
            ],
            'Valle d\'Aosta': [
                'Aosta'
            ],
            'Veneto': [
                'Belluno', 'Padova', 'Rovigo', 'Treviso', 'Venezia', 'Verona', 'Vicenza'
            ]
        };
        $('#form-region').on('change', function() {
            var selectedValue = $(this).val();
            $('#form-city').empty();
            for(i = 0; i < lookup[selectedValue].length; i++) {
                $('#form-city').append("<option value='" + lookup[selectedValue][i] + "'>" + lookup[selectedValue][i] + "</option>");
            }
        });
        $(document).ready(function() {
            for(i = 0; i < lookup['Abruzzo'].length; i++) {
                $('#form-city').append("<option value='" + lookup['Abruzzo'][i] + "'>" + lookup['Abruzzo'][i] + "</option>");
            }        
        });
        </script>
    </body>
</html>
<?php } else echo "Error 500: Forbidden request!"; ?>