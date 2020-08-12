<script>
    $(document).ready(function() {

        $('.datepicker').datepicker({
            onSelect: function(dateText, inst) {
                $(".datepicker_dua").datepicker('option', 'minDate', dateText);
            },
            dateFormat: "yy-mm-dd",
        });


        $('.datepicker_dua').datepicker({
            dateFormat: "yy-mm-dd",
        });

        $.ajax({
            url: '<?php echo API_URL ?>member/proses.php',
            data: {
                mode: 'get'
            },
            dataType: 'json',
            type: 'POST',
            success: function(res) {
                let option = "";
                for (let i = 0; i < res.length; i++) {
                    option += "<option value='" + res[i].nim + "'>" + res[i].nama + "</option>"
                }
                $('#nama_peminjam').html(option);
            }
        });

        $.ajax({
            url: '<?php echo API_URL ?>buku/bukucontroller.php',
            data: {
                mod: 'get'
            },
            dataType: 'json',
            type: 'POST',
            success: function(res) {
                let option = "<option value='0'>--Select Buku--</option>";
                for (let i = 0; i < res.length; i++) {
                    option += "<option value='" + res[i].id + "'>" + res[i].judul + "</option>"
                }
                $('#cmb_buku').html(option);
            }
        });

        var rowItem = [];

        $.fn.showItem = function() {
            let html = "";
            for (let i = 0; i < rowItem.length; i++) {
                let no = i + 1;
                html += '<tr>';
                html += '<td scope="row">' + no + '</td>';
                html += '<td>' + rowItem[i].judul + '</td>';
                html += '<td>' + rowItem[i].pengarang + '</td>';
                html += '<td>' + rowItem[i].jml + '</td>';
                html += '<td><button type="button" data-id="' + i + '" onclick="$(this).deleteItem()" class="btn btn-danger">Delete</button></td>';
                html += '</tr>';

            }
            $('#DataItem').html(html);
        }

        $.fn.deleteItem = function() {
            let id = $(this).data('id');
            let newItem = [];

            for (let i = 0; i < rowItem.length; i++) {
                if (i != id)
                    newItem.push(rowItem[i])
            }
            rowItem = newItem;
            $(this).showItem();
        }

        $.fn.clearForm = function() {
            $('#nama_peminjam').val('');
            $('#tglPinjam').val('');
            $('#tglKembali').val('');
            rowItem = [];
            $(this).showItem();
        }

        $('#btn_add').click(function() {
            let idbuku = $('#cmb_buku').val();
            let jml = $('#txt_jumlah').val();
            $.ajax({
                url: '<?php echo API_URL ?>buku/bukucontroller.php',
                data: {
                    mod: 'getById',
                    id: idbuku
                },
                dataType: 'json',
                type: 'POST',
                success: function(res) {
                    var item = res[0];
                    item['jml'] = jml;

                    rowItem.push(item);

                    $(this).showItem();

                    $('#txt_jumlah').val('')
                    $('#cmb_buku').val(0);
                }
            });
        });

        $('#proses_pinjam').click(function() {
            let data = {
                mod: 'add',
                peminjam: $('#nama_peminjam').val(),
                tglpinjam: $('#tglPinjam').val(),
                tglkembali: $('#tglKembali').val(),
                detail: rowItem
            }

            $.ajax({
                url: '<?php echo API_URL ?>peminjaman/peminjamanController.php',
                data: data,
                dataType: 'json',
                type: 'POST',
                beforeSend: function() {
                    $('#proses_pinjam').html("<i class='fa fa-spinner fa-spin'></i> Loading...");
                },
                success: function(res) {
                    $('#proses_pinjam').html('Proses Pinjam');
                    let title = (res.status == true) ? "Success" : "Error";
                    let icon = (res.status == true) ? "success" : "error";
                    $(this).clearForm();

                    Swal.fire({
                        title: title,
                        text: res.messages,
                        icon: icon,
                        confirmButtonText: 'Ok'
                    });


                }
            });
        });

    });
</script>