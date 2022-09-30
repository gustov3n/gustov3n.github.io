  </div>
</div>
</div>

  <!-- Main Footer -->
  <footer style="background-color:#7C0A02;" class="main-footer text-light">
    <strong>Copyright &copy; 2022 <a target="_blank" href="https://dimensitiga.co.id">Dimensi Tiga</a>.</strong>
    All rights reserved.
    <div class="float-right d-none d-sm-inline-block">
      <b>Version</b> 1.0
    </div>
  </footer>
</div>
</body>
<!-- ./wrapper -->
<script src="<?=base_url('theme');?>/plugins/jquery/jquery.min.js"></script>
<script src="<?=base_url('theme');?>/plugins/bootstrap/js/bootstrap.bundle.min.js"></script>
<script src="<?=base_url('theme');?>/plugins/select2/js/select2.full.min.js"></script>
<script src="<?=base_url('assets/select2/dist/js/select2.min.js');?>"></script>
<script src="<?=base_url('theme');?>/plugins/bs-stepper/js/bs-stepper.min.js"></script>
<script src="<?=base_url('theme');?>/dist/js/adminlte.js"></script>
<script src="<?=base_url('theme');?>/plugins/summernote/summernote-bs4.min.js"></script>
<script>
  $(function () {
    //Initialize Select2 Elements
    $('.select3').select2()

    //Initialize Select2 Elements
    $('.select2bs4').select2({
      theme: 'bootstrap4'
    })
  })

  $(function () {
  $('[data-toggle="tooltip"]').tooltip()
  })
</script>
<script type="text/javascript">
$(document).ready(function () {
    $("#pegawai").select2({
        theme: 'bootstrap4',
        placeholder: "Pilih Pegawai"
    });

    $("#kota2").select2({
        theme: 'bootstrap4',
        placeholder: "Please Select"
    });
});


        $(document).ready(function() {
            $("#kecamatan").select2({
                ajax: {
                    url: '<?= base_url() ?>data/getdatakec/',
                    type: "post",
                    dataType: 'json',
                    delay: 200,
                    data: function(params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });
 
        $("#kecamatan").change(function() {
            var id_kec = $("#kecamatan").val();
            $("#kelurahan").select2({
                ajax: {
                    url: '<?= base_url() ?>data/getdatakel/' + id_kec,
                    type: "post",
                    dataType: 'json',
                    delay: 200,
                    data: function(params) {
                        return {
                            searchTerm: params.term
                        };
                    },
                    processResults: function(response) {
                        return {
                            results: response
                        };
                    },
                    cache: true
                }
            });
        });

</script>


</body>
</html>
