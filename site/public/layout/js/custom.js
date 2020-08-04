// Owl Carousel Start..................



$(document).ready(function() {
    var one = $("#one");
    var two = $("#two");

    $('#customNextBtn').click(function() {
        one.trigger('next.owl.carousel');
    })
    $('#customPrevBtn').click(function() {
        one.trigger('prev.owl.carousel');
    })
    one.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:2
            },
            1000:{
                items:4
            }
        }
    });

    two.owlCarousel({
        autoplay:true,
        loop:true,
        dot:true,
        autoplayHoverPause:true,
        autoplaySpeed:100,
        margin:10,
        responsive:{
            0:{
                items:1
            },
            600:{
                items:1
            },
            1000:{
                items:1
            }
        }
    });

});








// Owl Carousel End..................





$('#submitMessage').click(function(){
    var name = $('#contactName').val();
    var mobile = $('#contactMobile').val();
    var email = $('#contactEmail').val();
    var message = $('#contactMessage').val();

    sentMessage(name, mobile, email, message);
});


function sentMessage(contactName, contactMobile, contactEmail, contactMessage){

    if(contactName.length == 0){
        $('#submitMessage').html('Name Is Required');
            setTimeout(function () {
            $('#submitMessage').html('Send');
        },2000);
    }else if(contactMobile.length == 0){
        $('#submitMessage').html('Mobile Number Is Required');
            setTimeout(function () {
            $('#submitMessage').html('Send');
        },2000);
    }else if(contactEmail.length == 0){
        $('#submitMessage').html('Email Is Required');
            setTimeout(function () {
            $('#submitMessage').html('Send');
        },2000);
    }else if(contactMessage.length == 0){
        $('#submitMessage').html('Message Is Required');
            setTimeout(function () {
            $('#submitMessage').html('Send');
        },2000);
    }else{
        axios.post('contact-message',{
            Name: contactName,
            Mobile: contactMobile,
            Email: contactEmail,
            Message: contactMessage,
        })
        .then(function (response){
            if(response.status == 200){
                if(response.data == 1){
                    $('#contactName').val("");
                    $('#contactMobile').val("");
                    $('#contactEmail').val("");
                    $('#contactMessage').val("");

                    $('#submitMessage').html('Message Sent');
                        setTimeout(function () {
                        $('#submitMessage').html('Send');
                    },3000);
                }else{
                    $('#submitMessage').html('Try Again');
                        setTimeout(function () {
                        $('#submitMessage').html('Send');
                    },3000);
                }
            }else{
                $('#submitMessage').html('Try Again');
                    setTimeout(function () {
                    $('#submitMessage').html('Send');
                },3000);
            }
        })
        .catch(function (error){
            $('#submitMessage').html('Try Again');
                setTimeout(function () {
                $('#submitMessage').html('Send');
            },2000);
        });
    }
}