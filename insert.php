
<?php include("header.php"); ?>

  <div class="container" style="padding-top: 10px;">

  <div id="table-data" style="padding-top: 25px;"></div>

</div>
  <nav class="navbar navbar-expand-lg navbar-light bg-light">
      <a class="navbar-brand" href="index.php">Add Record : </a>
       <div class="collapse navbar-collapse" id="navbarColor01">
   
    
  </div>
  </nav>
<div class="container" style="padding-top: 10px;">


  <div class="jumbotron shadow" style="padding-top: 35px;">
        <form id = "addform">
              <label for="staticEmail" class="col-sm-2 col-form-label">First Name : </label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control-plaintext" id="fname">
                     </div>

              <label for="staticEmail" class="col-sm-2 col-form-label">Last Name : </label>
                     <div class="col-sm-10">
                         <input type="text" class="form-control-plaintext" id="lname">
                     </div></br>

              &nbsp;&nbsp;&nbsp;&nbsp;
              <input type="submit" id="save-button" class="btn btn-primary" value="save">
          </form>

           <div id="error-message"></div> 
           <div id="success-message"></div>
  </div>
     

        
  </div>

<div style="padding-top: 225px;">
   <nav class="navbar navbar-expand-lg navbar-dark bg-primary">
      <a class="navbar-brand" href="#">Created By : Jayant Singh</a>
  </nav> 
</div>

</body>
<script type="text/javascript" src="js/jquery.js"></script>
<script type="text/javascript">
  




$(document).ready(function(){
   function load_table()
   {
     $.ajax({
             url : "ajax-load.php",
             type : "POST",
             success : function(data){
             $("#table-data").html(data)
             }
          });
    }
   
   load_table();

   $("#save-button").on("click", function(e)
   {
    e.preventDefault();
    var fname = $("#fname").val(); 
    var lname = $("#lname").val();
    if (fname == "" || lname == "")
      {
         $("#error-message").html("all fields are required").slideDown();
         $("#success-message").slideUp(); 
      }
  else
      {
         $.ajax({
             url : "ajax-insert.php",
             type : "POST",
             data : {first_name:fname, last_name:lname},
             success : function(data)
               {
                 if (data == 1)
                    {
                      load_table();
                      $("#addform").trigger('reset');
                      $("#success-message").html("Record saved successfully.").slideDown();
                      $("#error-message").slideUp();
                    }
                  else
                    {
                      $("#error-message").html("Can't save records.").slideDown();
                      $("#success-message").slideUp(); 
                    }
               }
           });
      }  
    
   })


$(document).on('click', '#delete-btn', function() {
  if (confirm('Are you sure ?')) {
    var studentid = $(this).data("id");
    var element = this;


    $.ajax({
           url: 'ajax-delete',
           type: 'POST',
           data: {id: studentid},
           success: function(data){
           if (data == 1) 
             {
               $(element).closest('tr').fadeOut();
               $("#success-message").html("Record Delete successfully.").slideDown();
               $("#error-message").slideUp();
             }
         else
             {
               $("#error-message").html("Can't Delete records.").slideDown();
               $("#success-message").slideUp();
             }
          }
     });
   }
});

});

</script>
</html>
