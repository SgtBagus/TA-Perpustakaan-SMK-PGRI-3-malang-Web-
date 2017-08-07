<?php include('system/session.php');

  // $query_buku = "SELECT a.id_buku, a.judul_buku, a.id_jenis_buku, b.subyek, a.jenis_media,
  // --                 a.bahasa FROM buku AS a INNER JOIN jenis_buku AS b WHERE a.id_jenis_buku = b.id_jenis_buku" ;
                  
  $query_login = "SELECT a.*, b.* FROM varifikasi AS a INNER JOIN 
                  pegawai AS b WHERE a.id_user = b.id_pegawai AND email_user ='$_SESSION[email]'";
  $result_login = mysqli_query($con, $query_login);
  if(!$result_login){
    die ("Query Error: ".mysqli_errno($con).
    " - ".mysqli_error($con));
  }
  $data_login = mysqli_fetch_assoc($result_login);
  $username   = $data_login["username_user"];
  $email      = $data_login["email_user"];
  $foto_user  = $data_login["foto_user"];
  $jabatan    = $data_login["jabatan_pegawai"];
  $role       = $data_login["role_user"];
  $no_hp      = $data_login["no_hp_pegawai"];
?>

<div class="site-header">
  <nav class="navbar navbar-default">
    <div class="navbar-header" align="center">
      <a class="navbar-brand" href="index.php">
        <img src="img/logo.png" alt="" height="25">
        <span>Katalog Perpustakaan</span>
      </a>
      <button class="navbar-toggler left-sidebar-toggle pull-left visible-xs" type="button">
        <span class="hamburger"></span>
      </button>
      <button class="navbar-toggler pull-right visible-xs-block" type="button" data-toggle="collapse" data-target="#navbar">
        <span class="more"></span>
      </button>
    </div>
    <div class="navbar-collapsible">
      <div id="navbar" class="navbar-collapse collapse">
        <button class="navbar-toggler left-sidebar-collapse pull-left hidden-xs" type="button">
          <span class="hamburger"></span>
        </button>
        <ul class="nav navbar-nav">
          <li class="visible-xs-block">
            <div class="nav-avatar">
              <img class="img-circle" src="img/avatars/<?php echo $foto_user ?>" alt="" width="48" height="48">
            </div>
            <h4 class="navbar-text text-center"><?php echo $username; ?></h4>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-table dropdown visible-xs-block">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="nav-cell nav-icon">
                <i class="zmdi zmdi-account-o"></i>
              </span>
              <span class="hidden-md-up m-l-15">Account</span>
            </a>
            <ul class="dropdown-menu">
              <li><a href="profil.php">Profil</a></li>
              <li><a href="#">Help</a></li>
              <li role="separator" class="divider"></li>
              <li><a href="system/logout.php">Logout</a></li>
            </ul>
          </li>
          <li class="nav-table dropdown">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="nav-cell nav-icon">
                <i class="zmdi zmdi-notifications-none"></i>
              </span>
              <span class="hidden-md-up m-l-15">Notifications</span>
              <span class="label label-success">3</span>
            </a>
            <div class="dropdown-menu custom-dropdown dropdown-notifications dropdown-menu-right">
              <div class="dropdown-header">
                <span>Notifications</span>
                <a href="#" class="text-primary">Mark all as read</a>
              </div>
              <div class="n-items">
                <div class="custom-scrollbar">
                  <div class="n-item">
                    <div class="ni-img">
                      <img class="img-circle" src="img/avatars/1.jpg" alt="" width="40" height="40">
                    </div>
                    <div class="ni-text"><a href="#">John Doe</a> is now following <a href="#">Kate Morris</a>.</div>
                    <div class="ni-time">10 min</div>
                  </div>
                  <div class="n-item">
                    <div class="ni-img">
                      <img class="img-circle" src="img/avatars/2.jpg" alt="" width="40" height="40">
                    </div>
                    <div class="ni-text"><a href="#">Alexander Olsen</a> liked post <a href="#">Getting Started with SASS</a>.</div>
                    <div class="ni-time">40 min</div>
                  </div>
                  <div class="n-item">
                    <div class="ni-img">
                      <img class="img-circle" src="img/avatars/3.jpg" alt="" width="40" height="40">
                    </div>
                    <div class="ni-text"><a href="#">Linda Davis</a> commented post <a href="#">How to use Bower</a>.</div>
                    <div class="ni-time">3 hours</div>
                  </div>
                </div>
              </div>
              <div class="dropdown-footer">
                <a href="#">View all notifications</a>
              </div>
            </div>
          </li>

          <li class="nav-table dropdown hidden-sm-down">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="nav-cell p-r-10">
                <img class="img-circle" src="img/avatars/<?php echo $foto_user ?>" alt="" width="32" height="32">
              </span>
              <span class="nav-cell"><?php echo $username; ?>
                <span class="caret"></span>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="profil.php">
                  <i class="zmdi zmdi-account-o m-r-10"></i> Profil</a>
              </li>
              <li>
                <a href="#">
                  <i class="zmdi zmdi-help-outline m-r-10"></i> Help</a>
              </li>
              <li role="separator" class="divider"></li>
              <li>
                <a href="system/logout.php">
                  <i class="zmdi zmdi-power m-r-10"></i> Logout</a>
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>
