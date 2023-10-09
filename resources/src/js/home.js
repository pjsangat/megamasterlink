$(document).ready(function(){
    $('#home-slider').owlCarousel({
        items:1,
        loop:true,
        margin:0,
        autoplay:true,
        mouseDrag: false,
        touchDrag: true,
        autoplayTimeout:3000,
        animateOut: 'fadeOut',
        autoplayHoverPause:false
    });
    $("#services-slider").owlCarousel({
        center: true,
        items:1,
        margin: 0,
        autoWidth:true,
        loop: true,
        autoplay:true,
    });


    $("#requestQuotation").validate({
        rules: {
            Name: {
                required: true,
            },
            Email: {
                required: true,
                email: true
            },
            Phone: {
                required: true,
            },
            Subject: {
                required: true,
            },
            Message: {
                required: true,
            },
        },
        submitHandler: function(form) {
            // if (grecaptcha.getResponse()) {
            //     console.info(form);
                var params =  { url: GLOBAL_DOF_BASE_URL + 'home/request_quotation', type: 'POST', data: $(form).serialize() };
                console.info(params);
                ajaxRequest(params, function(params, response){
                    var html = '';
                    html += '<p>'+response.message+'</p>';
                    if(response.success == 0){
                        $("#requestForm").find(".message").removeClass('error');
                        $("#requestForm").find(".message").removeClass('success');
                        $("#requestForm").find(".message").addClass('error');
                        if(response.error.length > 0){
                            html += '<ul>';
                            for(var ctr = 0; ctr < response.error.length; ctr++){
                                html += '<li>' + response.error[ctr] + '</li>';
                            }
                            html += '</ul>';
                        }
                    }else{
                        $("#requestForm").find(".message").removeClass('error');
                        $("#requestForm").find(".message").removeClass('success');
                        $("#requestForm").find(".message").addClass('success');
                        $("#requestQuotation").remove();
                        $("#btnSendRequest").remove();
                    }
                    $("#requestForm").find(".message").html(html);
                });
                console.info(params);
            // } else {
            //     alert('Please confirm captcha to proceed')
            // }
        }

    });
    
    $("#btnSendRequest").click(function(){
        $("#requestQuotation").submit();

        // ajaxRequest(params, function(params, response){
        //     var html = '';
        //     html += '<p>'+response.message+'</p>';
        //     if(response.success == 0){
        //         html += '<ul>';
        //         for(var ctr = 0; ctr < response.error.length; ctr++){
        //             html += '<li>' + response.error[ctr] + '</li>';
        //         }
        //         html += '</ul>';
        //     }
        //     $("#requestQuotation").find(".message").html(html);
        // });
    });
    
});

$(window).on('load', function(){
});