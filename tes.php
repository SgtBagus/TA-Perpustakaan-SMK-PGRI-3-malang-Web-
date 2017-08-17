<?php

    include 'system/koneksi.php';
?>
<select name="color">
<?php

$aColors = array("Red", "Blue", "Green", "Yellow", "Violet");
$dbcolor = "Red"; // stored in database

foreach ($aColors as $color) 
{
if($color == $dbcolor) {
 echo "<option value=\"$color\" SELECTED>$color</option>";
 } else
 {
  echo "<option value=\"$color\">$color</option>";
  }
}

?>
</select>
<div class="col-sm-3">
    <?php
        $query = "SELECT * FROM jenis_buku";     
        $result = mysqli_query($con, $query);
        if(!$result){
            die ("Query Error: ".mysqli_errno($con).
            " - ".mysqli_error($con));
        }
    ?>
                    </div>
                    <div class="col-sm-3">
                    <label class="control-label" for="form-control-21">Jenis Buku</label>
                        <select name="jenis_buku" class="form-control" required>                                                     
    <?php
        $value = "Bahasa";
        while($data = mysqli_fetch_assoc($result))
        {
            if($data[subyek] == $value) {
            echo '<option value="'.$data[id_jenis_buku].'" title="Diskripsi : '.$data[deskripsi_jenis_buku].'" SELECTED>'.$data[subyek].'</option>';
            } else
            {
            echo '<option value="'.$data[id_jenis_buku].'" title="Diskripsi : '.$data[deskripsi_jenis_buku].'">'.$data[subyek].'</option>';
            }
        }
    ?>
                      </select>
                    </div>