<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <link rel="shortcut icon" type="image/png" href="front/img/favi.png"/>
    <title>BANQUE COMPARATIF</title>

    <link href="front/css/custom.css" rel="stylesheet" type="text/css">
    <link href="front/font/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css">
    <link href="front/css/core.css" rel="stylesheet" type="text/css">

    <script src="front/js/jquery.js"></script>
</head>
<body>

<?php include APP . 'Views/partials/header.php'; ?>


<?php include APP . 'Views/partials/slide-show.php'; ?>


<section class="container-fluid">

    <div class="row">

        <?php include APP . $content_path; ?>

    </div>

</section>

<?php include APP . 'Views/partials/footer.php'; ?>

<script>

    function plusDetails(me) {
        if (me.getAttribute('is_hide') === 'true') {
            me.innerText = 'Moins de détails' ;
            $('#'+me.id+'.table-prestations').show();
            me.setAttribute("is_hide", "0");
        } else {
            me.innerText = 'Plus de détails';
            $('#'+me.id+'.table-prestations').hide();
            me.setAttribute("is_hide", "true");
        }
    }

</script>
<script src="front/js/filtrage.js"></script>
</body>
</html>