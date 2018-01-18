<div class="container">

    <div class="hide-show" id="supprime-banque" style="display: none">

        <div class="row">
            <?php foreach ($banques as $banque) { ?>
                <div class="col-md-4 small-card rounded">
                    <div class="row">
                        <div class="col-md-3">
                            <img class="img-fluid" src="front/img/logo.png">
                        </div>
                        <div class="col-md-9">
                            <h5><?= $banque->nom ?></h5>
                            <div>
                                <i class="fa fa-map-marker" aria-hidden="true"></i>
                                <?= $banque->siege_social ?>
                            </div>
                            <div>
                                <i class="fa fa-phone" aria-hidden="true"></i> <?= $banque->telephone ?>
                                <i class="fa fa-fax" aria-hidden="true"></i> <?= $banque->fax ?>
                            </div>
                            <form class="supprim-banque" style="margin-top: 5px" id="<?= $banque->id_banque ?>">
                                <button type="submit" class="btn btn-danger float-right">Supprimer</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>
</div>

<script>
     $('form.supprim-banque').submit(function (event) {
         alert($(this).attr('id'));

         var txt;
         var r = confirm("Svp confirmer la suppression !");
         if (r == true) {
             txt = "You pressed OK!";
             var dataForm = {
                 id_banque: $(this).attr('id')
             };
             $.ajax({
                 type: 'POST',
                 url: '/administrateur/supprimerBanque',
                 data: dataForm, // our data object
                 dataType: 'json',
                 encode: true
             })
             // using the done promise callback
                 .done(function (data) {
//                     if ()
                     alert(data);
                     console.log(data);
                 });
         } else {
             txt = "You pressed Cancel!";
             event.preventDefault();
             return;
         }

         event.preventDefault();
     });
</script>
