$(document).ready(function() {
    $('#loginForm').on('submit', function(e) {
        e.preventDefault();

        $('#btnLogin').prop('disabled', true).html('Login ....');
          // Determine the table based on the identifier (could also be handled differently)
          var identifier = $('#identifier').val();
          var password = $('#password').val();
          var table = identifier.includes('@') ? 'tbl_jastip' : 'tbl_users';

        $.ajax({
            url: 'login/act',
            type: 'POST',
            data: {
                table: table,
                identifier: identifier,
                password: password
            },
            dataType: 'json',
            success: function(response) {
                if (response.status == 'success') {
                     // Menampilkan toast success dengan SweetAlert2
                     $('#btnLogin').prop('disabled', false).html('Login');
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
                $('#identifier').val('');
                $('#password').val('');

                  // Redirect ke halaman jasa-titip setelah 3 detik
                  setTimeout(function() {
                    window.location.href = response.redirect;
                }, 2000); // Delay 3 detik sebelum redirect
                } else {
                      // Menampilkan toast error dengan SweetAlert2
                    $('#btnLogin').prop('disabled', false).html('Login');
                    var Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 3000
                    });
                
                    Toast.fire({
                        icon: 'error',
                        title: response.message
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
            }
        });
    });
});