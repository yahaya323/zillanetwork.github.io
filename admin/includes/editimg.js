 //edit post


$(document).ready(function () {
$(document).on('submit', '#form', function(e){
e.preventDefault();

var post_id = $('#post_id').val(); 
var image = $('#Postimg').val();

  $.ajax({
        url: "editimg.php", 
        type: "post", 
        data: new FormData(this),
        processData: false,
        contentType: false,
        beforeSend:function(){
              $(".loader").show();
         },
        success: function(status){
          console.log(status);
         $("#msg").html(status);
         $(".loader").hide();
        },
      });
$(document).ajaxStop(function(){
     window.location.reload();
  });

  });
});