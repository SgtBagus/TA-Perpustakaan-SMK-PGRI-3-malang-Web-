<?php 
  include('system/session.php');
  $query_login = "SELECT a.*, b.* FROM pegawai AS a INNER JOIN 
                  user AS b WHERE email ='$_SESSION[email]' AND a.NIP = b.id_siswa_pegawai";
  $result_login = mysqli_query($con, $query_login);
  if(!$result_login){
    die ("Query Error: ".mysqli_errno($con).
    " - ".mysqli_error($con)); 
  }

  $data_login         = mysqli_fetch_assoc($result_login);
  $username_login     = $data_login["username"]; 
  $jabatan_login      = $data_login["jabatan_pegawai"];
  $nama_login         = $data_login["nama_pegawai"];

function tanggal_indo($tanggal){
        $bulan = array (1 =>   'Januari',
                'Februari',
                'Maret',
                'April',
                'Mei',
                'Juni',
                'Juli',
                'Agustus',
                'September',
                'Oktober',
                'November',
                'Desember'
        );
        $split = explode('-', $tanggal);
        return $split[2] . ' ' . $bulan[ (int)$split[1] ] . ' ' . $split[0];
    }
?>

<div class="site-header">
  <nav class="navbar navbar-default"  style="background-color: rgb(238, 238, 238);">
    <div class="navbar-header" align="center">
      <a class="navbar-brand" href="#">
        <img src="img/icon.png" alt="" height="25">
        <span>Katalog Perpustakaan</span>
      </a>
    </div>
    <div class="navbar-collapsible">
      <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav">
          <li class="visible-xs-block">
            <div class="nav-avatar">
              <img class="img-circle" src="img/avatars/<?php echo $foto_login ?>" alt="" width="48" height="48">
            </div>
            <h4 class="navbar-text text-center"><?php echo $username_login ?></h4>
          </li>
        </ul>
        <ul class="nav navbar-nav navbar-right">
          <li class="nav-table dropdown hidden-sm-down">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
              <span class="nav-cell">
                <i class="zmdi zmdi-download m-r-10"></i> Cetak Laporan
                <span class="caret"></span>
              </span>
            </a>
            <ul class="dropdown-menu">
              <li>
                <a href="#" onclick="cetak_print()">
                  <i class="zmdi zmdi-print m-r-10"></i> Cetak
                </a>
              </li>
              <li>
                <a href="#" onclick="close_window()">
                  <i class="zmdi zmdi-close-circle m-r-10"></i> Batal
                </a> 
              </li>
            </ul>
          </li>
        </ul>
      </div>
    </div>
  </nav>
</div>

<table width="100%">
    <tr>
        <td width="10%">
            <div align="center">
                <img src="img/icon.png" alt="" height="60" width="60">
            </div>
        </td>
        <td>
            <div align="center">
                <h3><b>SMK PGRI 3 MALANG</b></h3>
                <p>Teknik Pembangkit Tenaga Listrik, Teknik Pemesinan, Teknik Pengelasan, Teknik Sepeda Motor,<br>
                Teknik Kendaraan Ringan, Taknik Perbaikan Bodi Otomitif, Teknik Elektronika Industri, <br>
                Teknik Audio Video, Rekayasa Perangkat Lunak, Teknik Komputer Jaringan, Multimedia Pemasaran, <br>
                Alamat: Jl. Raya Tlogomas .IX No.29 Telp(0341)554383 Fax.(0341)574755 Malang 65144 <br>
                Web: http//smkpgri3-malang.sch.id email: mail.smlpgri3malang@gmail.com
                </p>
            </div>
        </td>
        <td width="10%">
            <div align="center">
                <img src="img/icon.png" alt="" height="60" width="60">
            </div>
        </td>
    </tr>
</table>
<hr>

