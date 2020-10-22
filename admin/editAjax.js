$(function(){ 
    $('#edit_form').submit(function(e){
        e.preventDefault(); 
        let m_method=$(this).attr('method'); 
        let m_action=$(this).attr('action'); 
        let m_data=$(this).serialize();
        $.ajax({
            type: m_method,
            url: m_action,
            data: m_data,
            success: function(result){
                $('#result_form').html(result);
            }
        });
    });
});