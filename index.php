<?php include("header.php"); ?>


  <div class="container">
      <div style="padding-top: 88px;">
         <div class="jumbotron shadow">
            <h1 class="display-3">AJAX</h1>
              <p class="lead">Click load Load data to View the list from database With AJAX.</p>
                <p class="lead">
                   <input type="button" id="load-button" class="btn btn-primary"  value="load data">
                   <button class="btn btn-Default" onClick="history.go(0);">Reload</button>
                </p>
         </div>
      </div>

    

      <div style="padding-top: 25px;" id="table-data">
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
  $("#load-button").on("click", function(e){
    $.ajax({
             url : "ajax-load.php",
             type : "POST",
             success : function(data){
             $("#table-data").html(data)
            }
        });
     });
  });

</script>
</html>
