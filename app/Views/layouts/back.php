<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <title>ADMINISTRATION - BANQUE COMPARATIF</title>

    <link href="/front/css/bootstrap.css" rel="stylesheet" type="text/css">
    <link href="/front/css/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
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

    <script src="/front/js/jquery.js"></script>
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

            <form action="">
                <button type="submit" class="logout btn btn-warning">Logout</button>
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


<script src="/front/js/bootstrap.js"></script>
<script>
    $('#btn-ajout-banque').click(function () {
        $('.list-group a').removeClass('active');
        $(this).addClass('active');
        $('.hide-show ').hide();
        $('#ajout-banque').show();
    });
    $('#btn-supprime-banque').click(function () {
        $('.list-group a').removeClass('active');
        $(this).addClass('active');
        $('.hide-show ').hide();
        $('#supprime-banque').show();
    });
    $('#btn-modif-banque').click(function () {
        $('.list-group a').removeClass('active');
        $(this).addClass('active');
        $('.hide-show ').hide();
        $('#modif-banque').show();
    });
</script>
</body>
</html>