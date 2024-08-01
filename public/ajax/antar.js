 // JavaScript untuk mengisi ID Request ke dalam form ketika modal dibuka
 $('#modalChangeStatus').on('show.bs.modal', function (event) {
    var button = $(event.relatedTarget);
    var id = button.data('id'); // Ambil ID dari data-id tombol
    var modal = $(this);
    modal.find('#requestId').val(id);
});

// JavaScript untuk mengirim data ke server ketika tombol update diklik
$('#updateStatusButton').on('click', function () {
    var requestId = $('#requestId').val();
    var status = $('#statusSelect').val();

    $.ajax({
        url: "api/titipan/ubah-status",
        type: "POST",
        data: {
            id: requestId,
            status: status
        },
        success: function(response) {
            // Tampilkan toast success
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });

            Toast.fire({
                icon: 'success',
                title: 'Sukses!<br>Telah memperbarui status!'
            });

            // Refresh halaman setelah 2 detik
            setTimeout(function() {
                location.reload();
            }, 2000);

            // alert('Status berhasil diupdate!');
            // location.reload(); // Reload halaman untuk memperbarui tampilan
        },
        error: function() {
           // Tampilkan toast success
            var Toast = Swal.mixin({
                toast: true,
                position: 'top-end',
                showConfirmButton: false,
                timer: 4000
            });

            Toast.fire({
                icon: 'error',
                title: 'Gagal!<br>Gagal memperbarui status!'
            });

            // Refresh halaman setelah 2 detik
            setTimeout(function() {
                location.reload();
            }, 2000);
        }
    });
});