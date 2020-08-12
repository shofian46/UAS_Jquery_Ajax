<script>
    $(document).ready(function() {
        let modeAction = 'get';

        $.fn.deleteRow = function() {
            modeAction = 'delete';
            let data = $(this).data('biodata');
            let _this = $(this).parents("tr");
            $.ajax({
                url: '<?php echo API_URL ?>member/proses.php',
                dataType: 'json',
                type: 'POST',
                data: {
                    id: data.id,
                    mode: modeAction
                },
                success: function(res) {

                }
            });
            _this.fadeOut(400, function() {
                _this.remove();
            });
        }

        $.fn.lihatDetail = function() {
            let data = $(this).data('biodata');
            $('#tid').val(data.id);
            $('#tnim').val(data.nim);
            $('#tnama').val(data.nama);
            $('#talamat').val(data.alamat);
            $('#ttelpon').val(data.telpon);

            $(".table tr").removeClass("selected");
            $(this).addClass("selected");

            $('#exampleModal').modal('toggle')
        }

        $.fn.loadData = function() {
            $.ajax({
                url: '<?php echo API_URL ?>member/proses.php',
                dataType: 'json',
                data: {
                    mode: modeAction
                },
                type: 'POST',
                beforeSend: function() {
                    //$('#pesan').html('Loding data....');

                },
                success: function(res) {
                    //$('#pesan').html('');
                    let row = "";
                    let nomor = 1;

                    //console.log("res info ",res)
                    for (let i = 0; i < res.length; i++) {
                        let biodata = JSON.stringify(res[i]);

                        row += "<tr data-biodata='" + biodata + "' ondblclick='$(this).lihatDetail()' >";
                        row += "<td>" + nomor + "</td>";
                        row += "<td>" + res[i].nim + "</td>";
                        row += "<td>" + res[i].nama + "</td>";
                        row += "<td><button class='btn btn-danger' data-biodata='" + biodata + "' onclick='$(this).deleteRow()' >Delete</button></td>";
                        row += "</tr>";

                        nomor++
                    }

                    $('#dispayData').html(row)
                }
            });
        }

        $.fn.saveData = function() {
            let parameter = {
                id: $('#tid').val(),
                nim: $('#tnim').val(),
                nama: $('#tnama').val(),
                telpon: $('#ttelpon').val(),
                alamat: $('#talamat').val(),
                mode: modeAction
            }

            $.ajax({
                url: '<?php echo API_URL ?>member/proses.php',
                data: parameter,
                type: 'POST',
                dataType: 'json',
                beforeSend: function() {

                },
                success: function(res) {
                    $('#exampleModal').modal('toggle')

                    Swal.fire({
                        title: 'Succsess',
                        text: res.messages,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });

                    modeAction = 'get';
                    $(this).loadData();
                }
            });
        }

        $.fn.ClearForm = function() {
            $('#tid').val('')
            $('#tnim').val('')
            $('#tnama').val('')
            $('#ttelpon').val('')
            $('#talamat').val('')
        }

        $(this).loadData();
        $('#loadData, #btn_reload').click(function() {
            modeAction = 'get';
            $(this).loadData();
        });

        $('#btnProses').click(function() {
            let id = $('#tid').val();

            if (id != '')
                modeAction = 'update';
            else
                modeAction = 'add';

            $(this).saveData();
        });

        $('#btn_add_new').click(function() {
            $(this).ClearForm();
            $('#exampleModal').modal('toggle')
        });

        $('#removeData').click(function() {
            modeAction = 'delete';
            $('#dispayData').html('');
        });

        $('#btnCancel').click(function() {
            $(".table tr").removeClass("selected");
            $(":input").val('');
        });

    });
</script>