<footer class="main-footer">
    <div class="float-right d-none d-sm-block">
        Anything you want
    </div>
    Copyright &copy; 2024 <a href="#"> ~ Titik Balik Teknologi</a>
</footer>

<!-- Control Sidebar -->
<aside class="control-sidebar control-sidebar-dark">
    <!-- Control sidebar content goes here -->
</aside>
<!-- /.control-sidebar -->
</div>
<!-- ./wrapper -->

<!-- jQuery -->
<script src="<?= base_url() ?>assets/plugins/jquery/jquery.min.js"></script>
<!-- Bootstrap 4 -->
<script src="<?= base_url() ?>assets/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<!-- DataTables  & Plugins -->
<script src="<?= base_url() ?>assets/plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/dataTables.buttons.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.bootstrap4.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/jszip/jszip.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/pdfmake.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/pdfmake/vfs_fonts.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.html5.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.print.min.js"></script>
<script src="<?= base_url() ?>assets/plugins/datatables-buttons/js/buttons.colVis.min.js"></script>

<!-- SweetAlert2 -->
<script src="<?= base_url() ?>assets/plugins/sweetalert2/sweetalert2.min.js"></script>
<!-- Toastr -->
<script src="<?= base_url() ?>assets/plugins/toastr/toastr.min.js"></script>

<!-- AdminLTE App -->
<script src="<?= base_url() ?>assets/dist/js/adminlte.min.js"></script>


<script src="<?= base_url() ?>public/ajax/jastip.js"></script>
<script src="<?= base_url() ?>public/ajax/jastip-delete.js"></script>
<script src="<?= base_url() ?>public/ajax/pengumuman.js"></script>
<script src="<?= base_url() ?>public/ajax/pembayaran-proses.js"></script>
<script src="<?= base_url() ?>public/ajax/bukti-tf.js"></script>

<!-- AdminLTE for demo purposes -->
<!-- <script src="<?= base_url() ?>assets/dist/js/demo.js"></script> -->
<!-- Page specific script -->
<!-- <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyDKspfJ7P3cKKSJmmU2FHz6tiLT0lA5Po0&callback=initMap" async defer></script> -->
<!-- <script>
    (g => {
        var h, a, k, p = "The Google Maps JavaScript API",
            c = "google",
            l = "importLibrary",
            q = "__ib__",
            m = document,
            b = window;
        b = b[c] || (b[c] = {});
        var d = b.maps || (b.maps = {}),
            r = new Set,
            e = new URLSearchParams,
            u = () => h || (h = new Promise(async (f, n) => {
                await (a = m.createElement("script"));
                e.set("libraries", [...r] + "");
                for (k in g) e.set(k.replace(/[A-Z]/g, t => "_" + t[0].toLowerCase()), g[k]);
                e.set("callback", c + ".maps." + q);
                a.src = `https://maps.${c}apis.com/maps/api/js?` + e;
                d[q] = f;
                a.onerror = () => h = n(Error(p + " could not load."));
                a.nonce = m.querySelector("script[nonce]")?.nonce || "";
                m.head.append(a)
            }));
        d[l] ? console.warn(p + " only loads once. Ignoring:", g) : d[l] = (f, ...n) => r.add(f) && u().then(() => d[l](f, ...n))
    })
    ({
        key: "AIzaSyAUlGvW5gPy7Yb6EkzN00N32s9-kdyaQRg",
        v: "weekly"
    });
</script>
<script>
    let map;

    async function initMap() {
        const {
            Map
        } = await google.maps.importLibrary("maps");

        map = new Map(document.getElementById("map"), {
            center: {
                lat: -5.131862652173725,
                lng: 119.48931704442326
            },
            zoom: 12,
        });
    }

    initMap();
</script> -->
<script src="https://unpkg.com/leaflet@1.9.4/dist/leaflet.js" integrity="sha256-20nQCchB9co0qIjJZRGuk2/Z9VM+kNiyxNV1lvTlZBo=" crossorigin=""></script>

<script>
    $(document).ready(function() {
        $('#modalMaps').on('shown.bs.modal', function() {
            // Inisialisasi peta Leaflet dan marker di sini
            var map = L.map('map').setView([-5.1402402871216415, 119.48348055779425], 15);
            L.tileLayer('https://{s}.tile.openstreetmap.org/{z}/{x}/{y}.png', {
                maxZoom: 19,
                attribution: '&copy; <a href="http://www.openstreetmap.org/copyright">OpenStreetMap</a>'
            }).addTo(map);

            var marker = L.marker([-5.1402402871216415, 119.48348055779425], {
                draggable: true
            }).addTo(map);

            // Tambahkan event listener untuk mengupdate form input saat marker digeser
            marker.on('dragend', function(event) {
                var position = marker.getLatLng();
                document.getElementById('latitude').value = position.lat;
                document.getElementById('longitude').value = position.lng;
            });
        });
    });
</script>


<script>
    $(function() {
        $("#example1").DataTable({
            "responsive": true,
            "lengthChange": false,
            "autoWidth": false,

            // "buttons": ["copy", "csv", "excel", "pdf", "print", "colvis"]
        }).buttons().container().appendTo('#example1_wrapper .col-md-6:eq(0)');
        $('#example2').DataTable({
            "paging": true,
            "lengthChange": true,
            "searching": true,
            "ordering": true,
            "info": true,
            "autoWidth": false,
            "responsive": true,
        });
    });
</script>
<!-- <script>
    console.log("Script delete-old.js loaded");

    setInterval(function() {
        console.log("Sending request to delete old data");
        var xhr = new XMLHttpRequest();
        xhr.open("GET", "/api/titipan/delete-old-data", true);
        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4) {
                console.log("Response received: ", xhr.responseText);
            }
        };
        xhr.send();
    }, 300000); 
</script> -->



</body>

</html>