<script src="assets/js/vendor.min.js"></script>
<script src="assets/js/cosmos.min.js"></script>
<script src="assets/js/application.min.js"></script> 
<script src="assets/js/index.min.js"></script>
<script src="assets/js/forms-form-masks.min.js"></script>
<script src="assets/js/jquery.min.js"></script>
<script>
    function readURL(input) { // Mulai membaca inputan gambar
        if (input.files && input.files[0]) {
            var reader = new FileReader(); // Membuat variabel reader untuk API FileReader
            
            reader.onload = function (e) { // Mulai pembacaan file
            $('#preview_gambar') // Tampilkan gambar yang dibaca ke area id #preview_gambar
            .attr('src', e.target.result)
            .width(100); // Menentukan lebar gambar preview (dalam pixel)
            };
        reader.readAsDataURL(input.files[0]);
        }
    }
</script>

