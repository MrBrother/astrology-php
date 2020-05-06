<?php
  session_start();
  include('header.php');
  include('side_bar.php');
  include('../security.php');
  
?>
<div class="col-lg-8">
<div class="gallery" id="gallery">
    <?php
       include("../config.php");
      $sql_pic = "SELECT Picture FROM UserImages
      WHERE UserID = " . $_SESSION['user_id'];
      $pictures = mysqli_query($db, $sql_pic);
      echo '<div class="column">';
      while ($pic_row = mysqli_fetch_assoc($pictures)) {
        echo '<div class="mb-3 pics animation all 2">'
        .'<img class="img-fluid" src="/uploads/'.$pic_row['Picture'].'" alt="Card image cap">'
        .'</div>';
      }
    
      ?>
</div>
<!-- Grid row -->
</div>
<script>
    $(function() {
      var selectedClass = "";
      $(".filter").click(function(){
      selectedClass = $(this).attr("data-rel");
      $("#gallery").fadeTo(100, 0.1);
      $("#gallery div").not("."+selectedClass).fadeOut().removeClass('animation');
      setTimeout(function() {
      $("."+selectedClass).fadeIn().addClass('animation');
      $("#gallery").fadeTo(300, 1);
      }, 300);
  });
  });
  </script>
<?php
  include('header.php');
?>