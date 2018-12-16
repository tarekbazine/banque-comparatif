<div class="hide-show" id="modif-banque" style="display: none">

    <div class="col-sm-12" id="modif-banque-listing">

        <div class="row">
            <?php foreach ($banques as $banque) { ?>
                <div id="card-<?= $banque->id_banque ?>" class="col-md-4 small-card rounded">
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
                            <form class="btn-modif-banque" style="margin-top: 5px" id="<?= $banque->id_banque ?>">
                                <button type="submit" class="btn btn-warning float-right">Modifie</button>
                            </form>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>

    </div>

</div>

<script>

    var id_element = '';

    var banques = <?= json_encode($banques_with_id) ?>;

    $('form.btn-modif-banque').submit(function (event) {

        id_element = $(this).attr('id');

//        alert($(this).attr('id'));


        $('#modif-banque-listing').remove();

        var modif_bank = banques[id_element];

        var html = `    <div class="col-sm-12" id="modif-banque-form-section">

        <form class="form-modif-banque-ajax">
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputName">Nom</label>
                    <input value="` + modif_bank["nom"] + `" type="text" class="form-control" id="inputName2" placeholder="Nom du Banque">
                </div>
            </div>
            <div class="form-group">
                <label for="inputAddress">Adresse</label>
                <input value="` + modif_bank["siege_social"] + `" type="text" class="form-control" id="inputAddress2" placeholder="Adresse">
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="inputTel">Tel</label>
                    <input value="` + modif_bank["telephone"] + `" type="tel" class="form-control" id="inputTel2" placeholder="Tel">
                </div>
                <div class="form-group col-md-6">
                    <label for="inputFax">Fax</label>
                    <input value="` + modif_bank["fax"] + `" type="tel" class="form-control" id="inputFax2" placeholder="Fax">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">MAJ Banque</button>
        </form>

        <form action="administrateur/majMonetique" method="post" class="form-modif-monetique-banque-ajax" id="` + modif_bank["id_monetique"]+ ` ">
            <h4 style="margin-top:65px">Monétique</h4>
            <br>
            <input value="` + modif_bank["id_monetique"] + `" name="id_monetique" type="hidden">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="carte_cib">carte cib</label>
                    <input value="` + modif_bank["carte_cib"] + `" type="tel" class="form-control" name="carte_cib" placeholder="carte cib">
                </div>
                <div class="form-group col-md-6">
                    <label for="emission_premiere_carte">emission premiere carte</label>
                    <input value="` + modif_bank["emission_premiere_carte"] + `" type="tel" class="form-control" name="emission_premiere_carte"
                           placeholder="emission premiere carte">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="renouvelement">renouvelement</label>
                    <input value="` + modif_bank["renouvelement"] + `" type="tel" class="form-control" name="renouvelement" placeholder="renouvelement">
                </div>
                <div class="form-group col-md-6">
                    <label for="reconfection">reconfection</label>
                    <input value="` + modif_bank["reconfection"] + `" type="tel" class="form-control" name="reconfection" placeholder="reconfection">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="reedition_code_secret">reedition code secret</label>
                    <input value="` + modif_bank["reedition_code_secret"] + `" type="tel" class="form-control" name="reedition_code_secret"
                           placeholder="reedition code secret">
                </div>
                <div class="form-group col-md-6">
                    <label for="comission_retrait_sur_dab_banque">comission retrait sur dab banque</label>
                    <input value="` + modif_bank["comission_retrait_sur_dab_banque"] + `" type="tel" class="form-control" name="comission_retrait_sur_dab_banque"
                           placeholder="comission retrait sur dab banque">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="comission_retrait_sur_dab_confrere">comission retrait sur dab
                        confrere</label>
                    <input value="` + modif_bank["comission_retrait_sur_dab_confrere"] + `" type="tel" class="form-control" name="comission_retrait_sur_dab_confrere"
                           placeholder="comission retrait sur dab confrere">
                </div>
                <div class="form-group col-md-6">
                    <label for="commission_paiement_sur_tpe_client">commission paiement sur tpe
                        client</label>
                    <input value="` + modif_bank["commission_paiement_sur_tpe_client"] + `" type="tel" class="form-control" name="commission_paiement_sur_tpe_client"
                           placeholder="commission paiement sur tpe client">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="commission_paiement_sur_tpe_commercant">commission paiement sur tpe
                        commercant</label>
                    <input value="` + modif_bank["commission_paiement_sur_tpe_commercant"] + `" type="tel" class="form-control" name="commission_paiement_sur_tpe_commercant"
                           placeholder="commission paiement sur tpe commercant">
                </div>
                <div class="form-group col-md-6">
                    <label for="carte_internationale">carte internationale</label>
                    <input value="` + modif_bank["carte_internationale"] + `" type="tel" class="form-control" name="carte_internationale"
                           placeholder="carte internationale">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="octroi">octroi</label>
                    <input value="` + modif_bank["octroi"] + `" type="tel" class="form-control" name="octroi" placeholder="octroi">
                </div>
                <div class="form-group col-md-6">
                    <label for="mise_en_opposition">mise en opposition</label>
                    <input value="` + modif_bank["mise_en_opposition"] + `" type="tel" class="form-control" name="mise_en_opposition"
                           placeholder="mise en opposition">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="re_confection">re confection</label>
                    <input value="` + modif_bank["re_confection"] + `" type="tel" class="form-control" name="re_confection" placeholder="re confection">
                </div>
                <div class="form-group col-md-6">
                    <label for="reedition_du_code_secret">reedition du code secret</label>
                    <input value="` + modif_bank["reedition_du_code_secret"] + `" type="tel" class="form-control" name="reedition_du_code_secret"
                           placeholder="reedition du code secret">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="changement_de_code_pin">changement de code pin</label>
                    <input value="` + modif_bank["changement_de_code_pin"] + `" type="tel" class="form-control" name="changement_de_code_pin"
                           placeholder="changement de code pin">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Maj Monétique</button>
        </form>

        <form action="administrateur/maj_gestion_tenue_compte" method="post">
            <h4 style="margin-top:65px">Gestion et tenue de compte</h4>
            <br>
                <input value="` + modif_bank["id_gestion_compte"] + `" name="id_gestion_compte" type="hidden">

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="carte_cib">ouverture compte delivrance chequier</label>
                            <input value="` + modif_bank["ouverture_compte_delivrance_chequier"] + `" type="tel" class="form-control" name="ouverture_compte_delivrance_chequier">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="emission_premiere_carte">frais tenue compte courant</label>
                            <input value="` + modif_bank["frais_tenue_compte_courant"] + `" type="tel" class="form-control" name="frais_tenue_compte_courant"
                                   >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="renouvelement">frais tenue compte professionnel</label>
                            <input value="` + modif_bank["frais_tenue_compte_professionnel"] + `" type="tel" class="form-control" name="frais_tenue_compte_professionnel">
                        </div>
                        <div class="form-group col-md-6">
                            <label for="reconfection">frais tenue compte cheque</label>
                            <input value="` + modif_bank["frais_tenue_compte_cheque"] + `" type="tel" class="form-control" name="frais_tenue_compte_cheque">
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="reedition_code_secret">frais tenue compte sur livret</label>
                            <input value="` + modif_bank["frais_tenue_compte_sur_livret"] + `" type="tel" class="form-control" name="frais_tenue_compte_sur_livret"
                                   >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="comission_retrait_sur_dab_banque">tenue compte en devise</label>
                            <input value="` + modif_bank["tenue_compte_en_devise"] + `" type="tel" class="form-control" name="tenue_compte_en_devise"
                                   >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="comission_retrait_sur_dab_confrere">fermeture compte courant</label>
                            <input value="` + modif_bank["fermeture_compte_courant"] + `" type="tel" class="form-control" name="fermeture_compte_courant"
                                   >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="commission_paiement_sur_tpe_client">fermeture compte cheque</label>
                            <input value="` + modif_bank["fermeture_compte_cheque"] + `" type="tel" class="form-control" name="fermeture_compte_cheque"
                                   >
                        </div>
                    </div>
                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="commission_paiement_sur_tpe_commercant">fermeture compte sur livret</label>
                            <input value="` + modif_bank["fermeture_compte_sur_livret"] + `" type="tel" class="form-control" name="fermeture_compte_sur_livret"
                                   >
                        </div>
                        <div class="form-group col-md-6">
                            <label for="carte_internationale">fermeture compte devise</label>
                            <input value="` + modif_bank["fermeture_compte_devise"] + `" type="tel" class="form-control" name="fermeture_compte_devise"
                                   >
                        </div>
                    </div>

                    <button type="submit" class="btn btn-primary">Maj Gestion et tenue de compte</button>
        </form>


    <form action="administrateur/maj_operations_paiement" method="post">
            <h4 style="margin-top:65px">Opération de paiement</h4>
            <br>
            <input value="` + modif_bank["id_operations_paiement"] + `" name="id_operations_paiement" type="hidden">

            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="carte_cib">versement especes client agence</label>
                    <input value="` + modif_bank["versement_especes_client_agence"] + `" type="tel" class="form-control" name="versement_especes_client_agence">
                </div>
                <div class="form-group col-md-6">
                    <label for="emission_premiere_carte">versement especes tiers</label>
                    <input value="` + modif_bank["versement_especes_tiers"] + `" type="tel" class="form-control" name="versement especes_tiers"
                           >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="renouvelement">versement especes deplace lient autre agence</label>
                    <input value="` + modif_bank["versement_especes_deplace_lient_autre_agence"] + `" type="tel" class="form-control" name="versement_especes_deplace_lient_autre_agence">
                </div>
                <div class="form-group col-md-6">
                    <label for="reconfection">virement recu compte meme agence</label>
                    <input value="` + modif_bank["virement_recu_compte_meme_agence"] + `" type="tel" class="form-control" name="virement_recu_compte_meme_agence">
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="reedition_code_secret">virement recu compte autre agence meme banque</label>
                    <input value="` + modif_bank["virement_recu_compte_autre_agence_meme_banque"] + `" type="tel" class="form-control" name="virement_recu_compte_autre_agence_meme_banque"
                           >
                </div>
                <div class="form-group col-md-6">
                    <label for="comission_retrait_sur_dab_banque">virement devise recu etranger</label>
                    <input value="` + modif_bank["virement_devise_recu_etranger"] + `" type="tel" class="form-control" name="virement_devise_recu_etranger"
                           >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="comission_retrait_sur_dab_confrere">rertait especes</label>
                    <input value="` + modif_bank["rertait_especes"] + `" type="tel" class="form-control" name="rertait_especes"
                           >
                </div>
                <div class="form-group col-md-6">
                    <label for="commission_paiement_sur_tpe_client">retrait especes guichets autre agence</label>
                    <input value="` + modif_bank["retrait_especes_guichets_autre_agence"] + `" type="tel" class="form-control" name="retrait_especes_guichets_autre_agence"
                           >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="commission_paiement_sur_tpe_commercant">emission cheque banque</label>
                    <input value="` + modif_bank["emission_cheque_banque"] + `" type="tel" class="form-control" name="emission_cheque_banque"
                           >
                </div>
                <div class="form-group col-md-6">
                    <label for="carte_internationale">emission cheque banque deplace</label>
                    <input value="` + modif_bank["emission_cheque_banque_deplace"] + `" type="tel" class="form-control" name="emission_cheque_banque_deplace"
                           >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="octroi">annulation cheque banque</label>
                    <input value="` + modif_bank["annulation_cheque_banque"] + `" type="tel" class="form-control" name="annulation_cheque_banque">
                </div>
                <div class="form-group col-md-6">
                    <label for="mise_en_opposition">virement compte compte</label>
                    <input value="` + modif_bank["virement_compte_compte"] + `" type="tel" class="form-control" name="virement_compte_compte"
                           >
                </div>
            </div>
            <div class="form-row">
                <div class="form-group col-md-6">
                    <label for="octroi">virement ordonne en faveur client autre agence</label>
                    <input value="` + modif_bank["virement_ordonne_en_faveur_client_autre_agence"] + `" type="tel" class="form-control" name="virement_ordonne_en_faveur_client_autre agence">
                </div>
            </div>
            <button type="submit" class="btn btn-primary">Maj Opération de paiement</button>
        </form>


    </div>`;

        $('#modif-banque').append(html);

        initForms();

        event.preventDefault();
    });

    function initForms() {

        $('form.form-modif-banque-ajax').submit(function (event) {

            var txt;
            var r = confirm("Svp confirmer la modification !");
            if (r == true) {
                txt = "You pressed OK!";
                var dataForm = {
                    nom: $('#inputName2').val(),
                    siege_social: $('#inputAddress2').val(),
                    telephone: $('#inputTel2').val(),
                    fax: $('#inputFax2').val(),
                    id_banque: id_element
                };
//                console.log(dataForm);
                $.ajax({
                    type: 'POST',
                    url: 'administrateur/majBanque',
                    data: dataForm, // our data object
                    dataType: 'json',
                    encode: true
                })
                // using the done promise callback
                    .done(function (data) {
                        if (data == 1) {
//                         alert('cc');
                            location.reload();
                        }
                    });
            } else {
                txt = "You pressed Cancel!";
                event.preventDefault();
                return;
            }

            event.preventDefault();
        });


    }


</script>