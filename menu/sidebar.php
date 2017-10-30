<div class="site-left-sidebar">
  <div class="sidebar-backdrop"></div>
  <div class="custom-scrollbar">
    <ul class="sidebar-menu">
      <li class="menu-title">Menu</li>
      <?php
      if($page == "DASHBOARD"){
        echo '<li class="active">';
      }else{
        echo '<li>';
      }
      ?>
        <a href="index.php">
          <span class="menu-icon">
            <i class="zmdi zmdi-view-dashboard"></i>
          </span>
          <span class="menu-text">Dasboard</span>
        </a>
      </li><?php
      if($page == "SISWA"){
        echo '<li class="with-sub active open">';
      }else if ($page == "PEGAWAI"){
        echo '<li class="with-sub active open">';
      }else if ($page == "JENIS BUKU"){
        echo '<li class="with-sub active open">';
      }else{
        echo '<li class="with-sub">';
      }
      ?>
        <a href="#" aria-haspopup="true">
          <span class="menu-icon">
            <i class="zmdi zmdi-storage"></i>
          </span>
          <span class="menu-text">Master</span>
        </a>
        <ul class="sidebar-submenu collapse">
          <li class="menu-subtitle">Master</li>   
          <?php
          if($page == "SISWA"){
            echo '<li class="active">';
          }
          else {
            echo '<li>';
          }
          ?>
            <a href="siswa.php">Siswa</a>
          </li>   
          <?php
          if($page == "PEGAWAI"){
            echo '<li class="active">';
          }
          else {
            echo '<li>';
          }
          ?>
            <a href="pegawai.php">Pegawai</a>
          </li>
          <?php
          if($page == "JENIS BUKU"){
            echo '<li class="active">';
          }
          else {
            echo '<li>';
          }
          ?>
            <a href="jenis_buku.php">Jenis Buku</a>
          </li>
        </ul>
      </li>
      <?php
      if($page == "USER"){
        echo '<li class="active">';
      }else{
        echo '<li>';
      }
      ?>
        <a href="user.php">
          <span class="menu-icon">
            <i class="zmdi zmdi-account"></i>
          </span>
          <span class="menu-text">User</span>
        </a>
      </li>
      <?php
      if($page == "BUKU"){
        echo '<li class="active">';
      }else{
        echo '<li>';
      }
      ?>
        <a href="buku.php">
          <span class="menu-icon">
            <i class="zmdi zmdi-book"></i>
          </span>
          <span class="menu-text">Buku</span>
        </a>
      </li>
      <?php
      if($page == "PEMINJAMAN"){
        echo '<li class="active">';
      }else{
        echo '<li>';
      }
      ?>
        <a href="peminjaman.php">
          <span class="menu-icon">
            <i class="zmdi zmdi-assignment"></i>
          </span>
          <span class="menu-text">Peminjaman</span>
        </a>
      </li>
      <?php
      if($page == "PENGEMBALIAN"){
        echo '<li class="active">';
      }else{
        echo '<li>';
      }
      ?>
        <a href="pengembalian.php">
          <span class="menu-icon">
            <i class="zmdi zmdi-assignment-returned"></i>
          </span>
          <span class="menu-text">Pengembalian</span>
        </a>
      </li>
      <?php
      if($page == "SANKSI"){
        echo '<li class="active">';
      }else{
        echo '<li>';
      }
      ?>
        <a href="sanksi.php">
          <span class="menu-icon">
            <i class="zmdi zmdi-info"></i>
          </span>
          <span class="menu-text">Sanksi</span>
        </a>
      </li>
      <?php
      if($page == "CETAK"){
        echo '<li class="active">';
      }else{
        echo '<li>';
      }
      ?>
        <a href="cetak.php">
          <span class="menu-icon">
            <i class="zmdi zmdi-print"></i>
          </span>
          <span class="menu-text">Cetak Laporan</span>
        </a>
      </li>
      <?php
      if($page == "RIWAYAT"){
        echo '<li class="active">';
      }else{
        echo '<li>';
      }
      ?>
        <a href="riwayat.php">
          <span class="menu-icon">
            <i class="zmdi zmdi-time-restore-setting"></i>
          </span>
          <span class="menu-text">Riwayat</span>
        </a>
      </li>
    </ul>
  </div>
</div>
