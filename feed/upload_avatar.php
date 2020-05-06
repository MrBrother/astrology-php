
<?php
//upload.php

if (isset($_POST["image"])) {
    $data = $_POST["image"];

    $image_array_1 = explode(";", $data);

    $image_array_2 = explode(",", $image_array_1[1]);

    $data = base64_decode($image_array_2[1]);

    $imageName = $_SESSION['username'] . time() . '.png';

    file_put_contents('../media/'.$imageName, $data);

    echo '<img src="'.'../media/'.$imageName.'" class="img-thumbnail" />';
}

?>