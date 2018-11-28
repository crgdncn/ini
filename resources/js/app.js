/**
 * Open up a modal with a form inside
 * @param  string url
 * @param  string heading
 * @return void
 */
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

/**
 * post all form fields to defined url
 * @param  string formId
 * @param  integer objectId
 * @return void
 */
function postFormModal(formId, objectId) {
    var formSelector = '#' + formId;
    var form = $(formSelector);
    var url = form.attr('data-url');

    var data = {};
    var fieldSelector = '#' + formId + ' input, select, textarea, hidden';
    $(fieldSelector).each(function(index) {
        var input = $(this);
        data[input.attr('name')] = input.val();
    });

    var jqxhr = $.post(url, data)
    .done(function(response) {
        if (typeof objectId == 'undefined') {
            $('#tbody').append(response);
        } else {
            $('#trow_' + objectId).replaceWith(response);
        }
        $('#iniModal').modal('hide');
    }).fail(function(response) {
        console.log( "error: " + response );
    })
}
