<?php
include_once 'Controller/Message.php';
?>
<nav class="navbar navbar-expand-sm bg-light navbar-light fixed_nav">
  <div class="main_nav container">
    <div class="left_nav  col-sm-5">
      <ul class="navbar-nav">
        <li class="nav-item active"><a class="nav-link" href="index.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#about">About</a></li>
        <li class="nav-item"><a class="nav-link" href="availablehouse.php">Availabe House</a></li>
        <li class="nav-item"><a class="nav-link" href="index.php#contact">Contact</a></li>
      </ul>
    </div>
    <?php
    $msg = new Message();
    $allmsg = $msg->getMessage(Session::get('user_id'));
    if (isset ($_GET['logout']) && $_GET['logout'] == 'yes') {
      Session::sessionDestroy();
    }
    ?>
    <div class="right_nav col-sm-7 row">
      <div class="main_right_nav col-sm-9">
        <ul class="navbar-nav">
          <?php
          if (Session::get('login') == true && (Session::get('user') == 'owner')) { ?>
            <li class="nav-item"><a class="nav-link"
                href="owner_profile.php?owner_id=<?php echo Session::get('user_id'); ?>">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="add_houserent.php">Add For Rent</a></li>

          <?php }
          if (Session::get('login') == true && (Session::get('user') == 'tenant')) {
            ?>
            <li class="nav-item"><a class="nav-link"
                href="tenant_profile.php?tenant_id=<?php echo Session::get('user_id'); ?>">Profile</a></li>

          <?php } ?>
        </ul>
      </div>

      <?php
      if (($_SERVER["REQUEST_METHOD"] === "POST") && isset ($_POST['delmsg']) && isset ($_GET['id'])) {
        $delmsg = $msg->tempDelmsg(Session::get('user_id'), $_GET['id']);
      }

      ?>
      <div class="dropdown_area col-sm-3 row">
        <?php
        if (Session::get('login') == true && (Session::get('user') == 'owner' || Session::get('user') == 'tenant')) {
          ?>
          <div class="user_dropdown col-sm-7">
            <button type="button" class="btn btn-default dropdown-toggle" data-toggle="dropdown">
              <?php echo Session::get('fname') . " " . Session::get('lname'); ?></i>
            </button>
            <div class="dropdown-menu">
              <a class="dropdown-item" href="?logout=yes">Logout</a>
            </div>
          </div>
        <?php } else { ?>
          <ul class="navbar-nav">
            <li class="nav-item"><a class="nav-link" href="user_register.php">Register</a></li>
            <li class="nav-item"><a class="nav-link" href="user_login.php">Login</a></li>
            <li class="nav-item"><a class="nav-link" href="admin/login.php">Admin</a>
          </ul>
        <?php } ?>
      </div>



    </div>

  </div>
</nav>