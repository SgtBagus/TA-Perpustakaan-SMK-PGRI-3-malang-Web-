<!-- <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names.."> -->

<!-- <table id="myTable">
  <tr class="header">
    <th style="width:60%;">Name</th>
    <th style="width:40%;">Country</th>
  </tr>
  <tr>
    <td>Alfreds Futterkiste</td>
    <td>Germany</td>
  </tr>
  <tr>
    <td>Berglunds snabbkop</td>
    <td>Sweden</td>
  </tr>
  <tr>
    <td>Island Trading</td>
    <td>UK</td>
  </tr>
  <tr>
    <td>Koniglich Essen</td>
    <td>Germany</td>
  </tr>
</table> -->

<?php
include 'system/koneksi.php';
$yeah = date("Ymd");

$query = "SELECT no_register FROM buku WHERE id_buku IN (SELECT max(id_buku) FROM buku ) ";
$result = mysqli_query($con, $query);
$data = mysqli_fetch_assoc($result);
$no_register = floatval($data['no_register']) + 1;

$query_hari= "SELECT SUBSTRING(no_register, 1, 8) AS no_register FROM buku WHERE id_buku IN (SELECT max(id_buku) FROM buku ) ";
$result_hari = mysqli_query($con, $query_hari);
$data_hari = mysqli_fetch_assoc($result_hari);
$no_register_hari = $data_hari['no_register'];

echo $no_register.'<br>';
echo $no_register_hari.'<br>';
echo $yeah.'<br>';

if($no_register_hari == $yeah){
  echo 'hari ini buku bertambah dengan tampilan <b>'.$no_register.'</b>';
}else{
  echo $no_register_hari.'0001';
  
}

?>

<script>
function myFunction() {
  var input, filter, table, tr, td, i;
  input = document.getElementById("myInput");
  filter = input.value.toUpperCase();
  table = document.getElementById("myTable");
  tr = table.getElementsByTagName("tr");
  for (i = 0; i < tr.length; i++) {
    td = tr[i].getElementsByTagName("td")[0];
    if (td) {
      if (td.innerHTML.toUpperCase().indexOf(filter) > -1) {
        tr[i].style.display = "";
      } else {
        tr[i].style.display = "none";
      }
    }
  }
}
</script>
