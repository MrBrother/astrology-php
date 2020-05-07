<?php
  session_start();
  include('header.php');
  include('side_bar.php');
  include('../security.php');

?>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.css"
    integrity="sha256-M8o9uqnAVROBWo3/2ZHSIJG+ZHbaQdpljJLLvdpeKcI=" crossorigin="anonymous" />
<div class="col-lg-3" style="height: 200px;">
    <div class="panel panel-default">
        <div class="panel-heading">Выбрать фотографию</div>
        <div class="panel-body btn btn-success" align="center" >
            <input type="file" name="upload_image" id="upload_image" accept="image/*" />
            <div id="uploaded_image" style="margin-top:30px;"></div>
        </div>
    </div>
</div>

<!-- or even simpler -->
<!-- <img class="my-image" src="../img/photo-t.jpg" /> -->
<!-- <div class=col-lg-5>
    <input type="file" id="upload" value="Choose a file" accept="image/*">
</div> -->
<div id="uploadimageModal" class="modal" role="dialog">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal">&times;</button>
                <h4 class="modal-title"></h4>
            </div>
            <div class="modal-body">
                <div class="row">
                    <div class="col-lg-1 text-center">
                        <div id="image_demo" style="width:350px; margin-top:30px"></div>
                    </div>
                </div>
            </div>
            <div class="col-lg-4" style="margin: 20px;">
                        <button class="btn btn-success crop_image">Обрезать и загрузить</button>
                    </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-default" data-dismiss="modal">Закрыть</button>
            </div>
        </div>
    </div>
</div>
<script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.4/croppie.js"
    integrity="sha256-u/CKfMqwJ0rXjD4EuR5J8VltmQMJ6X/UQYCFA4H9Wpk=" crossorigin="anonymous"></script>
<script>

    $image_crop = $('#image_demo').croppie({
        enableExif: true,
        viewport: {
            width: 200,
            height: 200,
            type: 'circle' //circle
        },
        boundary: {
            width: 300,
            height: 300
        }
    });

    $('#upload_image').on('change', function() {
        var reader = new FileReader();
        reader.onload = function(event) {
            $image_crop.croppie('bind', {
                url: event.target.result
            }).then(function() {
                console.log('jQuery bind complete');
            });
        }
        reader.readAsDataURL(this.files[0]);
        $('#uploadimageModal').modal('show');
    });

    $('.crop_image').click(function(event) {
        $image_crop.croppie('result', {
            type: 'canvas',
            size: 'viewport'
        }).then(function(response) {
            $.ajax({
                url: "upload_avatar.php",
                type: "POST",
                data: {
                    "image": response,
                    "username": '<?php echo $_SESSION['username'] ?>',
                    "user_id": <?php echo $_SESSION['user_id'] ?>
                },
                success: function(data) {
                    $('#uploadimageModal').modal('hide');
                    $('#uploaded_image').html(data);
                }
            });
        })
    });


</script>
<?php
  include('header.php');
?>