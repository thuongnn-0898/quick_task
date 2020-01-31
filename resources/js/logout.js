$(document).ready(function () {
    $('#logout').click(function () {
        let url = $(this).attr('href');
        $.ajax({
            url,
            type: 'POST',
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            dataType: 'json',
            success: function (res) {
                if (res.status){
                    window.location.href = res.url;
                }
            }
        });
    });
});
