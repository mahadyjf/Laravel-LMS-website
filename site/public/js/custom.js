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
$('#send_message').click(function(){
  var name = $('#contact_name').val();
  var mobile = $('#contact_mobile').val();
  var email = $('#contact_email').val();
  var message = $('#contact_message').val();
  ContactSend(name,mobile,email,message)
})
function ContactSend(name,mobile,email,message){
  if(name.length == 0){
      $('#send_message').html('আপনার নম লিখুন ');
      setTimeout(function(){
          $('#send_message').html('পাঠিয়ে দিন');
      }, 2000)
  }else if(mobile.length == 0){
      $('#send_message').html('আপনার মোবাইল নং লিখুন');
      setTimeout(function(){
          $('#send_message').html('পাঠিয়ে দিন');
      }, 2000)
  }else if(email.length == 0){
      $('#send_message').html('আপনার ইমেইল লিখুন');
      setTimeout(function(){
          $('#send_message').html('পাঠিয়ে দিন');
      }, 2000)
    }else if(message.length == 0){
        $('#send_message').html('আপনার মেসেজ লিখুন');
        setTimeout(function(){
            $('#send_message').html('পাঠিয়ে দিন');
        }, 2000)

  }else {

    $('#send_message').html('পাঠানো হোচ্ছে');
    axios.post('/contactsend', {
      contact_name: name,
      contact_mobile: mobile,
      contact_email: email,
      contact_message: message
    })
    .then(function(response){
        if(response.status == 200){
          if(response.data == 1){
            $('#send_message').html('আপনার অনুরোধ সপল হয়েছে');
            setTimeout(function(){
                $('#send_message').html('পাঠিয়ে দিন');
            }, 2000)
          }else {
            $('#send_message').html('আপনার অনুরোধ বের্থ হয়েছে');
            setTimeout(function(){
                $('#send_message').html('পাঠিয়ে দিন');
            }, 2000)
          }
        }else {
          $('#send_message').html('আবার চেষ্টা করুন');
          setTimeout(function(){
              $('#send_message').html('পাঠিয়ে দিন');
          }, 2000)
        }

    })
    .catch(function(error){
      $('#send_message').html('আবার চেষ্টা করুন');
      setTimeout(function(){
          $('#send_message').html('পাঠিয়ে দিন');
      }, 2000)
    })
  }
}
