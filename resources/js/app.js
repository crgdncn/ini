function openModal(url, heading) {
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
