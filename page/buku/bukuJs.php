<script>
    $(document).ready(function() {
        let mode = 'get';

        $.fn.getData = function() {
            $.ajax({
                url: '<?php echo API_URL ?>buku/bukucontroller.php',
                type: 'POST',
                data: {
                    mod: mode
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#example-table').loading('toggle');
                },
                success: function(res) {
                    $('#example-table').loading('toggle');
                    let row = "";
                    let nomor = 1;
                    for (let i = 0; i < res.length; i++) {
                        let buku = JSON.stringify(res[i]);

                        row += "<tr data-buku='" + buku + "' >";
                        row += "<td>" + nomor + "</td>";
                        row += "<td> <img src='api/buku/" + res[i].gambar + "' width='50'></td>";
                        row += "<td>" + res[i].judul + "</td>";
                        row += "<td>" + res[i].pengarang + "</td>";
                        row += "<td><button class='btn btn-danger' data-buku='" + buku + "' onclick='$(this).deleteRow()' >Delete</button></td>";
                        row += "</tr>";

                        nomor++
                    }

                    $('#row_data').html(row);
                }
            });
        }

        $.fn.deleteRow = function() {
            mode = 'delete';
            let data = $(this).data('buku');

            $.ajax({
                url: '<?php echo API_URL ?>buku/bukucontroller.php',
                type: 'POST',
                data: {
                    mod: mode,
                    id: data.id
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#example-table').loading('toggle');
                },
                success: function(res) {
                    $('#example-table').loading('toggle');
                    //$(this).getData();
                    Swal.fire({
                        title: 'Succsess',
                        text: res.messages,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                }
            })
        }

        $.fn.save = function() {
            var form = $('#buku_form')[0];
            $('#mode').val('add');

            $.ajax({
                url: '<?php echo API_URL ?>buku/bukucontroller.php',
                type: 'POST',
                enctype: 'multipart/form-data',
                data: new FormData(form),
                contentType: false,
                cache: false,
                processData: false,
                beforeSend: function() {
                    $('#example-table').loading('toggle');
                },
                success: function(res) {
                    $('#example-table').loading('toggle');
                    $('#exampleModal').modal('toggle')
                    Swal.fire({
                        title: 'Succsess',
                        text: res.messages,
                        icon: 'success',
                        confirmButtonText: 'Ok'
                    });
                }
            })
        }


        $(this).getData();

        $('#btn_reload').click(function() {
            $(this).getData();
        });

        $('#btn_add').click(function() {
            $('#exampleModal').modal('toggle')
        });

        $('#buku_form').on('submit', function(e) {
            e.preventDefault();
            $(this).save();
        })
    });
</script>