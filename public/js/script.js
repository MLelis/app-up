$(function () {

    $('#form-get-items').submit(function (e) {
        e.preventDefault();
        if ($('#term').val().length == 0) return alert('The term field is empty. Please fill')
        const url = $('#url').val() + $('#term').val();
        $.ajaxSetup({headers: {'X-CSRF-Token': $('input[name="_token"]').val()}});
        $.ajax({
            type: "POST",
            url: "/get-data-site",
            data: {url},
            dataType: "json",
            beforeSend: () => {
                load('open');
            },
            success: function (r) {
                if (r.success) {
                    alert(r.msg);
                    location.href = "/articles";
                } else {
                    alert(r.msg);
                }
            },
            complete: () => {
                load('close');
            }

        });
    })

});

/*Function of loading*/
function load(action) {
    var load_div = $('.ajax_load');
    if (action === 'open') {
        load_div.fadeIn().css('display', 'flex');
    } else {
        load_div.fadeOut();
    }
}

