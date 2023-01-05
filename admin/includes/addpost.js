 //add post
$(document).ready(function () {
$(document).on('submit', '#form', function(e){
        e.preventDefault();


var title = $('#title').val();
var tag = $('#tag').val();
var image = $('#Postimg').val();
var message = editorData = editor.getData();


  $.ajax({
        url: "addpost.php", 
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


  

    