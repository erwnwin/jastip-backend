function showBuktiBayar(idRequest) {
    $.ajax({
        url: 'api/titipan/get-bukti-bayar/' + idRequest,
        method: 'GET',
        success: function(response) {
            const data = JSON.parse(response);
            if (data.status === 'success') {
                const buktiBayar = data.data;
                $('#bukti-bayar-details').html(
                    `<p><strong>Bukti Bayar:</strong></p>
                    <img src="uploads/bukti_tf/${buktiBayar.bukti_tf}" alt="Bukti Bayar" class="img-fluid">`
                );
                $('#modalBuktiBayar').modal('show');
            } else {
                alert(data.message);
            }
        },
        error: function() {
            alert('Error fetching data.');
        }
    });
}

$(document).ready(function() {
    // Bind click event to buttons that need to show the modal
    $('.view-bukti-bayar').on('click', function() {
        const idRequest = $(this).data('id');
        showBuktiBayar(idRequest);
    });
});


