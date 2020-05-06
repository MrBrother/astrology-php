<div class="col-lg-4">
  <div class="profile-card">
    <img src="../img/photo-t.jpg" alt="user" class="profile-photo">
    <h5><a href="#" class="text-white"><?php echo $_SESSION['username']; ?></a></h5>
    <a href="#" class="text-white"><i class="fa fa-user"></i> 0 подписчиков</a>
  </div>
  <!--profile card ends-->
  <ul class="nav-news-feed">
    <li ><i class="fa fa-list-alt <?php if($_SERVER['PHP_SELF'] == '/feed/main.php') echo 'icon1'?>"></i>
      <div ><a href="main.php" <?php if($_SERVER['PHP_SELF'] == '/feed/main.php') echo 'class="active"'?>>Лента</a></div>
    </li>
    <li><i class="fa fa-user <?php if($_SERVER['PHP_SELF'] == '/feed/followers.php') echo 'icon1'?>"></i>
      <div><a href="followers.php" <?php if($_SERVER['PHP_SELF'] == '/feed/followers.php') echo 'class="active"'?>>Подписчики</a></div>
    </li>
    <!-- <li><i class="fa fa-comments "></i>
      <div><a href="#">Сообщения</a></div>
    </li> -->
    <li><i class="fa fa-picture-o <?php if($_SERVER['PHP_SELF'] == '/feed/my_photos.php') echo 'icon1'?>"></i>
      <div><a href="my_photos.php" <?php if($_SERVER['PHP_SELF'] == '/feed/my_photos.php') echo 'class="active"'?>>Фотографии</a></div>
    </li>
    <li><i class="fa fa-search <?php if($_SERVER['PHP_SELF'] == '/feed/people_search.php') echo 'icon1'?>"></i>
      <div><a href="people_search.php" <?php if($_SERVER['PHP_SELF'] == '/feed/people_search.php') echo 'class="active"'?>>Поиск Людей</a></div>
    </li>
    <li><i class="fa fa-cog <?php if($_SERVER['PHP_SELF'] == '/feed/settings.php') echo 'icon1'?>"></i>
      <div><a href="settings.php" <?php if($_SERVER['PHP_SELF'] == '/feed/settings.php') 'class="active"'?>>Настройки</a></div>
    </li>
  </ul>
  <!--news-feed links ends-->
  <div id="chat-block">
    <!-- <div class="title">Друзья в сети</div>
    <ul class="online-users list-inline">
      <li><a href="#" title="Linda Lohan"><img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="user" class="img-responsive profile-photo"><span class="online-dot"></span></a></li>
      <li><a href="#" title="Sophia Lee"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="img-responsive profile-photo"><span class="online-dot"></span></a></li>
      <li><a href="#" title="Julia Cox"><img src="https://bootdey.com/img/Content/avatar/avatar6.png" alt="user" class="img-responsive profile-photo"><span class="online-dot"></span></a></li>
    </ul> -->
  </div>
</div>
