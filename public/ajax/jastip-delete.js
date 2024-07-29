$(document).ready(function() {
    // Menangani klik tombol delete
    $('.delete-btn').click(function() {
        var id = $(this).data('id');

        // Munculkan modal delete
        $('#modalDelete').modal('show');

        // Tangani klik tombol Hapus di dalam modal
        $('#btnDelete').click(function() {
            // Lakukan proses delete dengan AJAX
            $.ajax({
                url: 'jasa-titip/delete',
                type: 'POST',
                dataType: 'json',
                data: {
                    id: id
                },
                success: function(response) {
                    if (response.success) {
                        // Tampilkan toast success
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
                            location.reload();
                        }, 2000);
                    } else {
                        // Tampilkan toast error
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
                },
                error: function(xhr, status, error) {
                    console.error(xhr.responseText);
                    // Tampilkan toast error
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 4000
                    });

                    Toast.fire({
                        icon: 'error',
                        title: 'Terjadi kesalahan saat menghapus data'
                    });
                }
            });
        });
    });
});