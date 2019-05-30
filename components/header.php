    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/OTHERWEBSITES/cipurza/css/style.css" type="text/css">

    <!-- Animate CSS -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/animate.css/3.7.0/animate.min.css">

    <!-- Website Related CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css" integrity="sha384-oS3vJWv+0UjzBfQzYUhtDYW+Pj2yciDJxpsK1OYPAYjqT085Qq/1cq5FLXAZQ7Ay" crossorigin="anonymous">
    <link rel="stylesheet" href="http://localhost/OTHERWEBSITES/cipurza/css/header.css" type="text/css">
</head>
<body>
    <script>
        function changePage($path = '/') {
            window.location.href = "http://localhost/OTHERWEBSITES/cipurza" + $path;
        }
    </script>
    <div class="container-fluid navbar-white" id="navbar">
        <div class="row">
            <div class="col" id="left"><i class="fas fa-home" onclick="changePage();"></i></div>
            <div class="col-6" id="middle"></div>
            <div class="col" id="right"><i class="fas fa-sign-in-alt"></i><i class="fas fa-sliders-h"></i></div>
        </div>
    </div>