<form id="comparer-form" class="col-md-8 offset-md-2" style="margin-top: 2%;margin-bottom: 2%;">
    <h5 class="text-center">Choisir les Banques a comparer</h5>
    <div class="form-row">
        <div class="form-group col-md-6">
            <select id="first-bank" class="form-control">
                <option value="0">Choose...</option>
                <?php foreach ($banques as $id => $banque) { ?>
                    <option value="<?= $banque->id_banque ?>"><?= $banque->nom ?></option>
                <?php } ?>
            </select>
        </div>
        <div class="form-group col-md-6">
            <select id="second-bank" class="form-control">
                <option value="0">Choose...</option>
                <?php foreach ($banques as $id => $banque) { ?>
                    <option value="<?= $banque->id_banque ?>"><?= $banque->nom ?></option>
                <?php } ?>
            </select>
        </div>
    </div>

    <div class="offset-md-4 col-md-4">
        <button type="submit" class="btn btn-primary btn-block">
            Comparer
        </button>
    </div>
</form>

<div class="col-md-12" id="compare-section">



</div>


<script>
    var banques = <?= json_encode($banques); ?>;

    $('#comparer-form').submit(function (event) {

        if ($('#first-bank').val() == 0 ||
            $('#second-bank').val() == 0) {
            alert('Svp choisir les banques !');
            event.preventDefault();
            return;
        }

        var fistBanque = banques[$('#first-bank').val()],
            secondBanque = banques[$('#second-bank').val()];

//        console.log(fistBanque, secondBanque);

        comparerBanque(fistBanque, secondBanque);

        $('.color-able').each(function (i) {
//           console.log($(this).children('td:nth-child(2)'));
            $(this).children('td:nth-child(2)')
                .addClass(colorCel(fistBanque[$(this).attr('id')],secondBanque[$(this).attr('id')]));
            $(this).children('td:nth-child(3)')
                .addClass(colorCel(secondBanque[$(this).attr('id')],fistBanque[$(this).attr('id')]));
        });

        function isNormalInteger(str) {
            var n = Math.floor(Number(str));
            return String(n) === str && n >= 0;
        }

        $('td').each(function(){
            if(isNormalInteger($(this).text())){
                if (0 == parseInt($(this).text()))
                    $(this).text('GRATUIT');
                else
                    $(this).text($(this).text() +' DA');
            }
        });

        event.preventDefault();
    });

    function comparerBanque(firstBanque, secondBanque) {
        $('#compare-section').empty();

        var html = `<article class="bank-card rounded">
        <div class="row">

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-fluid" src="front/img/logo.png">
                    </div>
                    <div class="col-md-9">
                        <h5>` + firstBanque["nom"] + `</h5>
                        <div>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            ` + firstBanque["siege_social"] + `
                        </div>
                        <div>
                            <i class="fa fa-phone" aria-hidden="true"></i> ` + firstBanque["telephone"] + `
                            <i class="fa fa-fax" aria-hidden="true"></i> ` + firstBanque["fax"] + `
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-md-6">
                <div class="row">
                    <div class="col-md-3">
                        <img class="img-fluid" src="front/img/logo.png">
                    </div>
                    <div class="col-md-9">
                        <h5>` + secondBanque["nom"] + `</h5>
                        <div>
                            <i class="fa fa-map-marker" aria-hidden="true"></i>
                            ` + secondBanque["siege_social"] + `
                        </div>
                        <div>
                            <i class="fa fa-phone" aria-hidden="true"></i> ` + secondBanque["telephone"] + `
                            <i class="fa fa-fax" aria-hidden="true"></i> ` + secondBanque["fax"] + `
                        </div>
                    </div>
                </div>
            </div>


            <div class="col-md-12 table-prestations-comparatif">
                <h4>Gestion et tenue de compte</h4>
                <br>
                <table class="table table-striped text-center">

                    <thead>
                    <tr>
                        <th rowspan="2">GESTION ET TENUE DE COMPTE</th>
                        <th colspan="2">COMMISSION / FRAIS HT</th>
                    </tr>
                    <tr>
                        <th>` + firstBanque["nom"] + `</th>
                        <th>` + secondBanque["nom"] + `</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr class="color-able" id="ouverture_compte_delivrance_chequier">
                        <th>Ouverture de compte et délivrance chéquier</th>
                        <td>` + firstBanque["ouverture_compte_delivrance_chequier"] + `</td>
                        <td>` + secondBanque["ouverture_compte_delivrance_chequier"] + `</td>
                    </tr>
                    <tr class="color-able" id="frais_tenue_compte_courant">
                        <th>Frais de tenue de compte courant</th>
                        <td>` + firstBanque["frais_tenue_compte_courant"] + `</td>
                        <td>` + secondBanque["frais_tenue_compte_courant"] + `</td>
                    </tr>
                    <tr class="color-able" id="frais_tenue_compte_professionnel">
                        <th>Frais de tenue de compte professionnel</th>
                        <td>` + firstBanque["frais_tenue_compte_professionnel"] + `</td>
                        <td>` + secondBanque["frais_tenue_compte_professionnel"] + `</td>
                    </tr>
                    <tr class="color-able" id="frais_tenue_compte_cheque">
                        <th>Frais de tenue de compte chèque</th>
                        <td>` + firstBanque["frais_tenue_compte_cheque"] + `</td>
                        <td>` + secondBanque["frais_tenue_compte_cheque"] + `</td>
                    </tr>
                    <tr class="color-able" id="frais_tenue_compte_sur_livret">
                        <th>Frais de tenue de compte sur livret</th>
                        <td>` + firstBanque["frais_tenue_compte_sur_livret"] + `</td>
                        <td>` + secondBanque["frais_tenue_compte_sur_livret"] + `</td>
                    </tr>
                    <tr class="color-able" id="tenue_compte_en_devise">
                        <th>Tenue de compte en devise</th>
                        <td>` + firstBanque["tenue_compte_en_devise"] + `</td>
                        <td>` + secondBanque["tenue_compte_en_devise"] + `</td>
                    </tr>
                    <tr class="color-able" id="fermeture_compte_courant">
                        <th>Fermeture compte courant</th>
                        <td>` + firstBanque["fermeture_compte_courant"] + `</td>
                        <td>` + secondBanque["fermeture_compte_courant"] + `</td>
                    </tr>
                    <tr class="color-able" id="fermeture_compte_cheque">
                        <th>Fermeture compte chèque</th>
                        <td>` + firstBanque["fermeture_compte_cheque"] + `</td>
                        <td>` + secondBanque["fermeture_compte_cheque"] + `</td>
                    </tr>
                    <tr class="color-able" id="fermeture_compte_sur_livret">
                        <th>Fermeture compte sur livret</th>
                        <td>` + firstBanque["fermeture_compte_sur_livret"] + `</td>
                        <td>` + secondBanque["fermeture_compte_sur_livret"] + `</td>
                    </tr>
                    <tr class="color-able" id="fermeture_compte_devise">
                        <th>Fermeture compte devise</th>
                        <td>` + firstBanque["fermeture_compte_devise"] + `</td>
                        <td>` + secondBanque["fermeture_compte_devise"] + `</td>
                    </tr>
                    </tbody>

                </table>

                <br>
                <h4>Opération de paiement</h4>
                <br>
                <table class="table table-striped text-center">

                    <thead>
                    <tr>
                        <th rowspan="2">OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES</th>
                        <th colspan="2">COMMISSION / FRAIS HT</th>
                    </tr>
                    <tr>
                        <th>` + firstBanque["nom"] + `</th>
                        <th>` + secondBanque["nom"] + `</th>
                    </tr>
                    </thead>

                    <tbody>
                    <tr class="color-able" id="versement_especes_client_agence">
                        <td>Versement espèces (Client agence)</td>
                        <td>` + firstBanque["versement_especes_client_agence"] + `</td>
                        <td>` + secondBanque["versement_especes_client_agence"] + `</td>
                    </tr>
                    <tr class="color-able" id="versement especes_tiers">
                        <td>Versement espèces (Tiers)</td>
                        <td>` + firstBanque["versement_especes_tiers"] + `</td>
                        <td>` + secondBanque["versement_especes_tiers"] + `</td>
                    </tr>
                    <tr class="color-able" id="versement_especes_deplace_lient_autre_agence">
                        <td>Versement espèces déplacé (Client autre agence)</td>
                        <td>` + firstBanque["versement_especes_deplace_lient_autre_agence"] + `</td>
                        <td>` + secondBanque["versement_especes_deplace_lient_autre_agence"] + `</td>
                    </tr>
                    <tr class="color-able" id="virement_recu_compte_meme_agence">
                        <td>Virement reçu d'un compte de la même agence </td>
                        <td>` + firstBanque["virement_recu_compte_meme_agence"] + `</td>
                        <td>` + secondBanque["virement_recu_compte_meme_agence"] + `</td>
                    </tr>
                    <tr class="color-able" id="virement_recu_compte_autre_agence_meme_banque">
                        <td>Virement reçu d'un compte d'une autre agence de la même banque</td>
                        <td>` + firstBanque["virement_recu_compte_autre_agence_meme_banque"] + `</td>
                        <td>` + secondBanque["virement_recu_compte_autre_agence_meme_banque"] + `</td>
                    </tr>
                    <tr class="color-able" id="virement_devise_recu_etranger">
                        <td>Virement devise reçu de l'étranger </td>
                        <td>` + firstBanque["virement_devise_recu_etranger"] + `</td>
                        <td>` + secondBanque["virement_devise_recu_etranger"] + `</td>
                    </tr>
                    <tr class="color-able" id="rertait_especes">
                        <td>Rertait espéces </td>
                        <td>` + firstBanque["rertait_especes"] + `</td>
                        <td>` + secondBanque["rertait_especes"] + `</td>
                    </tr>
                    <tr class="color-able" id="retrait_especes_guichets_autre_agence">
                        <td>Retrait espéces aux guichets d'une autre agence </td>
                        <td>` + firstBanque["retrait_especes_guichets_autre_agence"] + `</td>
                        <td>` + secondBanque["retrait_especes_guichets_autre_agence"] + `</td>
                    </tr>
                    <tr class="color-able" id="emission_cheque_banque">
                        <td>Emission de chèque de banque </td>
                        <td>` + firstBanque["emission_cheque_banque"] + `</td>
                        <td>` + secondBanque["emission_cheque_banque"] + `</td>
                    </tr>
                    <tr class="color-able" id="emission_cheque_banque_deplace">
                        <td>Emission Chèque de banque déplacé </td>
                        <td>` + firstBanque["emission_cheque_banque_deplace"] + `</td>
                        <td>` + secondBanque["emission_cheque_banque_deplace"] + `</td>
                    </tr>
                    <tr class="color-able" id="annulation_cheque_banque">
                        <td>Annulation de chèque de banque (Client) </td>
                        <td>` + firstBanque["annulation_cheque_banque"] + `</td>
                        <td>` + secondBanque["annulation_cheque_banque"] + `</td>
                    </tr>
                    <tr class="color-able" id="virement_compte_compte">
                        <td>Virement de compte à compte (même agence) </td>
                        <td>` + firstBanque["virement_compte_compte"] + `</td>
                        <td>` + secondBanque["virement_compte_compte"] + `</td>
                    </tr>
                    <tr class="color-able" id="virement_ordonne_en_faveur_client_autre agence">
                        <td>Virement ordonné en faveur client d'une autre agence</td>
                        <td>` + firstBanque["virement_ordonne_en_faveur_client_autre_agence"] + `</td>
                        <td>` + secondBanque["virement_ordonne_en_faveur_client_autre_agence"] + `</td>
                    </tr>
                    </tbody>
                </table>

                <br>
                <h4>Monétique</h4>
                <br>
                <table class="table table-striped text-center">

                    <thead>
                    <tr>
                        <th rowspan="2">DESIGNATION</th>
                        <th colspan="2">COMMISSION / FRAIS HT</th>
                    </tr>
                    <tr>
                        <th>` + firstBanque["nom"] + `</th>
                        <th>` + secondBanque["nom"] + `</th>
                    </tr>
                    </thead>



                    <tbody>
                    <tr class="color-able" id="carte_cib">
                        <th>CARTE C.I.B</th>
                        <td>` + firstBanque["carte_cib"] + `</td>
                        <td>` + secondBanque["carte_cib"] + `</td>
                    </tr>
                    <tr class="color-able" id="emission_premiere_carte">
                        <th>Emission de la première carte</th>
                        <td>` + firstBanque["emission_premiere_carte"] + `</td>
                        <td>` + secondBanque["emission_premiere_carte"] + `</td>
                    </tr>
                    <tr class="color-able" id="renouvelement">
                        <th>Renouvelement </th>
                        <td>` + firstBanque["renouvelement"] + `</td>
                        <td>` + secondBanque["renouvelement"] + `</td>
                    </tr>
                    <tr class="color-able" id="reconfection">
                        <th>Reconfection</th>
                        <td>` + firstBanque["reconfection"] + `</td>
                        <td>` + secondBanque["reconfection"] + `</td>
                    </tr>
                    <tr class="color-able" id="reedition_code_secret">
                        <th>Réédition du code secret</th>
                        <td>` + firstBanque["reedition_code_secret"] + `</td>
                        <td>` + secondBanque["reedition_code_secret"] + `</td>
                    </tr>
                    <tr class="color-able" id="comission_retrait_sur_dab_banque">
                        <th>Comission de retrait Sur DAB de la banque</th>
                        <td>` + firstBanque["comission_retrait_sur_dab_banque"] + `</td>
                        <td>` + secondBanque["comission_retrait_sur_dab_banque"] + `</td>
                    </tr>
                    <tr class="color-able" id="comission_retrait_sur_dab_confrere">
                        <th>Comission de retrait Sur DAB confrère</th>
                        <td>` + firstBanque["comission_retrait_sur_dab_confrere"] + `</td>
                        <td>` + secondBanque["comission_retrait_sur_dab_confrere"] + `</td>
                    </tr>
                    <tr class="color-able" id="commission_paiement_sur_tpe_client">
                        <th>Commission de paiement sur TPE/Client</th>
                        <td>` + firstBanque["commission_paiement_sur_tpe_client"] + `</td>
                        <td>` + secondBanque["commission_paiement_sur_tpe_client"] + `</td>
                    </tr>
                    <tr class="color-able" id="commission_paiement_sur_tpe_commercant">
                        <th>Commission de paiement sur TPE/Commerçant</th>
                        <td>` + firstBanque["commission_paiement_sur_tpe_commercant"] + `</td>
                        <td>` + secondBanque["commission_paiement_sur_tpe_commercant"] + `</td>
                    </tr>
                    <tr class="color-able" id="carte_internationale">
                        <th>Carte Internationale</th>
                        <td>` + firstBanque["carte_internationale"] + `</td>
                        <td>` + secondBanque["carte_internationale"] + `</td>
                    </tr>
                    <tr class="color-able" id="octroi">
                        <th>Octroi</th>
                        <td>` + firstBanque["octroi"] + `</td>
                        <td>` + secondBanque["octroi"] + `</td>
                    </tr>
                    <tr class="color-able" id="mise_en_opposition">
                        <th>Mise en opposition</th>
                        <td>` + firstBanque["mise_en_opposition"] + `</td>
                        <td>` + secondBanque["mise_en_opposition"] + `</td>
                    </tr>
                    <tr class="color-able" id="re_confection">
                        <th>Re-confection</th>
                        <td>` + firstBanque["re_confection"] + `</td>
                        <td>` + secondBanque["re_confection"] + `</td>
                    </tr>
                    <tr class="color-able" id="reedition_du_code_secret">
                        <th>Réédition du code secret</th>
                        <td>` + firstBanque["reedition_du_code_secret"] + `</td>
                        <td>` + secondBanque["reedition_du_code_secret"] + `</td>
                    </tr>
                    <tr class="color-able" id="changement_de_code_pin">
                        <th>Changement de code PIN</th>
                        <td>` + firstBanque["changement_de_code_pin"] + `</td>
                        <td>` + secondBanque["changement_de_code_pin"] + `</td>
                    </tr>
                    </tbody>


                </table>
            </div>


        </div>
    </article>`;


        $('#compare-section').append(html);

    }

    function colorCel(val1,val2){
        if (parseInt(val1) > parseInt(val2)){
            return 'table-danger';
        }else return 'table-success'
    }

</script>