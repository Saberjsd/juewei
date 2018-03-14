//页面准备好
$(function() {
    $('#login-btn').click(function(event) {
        /* Act on the event */
        var $username   = $('#username').val();
        var $passwd     = $('#passwd').val();
        var $remember   = $('#remember').attr('checked');
        if($username == ''){
            $('#username').parent().next('span').html('账号不能为空!');
            $('#username').focus();
            return ;
        }else{
            $('#username').parent().next('span').html('<br>');
        }

        if($passwd == ''){
            $('#passwd').parent().next('span').html('密码不能为空!');
            $('#passwd').focus();
            return ;
        }else{
            $('#passwd').parent().next('span').html('<br>');
        }

        // console.log(11111)
        //提交到服务器检查
        $.ajax({
            url: './login.php',
            type: 'POST',
            dataType: 'JSON',
            data: {username: $username, passwd: $passwd ,remember: $remember}
        })
        .done(function(data) {
            console.log(data);
            if(data.r1 == 'username_invail'){
                $('#username').parent().next('span').html('账号不存在!');
                $('#username').focus();
            }else if(data.r1 == 'passwd_invail'){
                $('#passwd').parent().next('span').html('密码不正确!');
                $('#passwd').focus();
            }else if(data.r1 == 'ok'){
                //登录成功，页面需要跳转
                window.location.href = './index.php';
            }else{
                alert('未知错误');
            }
        });
        
    });
    
});