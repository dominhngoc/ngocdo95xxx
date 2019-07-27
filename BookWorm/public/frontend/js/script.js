// var myAudio = document.getElementById("myAudio");
// var isPlaying = false;
//
// function togglePlay() {
//   if (isPlaying) {
//     myAudio.pause()
//   } else {
//     myAudio.play();
//   }
// };
// myAudio.onplaying = function() {
//   isPlaying = true;
// };
// myAudio.onpause = function() {
//   isPlaying = false;
// };

//scroll menu-nav

$(document).ready(function(){
    $(document).on('click', '.btn-success', function(event){
        event.preventDefault();
        $(this).css('display','none');
        $('.buttonload').css('display','block');
        get_login();

    });
    function get_login()
    {
        $.ajax({
            type: 'get',
            url: '/postLoginFrontend',
            data: {
                username:$('#username').val(),
                password:$('#password').val()
            },
            success: function(data){
                if(data==='success'){

                    window.location = "/";
                }
                else{
                    $('.alert-danger').css('display','none');
                    $('.alert-danger').css('display','block');
                    $('.btn-success').css('display','block');
                    $('.buttonload').css('display','none');
                    $('.alert-danger').html(data);


                }
            },
            error: function(xhr, type, exception) {
                // if ajax fails display error alert
                alert("ajax error response type "+type);
            }
        });

    }
});

function closeMenu(){
    $('#countryList').css('display','none');
    // $('.add').removeClass('active');
}

$(document.body).click( function(e) {
    closeMenu();
});
$( document ).on( 'keydown', function ( e ) {
    if ( e.keyCode === 27 ) { // ESC
        $('#backgrounddiv').fadeOut();
        $('.popup-login').fadeOut();
    }
});
$('.btn-signin').click( function(e) {
    e.preventDefault();
    $('#backgrounddiv').fadeIn();
    $('.popup-login').fadeIn();
});
$('.btn-close').click( function(e) {
    e.preventDefault();
    $('#backgrounddiv').fadeOut();
    $('.popup-login').fadeOut();
});
$('.btn-user').click( function(e) {
    e.preventDefault();
    $('.user ul').toggle();

});
    (function($) {
        $(document).ready(function(){
            $(window).scroll(function(){
                if ($(this).scrollTop() > 100) {
                    // $('.fill').css('visibility', 'hidden');
                    //     $('header').css('height','100');
                    $('.nav-bar').css('margin-top','10px');
                    $('.logo').css('height','60px');
                    $('nav').addClass('menu-fix');



                    // $('.fill').fadeIn(500);
                }else{
                    $('.nav-bar').css('margin-top','30px');
                    $('.logo').css('height','100px');
                    $('nav').removeClass('menu-fix');

                }
            });
        });
    })(jQuery);
// buton back to top

$('.btn-back-top').click( function(e) {
    e.preventDefault();
    $('html, body').animate({scrollTop:0}, '500');
});


//swipe image
$(document).ready(function(){
    console.log($('.container').width());
    var itemWidth=$('.creative-main').width()*25/100;
    $('.item-slide').css('width',itemWidth);

    var itemNumber=$('.item-slide').length;
    console.log(itemNumber)
    $('.swipe-slide').css('width',itemWidth*itemNumber)


    var x=0;
    $('.left').click(function() {
        if(x<0){
            x+=$('.item-slide').width();
        }
        var leftTranslate='translate3d('+x+'px, 0px, 0px)';
        $('.swipe-slide').css('transform',leftTranslate);
    });
    $('.right').click(function() {
        if(x>$('.item-slide').width()*(itemNumber-4)*(-1)) {
            x -= $('.item-slide').width();
        }
        var rightTranslate='translate3d('+x+'px, 0px, 0px)';
        $('.swipe-slide').css('transform',rightTranslate);
    })
});

$(document).ready(function(){

    var itemWidth=$('.book-slide').width()*17/100;
    $('.book-item').css('width',itemWidth);

    var itemNumber=$('.book-item').length;

    var itemPerFrame=parseInt($('.book-slide').width()/$('.book-item').width());// so image trong mot khung hinh

    // $('.slide-container').css('width',itemWidth*itemNumber)


    var x=0;
    $('.btn-left').click(function() {
        // alert('hello')
        if(x<0){
            x+=$('.book-item').width();
        }
        var leftTranslate='translate3d('+x+'px, 0px, 0px)';
        $('.slide-container').css('transform',leftTranslate);

    });
    $('.btn-right').click(function() {
        // alert('hello')
        if(x>$('.book-item').width()*(itemNumber-itemPerFrame)*(-0.6)) {
            x -= $('.book-item').width();
        }
        var rightTranslate='translate3d('+x+'px, 0px, 0px)';
        $('.slide-container').css('transform',rightTranslate);

    })

    $(".address-box .edit a").click(function(evt){
        evt.stopPropagation();
        evt.preventDefault();

        // $(this).siblings("form").show();
        if($(this).siblings("form:hidden").length == 0)
        //if form displayed --> hide form
        {
            $(this).siblings("form").hide(300);
        }
        //else only display form of the a choosed
        else{
            $(".address-box form").hide();

            $(this).siblings("form").show(300);
        }


    });
    $(".address-add i").click(function(){
        $(".address-add form").toggle(500);
    });
    var i=0;
    $(".btn-download a").click(function(e){
        e.preventDefault();
       if(i%2==0){
        $(".type-download").show(300);
       }
       else{
        $(".type-download").hide(300);
       }
      
       i++;
    })

});