$(document).ready(function() {
    $('#btnProsesPembayaran').click(function() {
        var form = $('#formProsesPembayaran')[0];
        var formData = new FormData(form);

        $.ajax({
            type: "POST",
            url: "../pembayaran-store",
            data: formData,
            processData: false,
            contentType: false,
            beforeSend: function() {
                $('#btnLoader').show(); // Tampilkan loading spinner
                $('#btnProsesPembayaran').attr('disabled', true); // Nonaktifkan tombol saat proses pengiriman
            },
            success: function(response) {
                console.log(response);
                var data = JSON.parse(response);
                if (data.status) {
                    // Jika berhasil
                      // Menampilkan toast success dengan SweetAlert2
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000
                    });

                    Toast.fire({
                        icon: 'success',
                        title: data.message // Pesan dari respons AJAX
                    });
                    setTimeout(function() {
                        window.location.href = data.redirect;
                    }, 2000); // Delay 3 detik sebelum redirect
                } else {
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                
                    Toast.fire({
                        icon: 'error',
                        title: data.message
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error(xhr.responseText);
                var Toast = Swal.mixin({
                    toast: true,
                    position: 'top-end',
                    showConfirmButton: false,
                    timer: 3000
                });
            
                Toast.fire({
                    icon: 'error',
                    title: 'Something went wrong. Please try again.'
                });
            },
            complete: function() {
                $('#btnLoader').hide(); // Sembunyikan loading spinner
                $('#btnProsesPembayaran').attr('disabled', false); // Aktifkan kembali tombol setelah selesai
            }
        });
    });
});