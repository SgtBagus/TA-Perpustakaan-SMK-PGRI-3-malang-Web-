$(function() {
    $("#datepicker").datepicker({
        dateFormat: "dd-mm-yy",
        monthNames: ["Januari", "Febuari", "Maret",
            "April", "Mei", "Juni",
            "Juli", "Agustus", "September",
            "Oktober", "November", "December"
        ],
        dayNamesMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"]
    });
});

function readURL(input) { // Mulai membaca inputan gambar
    if (input.files && input.files[0]) {
        var reader = new FileReader(); // Membuat variabel reader untuk API FileReader

        reader.onload = function(e) { // Mulai pembacaan file
            $('#preview_gambar') // Tampilkan gambar yang dibaca ke area id #preview_gambar
                .attr('src', e.target.result)
                .width(100); // Menentukan lebar gambar preview (dalam pixel)
        };
        reader.readAsDataURL(input.files[0]);
    }
}