function getFormModal(url, heading) {
    var jqxhr = $.get(url, function(response) {
      $('#iniModal #modal-header').text(heading);
      $('#iniModal #modal-body').html(response);
    }).fail(function(response) {
        $('#iniModal #modal-header').text('Error');
        $('#iniModal #modal-body').html('Ooops, something went wrong!');
    }).always(function() {
        $('#iniModal').modal('show');
    });
}


function postFormModal(url, formId) {

    var data = {};
    var cssSelect = '#' + formId + ' input, select, textarea hidden';

    $(cssSelect).each(function(index) {
        var input = $(this);
        data[input.attr('name')] = input.val();
    });

    var jqxhr = $.post(url, data)
    .done(function(response) {
        alert( "Data Loaded: " + response );
    }).fail(function(response) {
        alert( "error" );
    }).always(function() {
        alert( "finished" ); // I don't think we need this unless we want to show a success message
    });
}
