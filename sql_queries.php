<?php
function get_user_id($db, $username, $password)
{
    $username = mysqli_real_escape_string($db, $_POST["username"]);
    $password = mysqli_real_escape_string($db, $_POST["password"]);
    $sql_get_user_id = "SELECT ID, ProfilePicture FROM Users where Username = '$username' and Password = '$password'";
    $result = mysqli_query($db, $sql_get_user_id);
    return $result;
}
