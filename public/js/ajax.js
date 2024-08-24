$(document).on('click', '.ajax-link', function(e) {
    e.preventDefault();
    var url = $(this).attr('href');

    $.ajax({
        url: url,
        method: 'GET',
        success: function(data) {
            $('.content-wrapper').html(data);
            window.history.pushState({ path: url }, '', url);
        },
        error: function(xhr) {
            console.error('Ajax request failed:', xhr.responseText);
        }
    });
});
