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


$(function() {
    var dateFormat = "dd-mm-yy",
        from = $("#from")
        .datepicker({
            dateFormat: "dd-mm-yy",
            monthNames: ["Januari", "Febuari", "Maret",
                "April", "Mei", "Juni",
                "Juli", "Agustus", "September",
                "Oktober", "November", "December"
            ],
            dayNamesMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1
        })
        .on("change", function() {
            to.datepicker("option", "minDate", getDate(this));
        }),
        to = $("#to").datepicker({
            dateFormat: "dd-mm-yy",
            monthNames: ["Januari", "Febuari", "Maret",
                "April", "Mei", "Juni",
                "Juli", "Agustus", "September",
                "Oktober", "November", "December"
            ],
            dayNamesMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1
        })
        .on("change", function() {
            from.datepicker("option", "maxDate", getDate(this));
        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }
});

$(function() {
    var dateFormat = "dd-mm-yy",
        awal = $("#awal")
        .datepicker({
            dateFormat: "dd-mm-yy",
            monthNames: ["Januari", "Febuari", "Maret",
                "April", "Mei", "Juni",
                "Juli", "Agustus", "September",
                "Oktober", "November", "December"
            ],
            dayNamesMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1
        })
        .on("change", function() {
            akhir.datepicker("option", "minDate", getDate(this));
        }),
        akhir = $("#akhir").datepicker({
            dateFormat: "dd-mm-yy",
            monthNames: ["Januari", "Febuari", "Maret",
                "April", "Mei", "Juni",
                "Juli", "Agustus", "September",
                "Oktober", "November", "December"
            ],
            dayNamesMin: ["Min", "Sen", "Sel", "Rab", "Kam", "Jum", "Sab"],
            defaultDate: "+1w",
            changeMonth: false,
            numberOfMonths: 1
        })
        .on("change", function() {
            awal.datepicker("option", "maxDate", getDate(this));
        });

    function getDate(element) {
        var date;
        try {
            date = $.datepicker.parseDate(dateFormat, element.value);
        } catch (error) {
            date = null;
        }

        return date;
    }
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