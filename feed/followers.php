<?php
  session_start();
  include('../security.php');
  include('header.php');
  include('side_bar.php');
 
?>
<div class="col-lg-8">
    <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
        <div class="text-center mt-4 mt-md-0">
            <h2>Список подписчиков</h2>
        </div>
    </div>
    <div class="profile-feed">
    <?php
    include("../config.php");
    $sql = "SELECT FollowerID, Username, LastName, FirstName FROM UserFollowers
            LEFT JOIN Users U on UserFollowers.FollowerID = U.ID 
            WHERE UserID = " . $_SESSION['user_id'] ;

    $result = mysqli_query($db, $sql);
    echo mysqli_error($db);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
                echo '<a href="#">';
                echo '<div class="d-flex align-items-start profile-feed-item">';
                echo '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile"';
                echo 'class="img-sm rounded-circle">';
                echo '<div class="ml-4">';
                echo '<h6>';
                echo $row['LastName'] . ' ' . $row['FirstName'];
                echo '<span> @' . $row['Username']. '</span>';
                // echo '<small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>';
                echo '</h6>';
                echo '</div>';
                echo '</div>';
                echo '</a>';
        }
    } else {
        echo "0 results";
    }
    ?>
        
    </div>
</div>

<?php
  include('header.php');
?>