$("#btn_login").click(() =>
  {
    var username = $("#user_name").val(); 
    var Pass = $("#pass").val(); 
 
    if(username =="" || Pass ==""){
      $("#msg").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Error ! </strong>Please Fill i the Blanks</div>")

       }else{
      $.ajax({
        type: "post", 
        url: "includes/login.php", 
        data: {  
          'username': username, 
          'password': Pass
         },
         beforeSend:function(){
              $(".loader").show();
         },
        success: function(data){
         $("#msg").html(data);
         $(".loader").hide();
        },

      });

    }
  });