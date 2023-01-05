 //edit post
$(document).ready(function () {
$(document).on('submit', '#form', function(e){
        e.preventDefault();


var title = $('#title').val();
var post_id = $('#post_id').val(); 
var tag = $('#tag').val();
var image = $('#Postimg').val();
var message = editorData = editor.getData();


  $.ajax({
        url: "editpost.php", 
        type: "post", 
        data:new FormData(this),
        contentType:false,
        processData:false,
        beforeSend:function(){
              $(".loader").show();
         },
        success: function(status){
          console.log(status);
         $("#msg").html(status);
         $(".loader").hide();
        },
      });


});

});

  

    