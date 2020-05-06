<?php
  session_start();
  include('../security.php');
  include("../config.php");

    if ($_SERVER["REQUEST_METHOD"] == "POST") {
        
        $sql_create_post = "INSERT INTO test.Posts (UserID, DateTime, Text) 
                            VALUES (" . $_SESSION['user_id'] . ", DEFAULT, '" . $_POST["text"] . "')";
        $result = mysqli_query($db, $sql_create_post);
        $post_id = mysqli_insert_id($db);
        $targetDir = "../uploads/"; 
        $allowTypes = array('jpg','png','jpeg','gif', 'JPG','PNG','JPEG','GIF'); 
        $statusMsg = $errorMsg = $insertValuesSQL = $errorUpload = $errorUploadType = ''; 
        
        $fileNames = array_filter($_FILES['images']['name']); 
        
        if(!empty($fileNames)){ 
            foreach($_FILES['images']['name'] as $key=>$val){ 
                // File upload path 
                $temp = explode(".", $_FILES["images"]["name"][$key]);
                $newfilename = uniqid() . '.' . end($temp);
                $fileName = basename($newfilename); 
                
                $targetFilePath = $targetDir . $fileName; 
                 
                // Check whether file type is valid 
                $fileType = pathinfo($targetFilePath, PATHINFO_EXTENSION); 
                if(in_array($fileType, $allowTypes)){ 
                    // Upload file to server 
                    if(move_uploaded_file($_FILES["images"]["tmp_name"][$key], $targetFilePath)){ 
                        // Image db insert sql 
                        $insertValuesSQL .= "('".$fileName."'," . $_SESSION['user_id'] .",". $post_id ."),"; 
                    }else{ 
                        $errorUpload .= $_FILES['images']['name'][$key].' | '; 
                    } 
                }else{ 
                    $errorUploadType .= $_FILES['images']['name'][$key].' | '; 
                } 
            } 
             
            if(!empty($insertValuesSQL)){ 
                $insertValuesSQL = trim($insertValuesSQL, ','); 
                // Insert image file name into database 
                $insert = $db->query("INSERT INTO UserImages (Picture, UserID, PostID) VALUES $insertValuesSQL"); 
                if($insert){ 
                    $errorUpload = !empty($errorUpload)?'Upload Error: '.trim($errorUpload, ' | '):''; 
                    $errorUploadType = !empty($errorUploadType)?'File Type Error: '.trim($errorUploadType, ' | '):''; 
                    $errorMsg = !empty($errorUpload)?'<br/>'.$errorUpload.'<br/>'.$errorUploadType:'<br/>'.$errorUploadType; 
                    $statusMsg = "Files are uploaded successfully.".$errorMsg; 
                }else{ 
                    $statusMsg = "Sorry, there was an error uploading your file."; 
                } 
            } 
        }

        if ($result) {
            header('location: main.php');
        } else {
            echo "Error";
        }
    }
  include('header.php');
  include('side_bar.php');
  include('../security.php');

?>

<div class="col-lg-8">
<form class="md-form" method="POST" enctype="multipart/form-data">
    <div class="form-group">
        <label for="comment">О чем вы думаете:</label>
        <textarea class="form-control" rows="6" id="comment" name="text"></textarea>
    </div>
    
        <div class="file-field">
            <div class="btn btn-primary btn-sm float-left">
                <span>Выберите фотографии</span>
                <input accept="image/*" type="file" name="images[]" multiple>
            </div>
        </div>
    
    <button class="btn btn-success pull-right" type="submit">Опубликовать</button>
    </form>
</div>

<?php
  include('header.php');
?>