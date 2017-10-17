<div align="right">
  <?php $date=date('Y'); echo $date; ?> © Katalog Perpustakaan SMK PGRI 3
</div>

<script type="text/javascript">
  function cetak_print() {
    window.print();
  }

  function close_window() {
    swal({
      title: 'Apakah anda yakin ingin dibatalkan?',
      type: 'warning',
      showCancelButton: true,
      confirmButtonColor: '#3085d6',
      cancelButtonColor: '#d33',
      confirmButtonText: 'Iya!, Batalkan'
      }).then(function () {
        close();
    })
  }

</script>