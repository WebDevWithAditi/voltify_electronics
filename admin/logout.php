<?php
session_start();
session_destroy();
        ?>
        <script>
        window.onload=function()
          {
              alert("Logout Sucessfully");
                window.location="login.php";
          } 
       </script>

?>