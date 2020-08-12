<script>
$(document).ready(function() {
    var tbl_pengembalian = $('#tbl_pengembalian').DataTable( {
        "processing": true,
        "serverSide": true,
        "ajax":{
            data:{'mod':'get'},
            type:"POST",            
            url:"<?php echo API_URL ?>pengembalian/pengembaliancontroller.php",
        },
        columns: [
            { data: 'id_pengembalian' },
            { data: 'id_pinjam' },
            { data: 'nim' },
            { data: 'tgl_kembali' },
            { data: 'tgl_realisasi' },
            { data: 'denda' },
            { 
                data: 'denda',
                render:function(denda,type,row){
                    
                    if(denda > 0)
                        if(row.pelunasan>0)
                            return `<span class="badge badge-info">Sudah Bayar</span>`
                        else
                            return `<span class="badge badge-secondary">harus bayar</span>`
                    else
                        return `<span class="badge badge-success">Free</span>`
                }
            },
            { 
                data: 'denda',
                render:function(denda,type,row){
                    
                    if(denda > 0)
                        return `<button type="button" class="btn-bayar btn btn-success btn-sm ">Bayar</button>`
                    else
                        return ``
                }
            },
            {   
                data: 'denda',
                render:function(denda,type,row){
                    if(row.pelunasan >= denda){
                        return 'LUNAS';
                    }else
                        return 'BELUM LUNAS';
                }
            },
            // { data: null, 
            //     "className":'row-item',
            //     defaultContent: '<button type="button" class="btn-bayar btn btn-success btn-sm ">Bayar</button>' 
            // },
                
        ]
    });

    $("#reload_data").click(function(){
        tbl_pengembalian.ajax.reload();
    });
	

    $('#tbl_pengembalian tbody').on('click', 'button', function () {
        let isBtnBayar = $(this).hasClass("btn-bayar");
        var data = tbl_pengembalian.row( $(this).parents('tr') ).data();

        if(isBtnBayar){
            $('#denda_balance').val(data.denda);
            $('#item_id').val(data.id_pengembalian)
            $('#modal_bayar').modal('toggle');
        }

    });

    $('#btn_prosesbayar').click(function(){
        $.ajax({
            url:"<?php echo API_URL ?>pengembalian/pengembaliancontroller.php",
            type:'POST',
            data:{
                mod:'poroses_bayar',
                id_pengembalian:$('#item_id').val(),
                pelunasan:$('#denda').val()
            },
            success:function(){
                $('#modal_bayar').modal('toggle');
                tbl_pengembalian.ajax.reload();
            }
        });
    });

	});
</script>