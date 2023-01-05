$("#Btn_comment").click(() =>
  {
    var category = $("#cat").val(); 
    var description = $("#disc").val(); 
 
    var postid = $("#postid").val(); 
    var name = $("#name").val(); 
    var message = $("#message").val(); 

    if(name =="" || message ==""){
      $("#msg").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Error ! </strong> <button class='btn-close' type='button' data-bs-dismiss='alert' aria-label='Close'></button>Please Fill i the Blanks</div>")
    }else{
      $.ajax({
        type: "post", 
        url: "data/comments.php", 
        data: { 
          'postsid': postid, 
          'username': name, 
          'comment': message
         },
        success: function(data){
         $("#msg").html(data);
        },
      });
  }
  });