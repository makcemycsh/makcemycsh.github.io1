$(document).ready(function () {
    $(".wrap-slider").slick({
        infinite: true,
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 8000,
        //        fade: true,
        cssEase: 'linear',
        appendArrows: $('.slider-arrow'),
        prevArrow: '<div class="prev"></div>',
        nextArrow: '<div class="next"></div>'
    });
});

/* Отправка формы */
$(document).ready(function () {
    $("#send-form").submit(
        function () {
            sendAjaxForm('send-form', '../ajax_form.php');
            return false;
        }
    );
});

function sendAjaxForm(ajax_form, url) {
    $.ajax({
        url: url,
        type: "POST",
        dataType: "html",
        data: $("#" + ajax_form).serialize(),
        success: function (response) {
            $(".popup-content .ok").css({
                "opacity": "1",
                "visibility": "visible",
                "height": "15em"
            });
            $(".popup-content h3").css("display", "none");
            $(".popup-content form").css("display", "none");
        }
        //        ,
        //    	error: function(response) { 
        //            $('#'+ajax_form).html('Ошибка. Данные не отправлены.');
        //    	}
    });
    return false;
}
$(document).ready(function () {
    $(document).on('change', '#request-call', function () {
        if (!(this.checked)) {
            setTimeout(function() {  $(".popup-content .ok").attr('style', ''); 
            $(".popup-content h3").attr('style', ''); 
            $(".popup-content form").attr('style', '');  }, 2000)
           
        
        }
    });
});

//якори
$(document).ready(function () {
    $("body").on("click", "a", function (event) {
        event.preventDefault();
        var id = $(this).attr('href'),
            top = $(id).offset().top;
        $('body,html').animate({
            scrollTop: top
        }, 1000);
    });
});

