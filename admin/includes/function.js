 //add category 
  $("#btn-cat").click(() =>
  {
    var category = $("#cat").val(); 
    var description = $("#disc").val(); 
 
    if(category =="" || description ==""){
      $("#msg").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Error ! </strong> Please Fill i the Blanks</div>")

       }else{
      $.ajax({
        type: "post", 
        url: "data/add-cat.php", 
        data: {  
          'category': category, 
          'description': description
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
    $(document).ajaxStop(function(){
     window.location.reload();
  });
  });



//edit category 
    $("#btn-edit-cat").click(() =>
  {
    var cat_id = $("#cat-id").val();
    var category = $("#cat").val(); 
    var description = $("#disc").val(); 

      $.ajax({
        type: "post", 
        url: "data/edit-cat.php", 
        data: {  
          'cid': cat_id,
          'category': category, 
          'description': description
         },
          beforeSend:function(){
              $(".loader").show();
         },
        success: function(data){
         $("#msg").html(data);
           $(".loader").hide();
        },
      });
    $(document).ajaxStop(function(){
     window.location.reload();
  });
  });




//move category to trash 
  $(document).on("click",".btn-cat-trash", function(){
    if(confirm("Do you really want to trash this record ?")){
    var cat_trashid = $(this).data("id"); 
    
       $.ajax({
        type: "post", 
        url: "data/trash-cat.php", 
        data: {id: cat_trashid},
          beforeSend:function(){
              $(".loader").show();
         },
        success: function(data){
         $("#msg").html(data);
          $(".loader").hide();
        },
      });
  }
      $(document).ajaxStop(function(){
     window.location.reload();
  });
  });





//delete category
$(document).on("click",".btn-cat-del", function(){
    if(confirm("Do you really want to delete this record forever ?")){
    var cat_deleteid = $(this).data("id"); 
    
      $.ajax({
        type: "post", 
        url: "data/del-cat.php", 
        data: {id:cat_deleteid},
          beforeSend:function(){
              $(".loader").show();
         },
        success: function(data){
         $("#msg").html(data);
            $(".loader").hide();
        },
      });
  }
      $(document).ajaxStop(function(){
     window.location.reload();
  });
  });




//restore category 
$(document).on("click",".btn-cat-ret", function(){
    if(confirm("Do you really want to restore this record ?")){
    var cat_retid = $(this).data("id"); 
    
     $.ajax({
        type: "post", 
        url: "data/ret-cat.php", 
        data: {id:cat_retid},
           beforeSend:function(){
              $(".loader").show();
         },
        success: function(data){
         $("#msg").html(data);
           $(".loader").hide();
        },
      });
  }
      $(document).ajaxStop(function(){
     window.location.reload();
  });
  });


//=============================================//

//Trash Post
  $(document).on("click",".btn-trash", function(){
    if(confirm("Do you really want to trash this record ?")){
    var trashid = $(this).data("id"); 
    
     $.ajax({
        type: "post", 
        url: "data/del-post.php", 
        data: {id: trashid},
           beforeSend:function(){
              $(".loader").show();
         },
        success: function(data){
         $("#msg").html(data);
           $(".loader").hide();
        },
      });
  }
      $(document).ajaxStop(function(){
     window.location.reload();
  });
  });



 //Restore Post
  $(document).on("click",".btn-restore", function(){
    if(confirm("Do you really want to restore this record ?")){
    var restoreid = $(this).data("id"); 
    
     $.ajax({
        type: "post", 
        url: "data/restore-post.php", 
        data: { id:restoreid},
           beforeSend:function(){
              $(".loader").show();
         },
        success: function(data){
         $("#msg").html(data);
           $(".loader").hide();
        },
      });
  }
      $(document).ajaxStop(function(){
     window.location.reload();
  });
  });



 //Delete Post
   $(document).on("click",".btn-delete", function(){
    if(confirm("Do you really want to delete this record forever ?")){
    var deleteid = $(this).data("id"); 
    
       $.ajax({
        type: "post", 
        url: "data/delete-post.php", 
        data: {id:deleteid},
           beforeSend:function(){
              $(".loader").show();
         },
        success: function(data){
         $("#msg").html(data);
           $(".loader").hide();
        },
      });
  }
      $(document).ajaxStop(function(){
     window.location.reload();
  });
  });

 $("#Del_id").click(() =>
  {
    var Delete = $("#Delete").val();
  
   
    $(document).ajaxStop(function(){
     window.location.reload();
  });
  });

 //=====================================//

 //change password

  $("#btn-change").click(() =>
  {
    var currentpass = $("#cpass").val(); 
    var newpass = $("#newpass").val(); 
 
    if(currentpass =="" || newpass ==""){
      $("#msg").html("<div class='alert alert-dismissible fade show alert-danger' role='alert'><strong>Error ! </strong> Please Fill i the Blanks</div>")

       }else{
      $.ajax({
        type: "post", 
        url: "data/changepass.php", 
        data: {  
          'Cpassword': currentpass , 
          'Password': newpass
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
    $(document).ajaxStop(function(){
     window.location.reload();
  });
  });