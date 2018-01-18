// $('#filter-form').submit(function (event) {
//     var dataForm = {
//         id_ctg: idType,
//         nom_prd: prd_name
//     };
//     $.ajax({
//         type: 'POST',
//         url: 'http://127.0.0.1/WEB/td_php/backend/addProduct.php',
//         data: dataForm, // our data object
//         dataType: 'json',
//         encode: true
//     })
//     // using the done promise callback
//         .done(function (data) {
//             console.log(data);
//         });
//
//     event.preventDefault();
// });

$('#classer-form').submit(function (event) {

    var presentation_selected = $('#classer-form select').val();
    // alert($('#classer-form select').val());

    $.getJSON("filtre/classer/" + presentation_selected, function (result) {
        $('#banque-listing').empty();
        $.each(result, function (i, banque) {
            displayBanque(banque);
        });
        console.log(result);
    });

    event.preventDefault();
});

$('#filter-form').submit(function (event) {

    var presentation_selected = $('#filter-form select').val(),
        min = $('#min-input').val() || 0,
        max = $('#max-input').val() || 10000000;
    // alert($('#filter-form select').val() + $('#min-input').val() + $('#max-input').val());

    $.getJSON("filtre/tarif_entre/" + presentation_selected + '/' + min + '/' + max,
        function (result, status) {

            $('#banque-listing').empty();

            $.each(result, function (i, banque) {
                displayBanque(banque);
            });
            console.log(result, status);
        });

    event.preventDefault();
});


function displayBanque(banque) {
    var html = `<article class="bank-card rounded">
        <div class="row">
            <div class="col-md-3">
                <img class="img-fluid" src="front/img/logo.png">
            </div>
            <div class="col-md-9">
                <h5>`+banque["nom"]+`</h5>
                <div>
                    <i class="fa fa-map-marker" aria-hidden="true"></i>
                    `+banque["siege_social"]+`
                </div>
                <div>
                    <i class="fa fa-phone" aria-hidden="true"></i> `+banque["telephone"]+`
                    <i class="fa fa-fax" aria-hidden="true"></i> `+banque["fax"]+`
                </div>
                <button is_hide="true" onclick="plusDetails(this)" id="`+banque["id_banque"]+`" type="button" class="btn btn-link float-right">Plus
                    de détails
                </button>
            </div>


            <div class="table-prestations" id="`+banque["id_banque"]+`">
                <h5>Gestion et tenue de compte</h5>
                <br>
                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th>GESTION ET TENUE DE COMPTE</th>
                        <th>COMMISSION / FRAIS HT</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Ouverture de compte et délivrance chéquier</td>
                        <td>`+banque["ouverture_compte_delivrance_chequier"]+`</td>
                    </tr>
                    <tr>
                        <td>Frais de tenue de compte courant</td>
                        <td>`+banque["frais_tenue_compte_courant"]+`</td>
                    </tr>
                    <tr>
                        <td>Frais de tenue de compte professionnel</td>
                        <td>`+banque["frais_tenue_compte_professionnel"]+`</td>
                    </tr>
                    <tr>
                        <td>Frais de tenue de compte chèque</td>
                        <td>`+banque["frais_tenue_compte_cheque"]+`</td>
                    </tr>
                    <tr>
                        <td>Frais de tenue de compte sur livret</td>
                        <td>`+banque["frais_tenue_compte_sur_livret"]+`</td>
                    </tr>
                    <tr>
                        <td>Tenue de compte en devise</td>
                        <td>`+banque["tenue_compte_en_devise"]+`</td>
                    </tr>
                    <tr>
                        <td>Fermeture compte courant</td>
                        <td>`+banque["fermeture_compte_courant"]+`</td>
                    </tr>
                    <tr>
                        <td>Fermeture compte chèque</td>
                        <td>`+banque["fermeture_compte_cheque"]+`</td>
                    </tr>
                    <tr>
                        <td>Fermeture compte sur livret</td>
                        <td>`+banque["fermeture_compte_sur_livret"]+`</td>
                    </tr>
                    <tr>
                        <td>Fermeture compte devise</td>
                        <td>`+banque["fermeture_compte_devise"]+`</td>
                    </tr>
                    </tbody>
                </table>

                <br>
                <h5>Opération de paiement</h5>
                <br>
                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th>OPERATIONS AU CREDIT DU COMPTE DINARS/ DEVISES</th>
                        <th>COMMISSION / FRAIS HT</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr>
                        <td>Versement espèces (Client agence)</td>
                        <td>`+banque["versement_especes_client_agence"]+`</td>
                    </tr>
                    <tr>
                        <td>Versement espèces (Tiers)</td>
                        <td>`+banque["versement_especes_tiers"]+`</td>
                    </tr>
                    <tr>
                        <td>Versement espèces déplacé (Client autre agence)</td>
                        <td>`+banque["versement_especes_deplace_lient_autre_agence"]+`</td>
                    </tr>
                    <tr>
                        <td>Virement reçu d'un compte de la même agence </td>
                        <td>`+banque["virement_recu_compte_meme_agence"]+`</td>
                    </tr>
                    <tr>
                        <td>Virement reçu d'un compte d'une autre agence de la même banque</td>
                        <td>`+banque["virement_recu_compte_autre_agence_meme_banque"]+`</td>
                    </tr>
                    <tr>
                        <td>Virement devise reçu de l'étranger </td>
                        <td>`+banque["virement_devise_recu_etranger"]+`</td>
                    </tr>
                    <tr>
                        <td>Rertait espéces </td>
                        <td>`+banque["rertait_especes"]+`</td>
                    </tr>
                    <tr>
                        <td>Retrait espéces aux guichets d'une autre agence </td>
                        <td>`+banque["retrait_especes_guichets_autre_agence"]+`</td>
                    </tr>
                    <tr>
                        <td>Emission de chèque de banque </td>
                        <td>`+banque["emission_cheque_banque"]+`</td>
                    </tr>
                    <tr>
                        <td>Emission Chèque de banque déplacé </td>
                        <td>`+banque["emission_cheque_banque_deplace"]+`</td>
                    </tr>
                    <tr>
                        <td>Annulation de chèque de banque (Client) </td>
                        <td>`+banque["annulation_cheque_banque"]+`</td>
                    </tr>
                    <tr>
                        <td>Virement de compte à compte (même agence) </td>
                        <td>`+banque["virement_compte_compte"]+`</td>
                    </tr>
                    <tr>
                        <td>Virement ordonné en faveur client d'une autre agence</td>
                        <td>`+banque["virement_ordonne_en_faveur_client_autre_agence"]+`</td>
                    </tr>
                    </tbody>
                </table>

                <br>
                <h5>Monétique</h5>
                <br>
                <table class="table table-striped text-center">
                    <thead>
                    <tr>
                        <th>DESIGNATION</th>
                        <th>COMMISSION / FRAISHT</th>
                    </tr>
                    </thead>
                    <tbody>
                    <tr >
                        <th>CARTE C.I.B</th>
                        <td>`+banque["carte_cib"]+`</td>
                    </tr>
                    <tr >
                        <th>Emission de la première carte</th>
                        <td>`+banque["emission_premiere_carte"]+`</td>
                    </tr>
                    <tr >
                        <th>Renouvelement </th>
                        <td>`+banque["renouvelement"]+`</td>
                    </tr>
                    <tr >
                        <th>Reconfection</th>
                        <td>`+banque["reconfection"]+`</td>
                    </tr>
                    <tr >
                        <th>Réédition du code secret</th>
                        <td>`+banque["reedition_code_secret"]+`</td>
                    </tr>
                    <tr >
                        <th>Comission de retrait Sur DAB de la banque</th>
                        <td>`+banque["comission_retrait_sur_dab_banque"]+`</td>
                    </tr>
                    <tr >
                        <th>Comission de retrait Sur DAB confrère</th>
                        <td>`+banque["comission_retrait_sur_dab_confrere"]+`</td>
                    </tr>
                    <tr >
                        <th>Commission de paiement sur TPE/Client</th>
                        <td>`+banque["commission_paiement_sur_tpe_client"]+`</td>
                    </tr>
                    <tr >
                        <th>Commission de paiement sur TPE/Commerçant</th>
                        <td>`+banque["commission_paiement_sur_tpe_commercant"]+`</td>
                    </tr>
                    <tr >
                        <th>Carte Internationale</th>
                        <td>`+banque["carte_internationale"]+`</td>
                    </tr>
                    <tr >
                        <th>Octroi</th>
                        <td>`+banque["octroi"]+`</td>
                    </tr>
                    <tr >
                        <th>Mise en opposition</th>
                        <td>`+banque["mise_en_opposition"]+`</td>
                    </tr>
                    <tr >
                        <th>Re-confection</th>
                        <td>`+banque["re_confection"]+`</td>
                    </tr>
                    <tr >
                        <th>Réédition du code secret</th>
                        <td>`+banque["reedition_du_code_secret"]+`</td>
                    </tr>
                    <tr >
                        <th>Changement de code PIN</th>
                        <td>`+banque["changement_de_code_pin"]+`</td>
                    </tr>
                    </tbody>
                </table>
            </div>


        </div>
    </article>`;
    $('#banque-listing').append(html);
}