<input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for names..">

<table id="myTable">
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
</table>

<?php
include 'system/koneksi.php';
$yeah = date("Y");
$mount = date("m");
$days = date("d");
$query_buku = "SELECT max(no_register) FROM buku ";
$result_buku = mysqli_query($con, $query_buku);
$data_buku = mysqli_fetch_assoc($result_buku);
echo $data_buku['max(no_register)'].'<br>';

$format = "0000";
echo '' .$yeah. '<br>';
echo '' .$mount. '<br>';
echo '' .$days. '<br>';
echo '' .$format. '<br>';

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