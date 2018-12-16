
<div class="col-md-8" style="margin-top: 2%">
    <h2><?= $presentation->titre ?></h2>
    <p>
        <?= $presentation->resume ?>
    </p>
    <img class="img-fluid" alt="image presentation" src="<?= $presentation->image ?>">
</div>
<div class="col-md-4" style="margin-top: 2%">
    <h5>Contactez nous</h5>
    <div>
        <i class="fa fa-map-marker" aria-hidden="true"></i> <?= $presentation->address ?>
    </div>
    <div>
        <i class="fa fa-phone" aria-hidden="true"></i> <?= $presentation->tel ?>
        <i class="fa fa-fax" aria-hidden="true"></i> <?= $presentation->fax ?>
    </div>
    <div class="social-media">
        <i class="fa fa-facebook-square" aria-hidden="true"></i>
        <i class="fa fa-youtube-square" aria-hidden="true"></i>
        <i class="fa fa-twitter-square" aria-hidden="true"></i>
    </div>
</div>