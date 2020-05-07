
<?php
include("../config.php");
session_start();
if (isset($_POST["image"])) {
    $data = $_POST["image"];

    $image_array_1 = explode(";", $data);

    $image_array_2 = explode(",", $image_array_1[1]);

    $data = base64_decode($image_array_2[1]);

    $imageName = $_POST['username'] . time() . '.png';

    file_put_contents('../media/'.$imageName, $data);
    $sql_upload = "UPDATE test.Users t SET t.ProfilePicture = '/media/" . $imageName . "' WHERE t.ID = " . $_POST['user_id'];

    $result = mysqli_query($db, $sql_upload);
    $_SESSION['profile_image'] = "/media/".$imageName;
    // echo '<img src="'.'../media/'.$imageName.'" class="img-thumbnail" />';
    echo "<meta http-equiv='refresh' content='0'>";
}

?>