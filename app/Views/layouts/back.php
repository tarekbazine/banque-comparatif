<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="front/img/favi.png"/>

    <title>ADMINISTRATION - BANQUE COMPARATIF</title>

    <link href="front/css/custom.css" rel="stylesheet" type="text/css">
    <link href="front/font/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <style>
        html, body {
            height: 100%;
        }

        .btn-action {
            background-color: rgba(0, 188, 212, 0.52);
            height: 200px;
            padding: 3%;
            margin: 2% 2% 1% 6%;
            font-size: 2em;
        }

        .form {
            padding: 2% 5% 5% 5%;
        }

        .small-card {
            padding: 1%;
            background-color: rgba(0, 188, 212, 0.52);
            border: 8px solid white;
        }

        .col-sm-9{
            overflow-y: scroll;
            padding-top: 2%;
        }

        .logout{
            position: fixed;
            bottom: 10px;
            left: 10px;
        }
    </style>

    <script src="front/js/jquery.js"></script>
</head>
<body>

<section class="h-100 container-fluid">

    <div class="h-100 row">

        <div class="h-100 d-inline-block col-sm-3" style="background-color: rgba(0, 188, 212, 0.52)">
            <div class="list-group" style="margin-top: 15%">
                <a id="btn-ajout-banque" href="#" class="list-group-item list-group-item-action">Ajout Banque</a>
                <a id="btn-modif-banque" href="#" class="list-group-item list-group-item-action">MAJ info Banque</a>
                <a id="btn-supprime-banque" href="#" class="list-group-item list-group-item-action">Supprimer Banque</a>
                <a href="#" class="list-group-item list-group-item-action">Modifie Slide-show</a>
                <a href="#" class="list-group-item list-group-item-action">Modifie presetation info</a>
            </div>

            <form action="administrateur/logout">
                <button type="submit" class="logout btn btn-warning">Deconnexion</button>
            </form>
        </div>

        <div class="col-sm-9">

            <div class="hide-show row text-center" id="btn-action">
                <div class="btn-action col-sm-3">
                    Ajout Banque
                </div>
                <div class="btn-action col-sm-3">
                    MAJ info Banque
                </div>
                <div class="btn-action col-sm-3">
                    Supprimer Banque
                </div>
                <div class="btn-action col-sm-3">
                    Modifie Slide-show
                </div>
                <div class="btn-action col-sm-3">
                    Modifie presetation info
                </div>
            </div>

            <?php include APP . 'Views/backoffice/partials/ajout-banque.php'; ?>

            <?php include APP . 'Views/backoffice/partials/supprime-banque.php'; ?>

            <?php include APP . 'Views/backoffice/partials/modif-banque.php'; ?>

        </div>


    </div>

</section>


<script>
    $('#btn-ajout-banque').click(function (event) {
        $('.list-group a').removeClass('active');
        $(this).addClass('active');
        $('.hide-show ').hide();
        $('#ajout-banque').show();
        event.preventDefault();
    });
    $('#btn-supprime-banque').click(function (event) {
        $('.list-group a').removeClass('active');
        $(this).addClass('active');
        $('.hide-show ').hide();
        $('#supprime-banque').show();
        event.preventDefault();
    });
    $('#btn-modif-banque').click(function (event) {
        $('.list-group a').removeClass('active');
        $(this).addClass('active');
        $('.hide-show ').hide();
        $('#modif-banque').show();
        event.preventDefault();
    });
</script>
</body>
</html>