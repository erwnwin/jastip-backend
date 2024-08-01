$(document).ready(function() {
    $('#formGadai').on('submit', function(event) {
        event.preventDefault(); // Mencegah pengiriman formulir yang default

        // Menampilkan spinner loading
        $('#btnFormGadai').show();

        $.ajax({
            url: 'form-gadai/store', // Ganti dengan URL endpoint untuk menyimpan data
            type: 'POST',
            data: $(this).serialize(), // Mengirim data formulir
            dataType: 'json',
            success: function(response) {
                if (response.status === 'success') {

                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000
                    });
        
                    Toast.fire({
                        icon: 'success',
                        title: response.message
                    });
        
                    // Refresh halaman setelah 2 detik
                    setTimeout(function() {
                        window.location.href = response.redirect;
                    }, 2000);

                } else {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000
                    });
        
                    Toast.fire({
                        icon: 'error',
                        title: response.message
                    });
                }
                // Menyembunyikan spinner loading
                $('#btnFormGadai').hide();
            },
            error: function() {
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 4000
                });
    
                Toast.fire({
                    icon: 'error',
                    title: response.message
                });
                $('#btnFormGadai').hide();
            }
        });
    });
});