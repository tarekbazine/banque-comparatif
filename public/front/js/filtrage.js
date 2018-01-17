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

    var presentation_selected = $('#filter-form select').val();

    $.getJSON("filtre/classer/"+presentation_selected, function(result){
        // $.each(result, function(i, field){
        //     $("div").append(field + " ");
        // });
        console.log(result);
    });

    event.preventDefault();
});

$('#filter-form').submit(function (event) {

    var presentation_selected = $('#filter-form select').val(),
        min = $('#min-input').val() || 0  ,
        max = $('#max-input').val() || 10000000;
    // alert($('#filter-form select').val() + $('#min-input').val() + $('#max-input').val());

    $.getJSON("filtre/tarif_entre/"+presentation_selected+'/'+min+'/'+max, function(result,status){
        // $.each(result, function(i, field){
        //     $("div").append(field + " ");
        // });
        console.log(result,status);
    });

    event.preventDefault();
});