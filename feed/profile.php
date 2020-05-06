<?php
  session_start();
  include('header.php');
  include('side_bar.php');
  include('../security.php');
  include("../config.php");
?>
<div class="col-lg-8">
    
    
    <div class="row">
                    <div class="col-sm-4 col-md-4">
                        <img src="https://blogsaays-com-3vkgf8gqdp8entcca1.netdna-ssl.com/wp-content/uploads/2014/02/no-user-profile-picture-whatsapp-1200x1341.jpg" alt="" class="img-rounded img-responsive" style="max-width:200px" />
                    </div>
                    <div class="col-sm-6 col-md-8">
                        <?php
                            $sql = "SELECT ID, Username, LastName, FirstName, email, DateOfBirth, ProfilePicture, PhoneNumber
                            FROM Users
                            WHERE ID = " . $_GET['user_id'];
                
                            $result = mysqli_query($db, $sql);
                            $username;
                            $first_name;
                            $last_name;
                            $bday;
                            $profile_image;
                            $email;
                            $phone;
                            $user_id;
                            if (mysqli_num_rows($result) > 0) {
                                while ($row = mysqli_fetch_assoc($result)) {
                                    $username=$row['Username'];
                                    $first_name=$row['FirstName'];
                                    $last_name=$row['LastName'];
                                    $bday=$row['DateOfBirth'];
                                    $profile_image=$row['ProfilePicture'];
                                    $email=$row['email'];
                                    $phone=$row['PhoneNumber'];
                                    $user_id=$row['ID'];
                                }
                            }
                        ?>
                        <h4>
                            <?php
                            echo $first_name . ' ' . $last_name . ' @'.$username;
                            ?>
                        </h4>
                    
                        <p>
                            <i class="glyphicon glyphicon-envelope"></i>
                            <?php
                                echo $email;
                            ?>
                            <br />
                            <i class="glyphicon glyphicon-envelope"></i>
                            <?php
                                echo $phone;
                            ?>
                            <br />
                            
                            <i class="glyphicon glyphicon-gift"></i><?php
                                echo $bday;
                            ?></p>
                        <!-- Split button -->
                       
                    </div>
                </div>
                <div class="mt-4 py-2 border-top border-bottom">
        
    </div>
    <div class="profile-feed">
        <?php
   
    $sql = "SELECT Posts.ID ID, UserID, Username, LastName, FirstName, Text, DateTime FROM Posts
            LEFT JOIN Users U ON Posts.UserID = U.ID
            WHERE UserID = " . $_GET['user_id'] .
            " ORDER BY DateTime DESC";

    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="d-flex align-items-start profile-feed-item">'
           . '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile" class="img-sm rounded-circle">'
           . '<div class="ml-4">'
            . '<a href="profile.php?user_id="'. $user_id .'>'
            .'<h6>'
           . $row['LastName'] . ' ' . $row['FirstName'] . '<span> @' . $row['Username'] . '</span>'
           . '<small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>'. $row['DateTime'] .'</small>'
           .   '</h6>'
           . '</a>'
           .     '<p>'
            .     $row['Text']
            .    '</p>';
            
            $sql_pic = "SELECT Picture FROM UserImages
                    WHERE PostID = " . $row["ID"];
            $pictures = mysqli_query($db, $sql_pic);
            echo '<div class="column">';
            while ($pic_row = mysqli_fetch_assoc($pictures)) {
                echo '<img src="/uploads/'.$pic_row['Picture'].'" style="width:50%;max-width:200px"/>';
            }
            echo '</div>';
            echo ' <p class="small text-muted mt-2 mb-0">'
           .     '    <span>'
            .     '      <i class="mdi mdi-star mr-1"></i>'
            .      '  </span>'
           .        ' <span class="ml-2">'
           .         '    <i class="mdi mdi-comment mr-1"></i>'
            .        '</span>'
            .    '</p>'
            . '</div>'
            . '</div>';
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