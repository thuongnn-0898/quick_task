$(document).ready(function(){
    $('.delete').click(function () {
        let id = $(this).attr('data-id');
        let url = $(this).attr('data-url');
        $.ajax({
            url,
            headers: {'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')},
            type: 'delete',
            dataType: 'json',
            success: function (res) {
                if(res.status){
                    alert(res.msg);
                    $('#task-'+id).remove();
                }else{
                    alert(res.msg);
                }
            }
        });
    });
});
