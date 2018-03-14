$(function(){
    $('#addarticle').click(function(event) {
        var $title  = $('#title').val();
        if(!$title){
            $('#title').next('span').html('标题不能为空!')
            $('#title').focus();
            return ;
        }

        $.ajax({
            url: './up_article.php',
            type: 'POST',
            dataType: 'JSON',
            data: $('#addform').serialize()
        })
        .done(function(data) {
            if(data.r == 'success'){
                // window.location.href = './article.php';
                alert('成功')
            }else{
                alert('添加失败，请刷新后重新操作！');
            }
        });
    });
})