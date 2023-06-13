$( document ).ready(function() {
  
 $('#click-btn').click(function(event) {
 	  event.preventDefault()
   
var postidd = $('#click-btn').attr('postid');
$.ajax({
        type: 'POST',
        url: 'http://192.168.0.77/sidharth/All_Projects/wp-admin/admin-ajax.php',
        data: {
          action: 'add_rem_likes',
          postid: postidd,
          
        },
        success: function(data) {
      console.log(data);
        }

    });


 });});

