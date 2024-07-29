$(document).ready(function() {

    $("#gambar_depan").change(function(){
        var input = this;
        if (input.files && input.files[0]) {
            var reader = new FileReader();

            reader.onload = function(e) {
                $('#imagePreview').attr('src', e.target.result);
                $('#imagePreviewContainer').show();
                $('#removeImage').show(); // Show remove option
            }

            reader.readAsDataURL(input.files[0]);
        }
    });

    // Function to remove image preview
    $('#removeImage').click(function() {
        $('#gambar_depan').val(''); // Clear input file
        $('#imagePreview').attr('src', '');
        $('#imagePreviewContainer').hide();
        $('#removeImage').hide(); // Hide remove option again
    });


    $('#formPengumuman').submit(function(e) {
        e.preventDefault(); // Prevent form submission

        var formData = new FormData(this);

        // Menampilkan loader
        $('#btnLoaderPengumuman').show();

        // Melakukan AJAX request
        $.ajax({
            url: 'store', // URL dari method store di controller Jastip
            type: 'POST', // Metode HTTP
            data: formData,
            dataType: 'json',
            contentType: false,
            processData: false,
            cache: false,

            // Sukses ketika permintaan berhasil
            success: function(response) {
                $('#btnLoaderPengumuman').hide();

                // Menampilkan toast success dengan SweetAlert2
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000
                });

                Toast.fire({
                    icon: 'success',
                    title: response.message // Pesan dari respons AJAX
                });

                // Mengosongkan nilai form setelah berhasil
                $('#judul_pengumuman').val('');
                $('#detail_pengumuman').val('');
                $('#status_pengumuman').val('');
                $('#gambar_depan').val('');
                // $('#longitude').val('');
                // $('#alamat_email').val('');
                // $('#password').val('');
                // $('#no_telp_wa').val('');

                  // Redirect ke halaman pengumuman setelah 3 detik
                  setTimeout(function() {
                    window.location.href = response.redirect;
                }, 2000); // Delay 3 detik sebelum redirect
            },

            // Gagal ketika permintaan gagal
            error: function(xhr, status, error) {
                $('#btnLoaderPengumuman').hide();
                console.error(xhr.responseText);
            
                // Menampilkan toast error dengan SweetAlert2
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            
                Toast.fire({
                    icon: 'error',
                    title: 'Gagal menyimpan data: ' + xhr.responseText
                });
            }
        });
    });

});