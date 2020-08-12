<script>
    $(document).ready(function() {
        var tbl_peminjaman = $('#tbl_peminjaman').DataTable({
            "processing": true,
            "serverSide": true,
            "ajax": {
                data: {
                    'mod': 'get'
                },
                type: "POST",
                url: "<?php echo API_URL ?>peminjaman/peminjamanController.php",
            },
            columns: [{
                    data: 'idpinjam'
                },
                {
                    data: 'nim'
                },
                {
                    data: 'nama'
                },
                {
                    data: 'tglPinjam'
                },
                {
                    data: 'tglKembali'
                },
                {
                    data: null,
                    "className": 'row-item',
                    defaultContent: '<button type="button" class="btn-detail btn btn-primary btn-sm ">Detail</button> <button type="button" class="btn-kembali btn btn-secondary btn-sm"><i class="fa fa-pencil"></i> Kembalikan </button> '
                },
            ]
        });

        $("#reload_data").click(function() {
            tbl_peminjaman.ajax.reload();
        });

        var dialog_pengembali_detail = $("#dialog-form-detail").dialog({
            autoOpen: false,
            modal: true,
            height: 400,
            width: 550,
            show: {
                effect: "slide",
                duration: 1000
            },
            hide: {
                effect: "explode",
                duration: 1000
            },
            buttons: {
                Batal: function() {
                    dialog_pengembali_detail.dialog("close");
                }
            },
        });

        $('#tbl_peminjaman tbody').on('click', 'button', function() {
            let isBtnDetail = $(this).hasClass("btn-detail");
            let isBtnKembali = $(this).hasClass("btn-kembali");
            var data = tbl_peminjaman.row($(this).parents('tr')).data();

            if (isBtnDetail) {
                dialog_pengembali_detail.dialog('open');

                $("#id_peminjaman").html(": " + data.idpinjam)
                $("#nim").html(": " + data.nim)
                $("#nama_pinjam").html(": " + data.nama)
                $("#tgl_pinjam").html(": " + data.tglPinjam)
                $("#tgl_asumsi").html(": " + data.tglKembali)
                $("#status").html(": " + data.status)
            }

            if (isBtnKembali) {
                $('#idpinjam').val(data.idpinjam)
                $('#nim').val(data.nim)
                $('#nama').val(data.nama)
                $('#asumsi').val(data.tglKembali)
                $("#form_pengembalian").modal('toggle')
            }

        });

        $('#tgl_realisasi').datepicker({
            dateFormat: "yy-mm-dd",
            onSelect: function() {
                myfunc()
            }
        });

        $.fn.clearFormPeminjaman = function() {
            $('#idpinjam').val('');
            $('#nim').val();
            $('#asumsi').val('');
            $('#tgl_realisasi').val('');
            $('#denda').val('');
        }

        $('#btn_proses_kembalikan').click(function() {
            $.ajax({
                url: '<?php echo API_URL ?>pengembalian/pengembaliancontroller.php',
                type: 'POST',
                data: {
                    mod: 'add',
                    id_pinjam: $('#idpinjam').val(),
                    nim: $('#nim').val(),
                    tgl_kembali: $('#asumsi').val(),
                    tgl_realisasi: $('#tgl_realisasi').val(),
                    denda: $('#denda').val(),
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#btn_proses_kembalikan').html("<i class='fa fa-spinner fa-spin'></i> Loading...");
                },
                success: function(res) {
                    $("#form_pengembalian").modal('toggle');
                    $('#btn_proses_kembalikan').html('Save Data');
                    tbl_peminjaman.ajax.reload();
                    $(this).clearFormPeminjaman();
                    Swal.fire({
                        title: 'Succsess',
                        text: res.messages,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                }
            })
        });

    });

    var days = 0;

    function myfunc() {
        var endDay = new Date($('#asumsi').val());
        var startDay = new Date($('#tgl_realisasi').val());
        var millisecondsPerDay = 1000 * 60 * 60 * 24;

        var millisBetween = startDay.getTime() - endDay.getTime();
        var days = millisBetween / millisecondsPerDay;
        var selisih = Math.floor(days);
        var denda_hari = 1000
        var denda = 0;

        if (selisih > 0)
            denda = denda_hari * selisih

        $('#denda').val(denda)
    }
</script>