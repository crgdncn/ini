$(document).ready(function() {
    $.ajaxSetup({
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        }
    });
})

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
    var url = form.attr('action');
    var data = form.serialize();
    var jqxhr = $.post(url, data)
    .done(function(response) {
        // if creating, objectId will not be defined
        if (typeof objectId == 'undefined') {
            $('#tbody').append(response);
        } else {
            $('#trow_' + objectId).replaceWith(response);
        }
        $('#iniModal').modal('hide');
    }).fail(function(response) {
        if (response.status === 422) {
            var message = response.responseJSON.message;
            $('#message-error').html(message);
            var errors = response.responseJSON.errors;
            $.each(errors, function (key, value) {
                $('#' + key + '-error').html(value);
            });
        } else {
            $('#iniModal #modal-header').text('Error');
            $('#iniModal #modal-body').html('Ooops, something went wrong!');
            $('#iniModal').modal('show');
        }
    })
}

/**
 * delete an object and remove table row from DOM
 * @param  string formId
 * @param  integer objectId
 * @return void
 */
function postObjectDelete(formId, objectId) {
    var formSelector = '#' + formId;
    var form = $(formSelector);
    var url = form.attr('action');
    var data = form.serialize();

    var jqxhr = $.post(url, data)
    .done(function(response) {
        $('#trow_' + objectId).remove();
    }).fail(function(response) {
        var errorMessage = response.responseJSON.error;
        if (typeof errorMessage == 'undefined') {
            errorMessage = 'Ooops, something went wrong!';
        }
        $('#iniModal #modal-header').text('Error');
        $('#iniModal #modal-body').html(errorMessage);
        $('#iniModal').modal('show');
    })
}
