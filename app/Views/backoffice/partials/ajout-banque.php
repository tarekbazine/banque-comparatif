<div class="hide-show" id="ajout-banque" style="display: none">
    <div class="col-sm-12">
        <form id="ajout-banque-form" class="form">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nom</label>
                    <input type="text" class="form-control" id="inputName" placeholder="Nom du Banque">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Adresse</label>
                <input type="text" class="form-control" id="inputAddress" placeholder="Adresse">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTel">Tel</label>
                    <input type="tel" class="form-control" id="inputTel" placeholder="Tel">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFax">Fax</label>
                    <input type="tel" class="form-control" id="inputFax" placeholder="Fax">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Ajouter Banque</button>
        </form>
    </div>
</div>



<script>
    $('#ajout-banque-form').submit(function (event) {

        var txt;
        var r = confirm("Svp confirmer la ajout !");
        if (r == true) {
            txt = "You pressed OK!";
            var dataForm = {
                nom:$('#inputName').val(),
                siege_social:$('#inputAddress').val(),
                telephone:$('#inputTel').val(),
                fax:$('#inputFax').val()
            };
            $.ajax({
                type: 'POST',
                url: 'administrateur/insererBanque',
                data: dataForm, // our data object
                dataType: 'json',
                encode: true
            })
            // using the done promise callback
                .done(function (data) {
                    if (data == 1){
//                         alert('cc');
                        location.reload();
                    }
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
