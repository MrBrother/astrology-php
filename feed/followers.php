<?php
  session_start();
  include('header.php');
  include('side_bar.php');
  include('../security.php');
?>
<div class="col-lg-8">
    <div class="d-block d-md-flex justify-content-between mt-4 mt-md-0">
        <div class="text-center mt-4 mt-md-0">
            <h2>Список подписчиков</h2>
        </div>
    </div>
    <div class="profile-feed">
        <a href="#">
            <div class="d-flex align-items-start profile-feed-item">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile"
                    class="img-sm rounded-circle">
                <div class="ml-4">
                    <h6>
                        Mason Beck
                        <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                    </h6>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="d-flex align-items-start profile-feed-item">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile"
                    class="img-sm rounded-circle">
                <div class="ml-4">
                    <h6>
                        Mason Beck
                        <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                    </h6>
                </div>
            </div>
        </a>
        <a href="#">
            <div class="d-flex align-items-start profile-feed-item">
                <img src="https://bootdey.com/img/Content/avatar/avatar1.png" alt="profile"
                    class="img-sm rounded-circle">
                <div class="ml-4">
                    <h6>
                        Mason Beck
                        <small class="ml-4 text-muted"><i class="mdi mdi-clock mr-1"></i>10 hours</small>
                    </h6>
                </div>
            </div>
        </a>
    </div>
</div>

<?php
  include('header.php');
?>