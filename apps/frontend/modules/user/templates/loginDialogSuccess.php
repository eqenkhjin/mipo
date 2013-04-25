<script type="text/javascript">
    $(document).ready(function(){
        var options = {
            url:            '<?php echo url_for('user/loginAjax') ?>',
            success:        checkResponse
        };
        
        $('#login-form').ajaxForm(options);
    });

    function checkResponse(responseText, statusText, xhr, $form)
    {
        if(responseText == "success"){
            $('#output').addClass('success').html("Амжилттай нэвтэрлээ");
            location.reload();
        }
        else if(responseText == "error"){
            $('#output').addClass('error').html("И-мэйл хаяг эсвэл нууц үг буруу байна");
        }
    }
</script>

<div class="dialog-form">
    <h3>Нэвтрэх</h3>

    <?php include_partial('loginForm', array('form' => $form)) ?>
    
    <div id="output"></div>
</div>