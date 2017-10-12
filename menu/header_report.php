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

