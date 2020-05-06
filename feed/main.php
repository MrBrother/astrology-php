<?php
  session_start();
  include('header.php');
  include('side_bar.php');
  include('../security.php');

?>
<div class="col-lg-8">
    <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
        <div class="text-center mt-4 mt-md-0">
            <a class="btn btn-outline-primary" href="new_post.php">Новый пост</a>

        </div>
    </div>
    <div class="mt-4 py-2 border-top border-bottom">
        <ul class="nav profile-navbar">
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-account-outline"></i>
                    Info
                </a>
            </li> -->
            <li class="nav-item">
                <a class="nav-link active" href="#">
                    <i class="mdi mdi-newspaper"></i>
                    Лента
                </a>
            </li>
            <!-- <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-calendar"></i>
                    Agenda
                </a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">
                    <i class="mdi mdi-attachment"></i>
                    Resume
                </a>
            </li> -->
        </ul>
    </div>
    <div class="profile-feed">
        <?php
    include("../config.php");
    $sql = "SELECT Posts.ID ID, UserID, Username, LastName, FirstName, Text, DateTime FROM Posts
            LEFT JOIN Users U ON Posts.UserID = U.ID
            WHERE UserID = " . $_SESSION['user_id'] .
            " ORDER BY DateTime DESC";

    $result = mysqli_query($db, $sql);
    if (mysqli_num_rows($result) > 0) {
        // output data of each row
        while ($row = mysqli_fetch_assoc($result)) {
            echo '<div class="d-flex align-items-start profile-feed-item">'
           . '<img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile" class="img-sm rounded-circle">'
           . '<div class="ml-4">'
            . '<a href="">'
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

        <!-- <div class="d-flex align-items-start profile-feed-item">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile" class="img-sm rounded-circle">
            <div class="ml-4">
                <h6>
                    Mason Beck
                    <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                </h6>
                <p>
                    There is no better advertisement campaign that is low cost and also successful at the same time.
                </p>
                <p class="small text-muted mt-2 mb-0">
                    <span>
                        <i class="mdi mdi-star mr-1"></i>4
                    </span>
                    <span class="ml-2">
                        <i class="mdi mdi-comment mr-1"></i>11
                    </span>
                    <span class="ml-2">
                        <i class="mdi mdi-reply"></i>
                    </span>
                </p>
            </div>
        </div>

        <div class="d-flex align-items-start profile-feed-item">
            <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile" class="img-sm rounded-circle">
            <div class="ml-4">
                <h6>
                    Willie Stanley
                    <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                </h6>
                <p>
                    There is no better advertisement campaign that is low cost and also successful at the same time.
                </p>
                <img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="sample" class="rounded mw-100">
                <p class="small text-muted mt-2 mb-0">
                    <span>
                        <i class="mdi mdi-star mr-1"></i>4
                    </span>
                    <span class="ml-2">
                        <i class="mdi mdi-comment mr-1"></i>11
                    </span>
                    <span class="ml-2">
                        <i class="mdi mdi-reply"></i>
                    </span>
                </p>
            </div>
        </div> -->

    </div>
</div>
<?php
  include('header.php');
?>