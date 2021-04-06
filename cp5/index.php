<!DOCTYPE html>
<html lang="fr">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css" integrity="sha384-B0vP5xmATw1+K9KRQjQERJvTumQW0nPEzvF6L/Z6nronJ3oUOFUFpCjEUQouq2+l" crossorigin="anonymous">
</head>

<body class="container">
    <?php
    // Calcule l'écart en jours entre le 4 janvier 2021 et aujourd'hui
    $start = '2021-01-04';
    $date1 = strtotime('now');
    $date2 = strtotime($start);
    $gap = floor(($date1 - $date2) / 60 / 60 / 24);
    ?>

    <div class="jumbotron">
        <h1 class="display-4">Espace abonnés</h1>
        <p class="lead">Cet espace est réservé aux abonné.e.s du CDA de Compiègne. Il est en place depuis <?php echo $gap; ?> jours. Il compte aujourd'hui xxx abonné.e.s.</p>
        <hr class="my-3">
        <p>Cliquer sur le bouton ci-dessous pour vous identifier :</p>
        <button class="btn btn-success" id="btnLogin">Se connecter</button>
    </div>

    <section id="team" class="d-flex flex-wrap">
        <div class="card m-3" style="width:15rem">
            <img src="pics/boys.jpg" alt="" class="card-img-top">
            <div class="card-body">
                <h5 class="card-title">Lak</h5>
                <p><strong>Age : </strong>55 ans</p>
                <p><strong>Taille : </strong>1.70m</p>
            </div>
        </div>
        <?php
        // Imports
        include_once('inc/team.inc.php');

        // Parcourt le tableau TEAM
        $pattern =
            '<div class="card m-3" style="width:15rem">
            <img src="pics/%s.jpg" alt="" class="card-img-top">
            <div class="card-body">
            <h5 class="card-title">%s</h5>
            <p><strong>Age : </strong>%d ans</p>
            <p><strong>Taille : </strong>%fm</p>
            </div>
            </div>';
        $html = '';
        foreach ($team as $member) {
            $html .= sprintf($pattern, ($member['female'] ? 'girls' : 'boys'), $member['fname'], 20, $member['size']);
        }
        echo $html;
        ?>
    </section>

    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
</body>

</html>