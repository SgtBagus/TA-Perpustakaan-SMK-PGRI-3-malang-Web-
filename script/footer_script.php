<script src="asstes/js/vendor.min.js"></script>
<script src="asstes/js/cosmos.min.js"></script>
<script src="asstes/js/application.min.js"></script>
<script src="asstes/js/index.min.js"></script>
<script src="asstes/js/tables-datatables.min.js"></script>
<script type="text/javascript" charset="utf-8">
$(document).ready(function() {
  $('#dataTable').DataTable({
    "language": {
      "lengthMenu"  : "Tampilkan _MENU_ Data Perhalaman",
      "zeroRecords" : "Data Tidak Ditemukan",
      "info"        : "Data Sebanyak _TOTAL_ Dengan Halaman <b>_START_</b> sampai <b>_END_</b>",
      "infoEmpty"   : "Data Tidak Ada",
      "infoFiltered": "(Pencarian dari _MAX_ Total Data)",
      "search"      : "Pencarian : ",
      "paginate"    : {
                      "next"      : "Selanjutnya",
                      "previous"  : "Sebelumnya"
      }
    }
  });
});
</script>
