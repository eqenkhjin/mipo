<div class="profile-homepage-container">
    <div class="profile-image-container">
        <a href="javascript:void()" class="profile-image shadow mind-btn"><img src="<?php echo $sf_user->getAvatar(); ?>" alt="" /></a>
        <a href="javascript:void()" class="mind-btn2"></a>
        <div class="your-mind">
            <form action="<?php echo url_for('post/addAjax'); ?>" method="post" id="post-form">
                <input type="text" name="am-post" id="am-post" placeholder="таны бодол..."/>
                <img src="/images/windows8.gif" alt="" id="post-loader"/>
            </form>
        </div>
    </div>

</div><!-- profile-homepage-container end. -->

<script type="text/javascript">
    // prepare the form when the DOM is ready 
    $(document).ready(function() {
        
        $('.mind-btn').click(function(){
            $('.your-mind').toggleClass('open');
        });
        
        var options = { 
//                    target:        '#output1',   // target element(s) to be updated with server response 
            beforeSubmit:  showRequest,  // pre-submit callback 
            success:       showResponse  // post-submit callback 
 
            // other available options: 
            //url:       url         // override for form's 'action' attribute 
            //type:      type        // 'get' or 'post', override for form's 'method' attribute 
            //dataType:  null        // 'xml', 'script', or 'json' (expected server response type) 
            //clearForm: true        // clear all form fields after successful submit 
            //resetForm: true        // reset the form after successful submit 
 
            // $.ajax options can be used here too, for example: 
            //timeout:   3000 
        }; 
 
        // bind form using 'ajaxForm' 
        $('#post-form').ajaxForm(options); 
    }); 
 
    // pre-submit callback 
    function showRequest(formData, jqForm, options) { 
        $('#post-loader').show();
        // formData is an array; here we use $.param to convert it to a string to display it 
        // but the form plugin does this for you automatically when it submits the data 
        //    var queryString = $.param(formData); 
 
        // jqForm is a jQuery object encapsulating the form element.  To access the 
        // DOM element for the form do this: 
        // var formElement = jqForm[0]; 
 
        //    alert('About to submit: \n\n' + queryString); 
 
        // here we could return false to prevent the form from being submitted; 
        // returning anything other than false will allow the form submit to continue 
        return true; 
    } 
 
    // post-submit callback 
    function showResponse(responseText, statusText, xhr, $form)  { 
        // for normal html responses, the first argument to the success callback 
        // is the XMLHttpRequest object's responseText property 
 
        // if the ajaxForm method was passed an Options Object with the dataType 
        // property set to 'xml' then the first argument to the success callback 
        // is the XMLHttpRequest object's responseXML property 
 
        // if the ajaxForm method was passed an Options Object with the dataType 
        // property set to 'json' then the first argument to the success callback 
        // is the json data object returned by the server 
 
        //    alert('status: ' + statusText + '\n\nresponseText: \n' + responseText + 
        //        '\n\nThe output div should have already been updated with the responseText.'); 

        $('#post-loader').hide();
    
        if(responseText == 'success'){
            $('#post-form').resetForm();
            $.ajax({
                url: '<?php echo url_for('post/ownLastPost'); ?>',
                complete: function(data){
                    $('.wall-container').prepend(data.responseText);
                }
            });
        }else{
            alert('Уучлаарай! Та хуудсыг дахин ачааллуулна уу.');
        }
    } 
</script>