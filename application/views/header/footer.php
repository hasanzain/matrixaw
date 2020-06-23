<footer class="py-4 bg-light mt-auto">
    <div class="container-fluid">
        <div class="d-flex align-items-center justify-content-between small">
            <div class="text-muted">Copyright &copy; www.onprojek.
                com</div>
        </div>
    </div>
</footer>
</div>
</div>
<script src="<?= base_url() ?>assets/js/jquery-3.4.1.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/bootstrap.bundle.min.js" crossorigin="anonymous">
</script>
<script src="<?= base_url() ?>assets/js/scripts.js"></script>
<script src="<?= base_url() ?>assets/js/Chart.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/demo/chart-area-demo.js"></script>
<script src="<?= base_url() ?>assets/demo/chart-bar-demo.js"></script>
<script src="<?= base_url() ?>assets/js/jquery.dataTables.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/js/dataTables.bootstrap4.min.js" crossorigin="anonymous"></script>
<script src="<?= base_url() ?>assets/demo/datatables-demo.js"></script>
<script>
getData();
</script>
<script>
function hitung() {
    //document.getElementById("kode_barang").value = ;


    var x = document.getElementById("harga_satuan").value;
    var y = document.getElementById("jumlah_beli").value;
    document.getElementById("total").value = x * y;

}

function hitungnet() {
    //document.getElementById("kode_barang").value = ;


    var price_list = document.getElementById("price_list").value;
    var d1 = document.getElementById("diskon1").value;
    var d2 = document.getElementById("diskon2").value;
    var d3 = document.getElementById("diskon3").value;
    var d4 = document.getElementById("diskon4").value;
    var ppn = document.getElementById("ppn").value;
    var net1 = price_list * d1 / 100;
    var net2 = d1 * d2 / 100;
    var net3 = d2 * d3 / 100;
    var net4 = d3 * d4 / 100;
    var totalnet = price_list - (net1 + net2 + net3 + net4);
    var ppn = (totalnet) * ppn / 100;
    document.getElementById("harga_satuan").value = totalnet + ppn;
}

function getdata2() {
    //document.getElementById("kode_barang").value = ;


    var x = document.getElementById("nama_barang").value;
    $.ajax({
        type: "POST",
        data: 'nama_barang=' + x,
        url: '<?php echo base_url ("autocomplate/ambilkodebarang"); ?>',
        dataType: 'json',
        success: function(hasil) {
            $('#EditForm [id = kode_barang]').val(hasil[0].kode_barang);
            $('#EditForm [id = harga_satuan]').val(hasil[0].harga_satuan);
        }
    })

}
</script>
</body>


</html>