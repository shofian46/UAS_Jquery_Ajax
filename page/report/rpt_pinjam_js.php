<script>
$(document).ready(function() {
    var doc = new jsPDF('l', 'mm', "a3");
    var specialElementHandlers = {
        '#editor': function (element, renderer) {
            return true;
        }
    };

    $('#generate_pdf').click(function () {
        doc.fromHTML($('#content').html(), 15, 15, {
            'width': 170,
                'elementHandlers': specialElementHandlers
        });
        doc.save('sample-file.pdf');
    });

    $('#proses').click(function(){
        $.ajax({
            url:"<?php echo API_URL ?>peminjaman/peminjamanController.php",
            type:"POST",
            dataType:'json',
            data:{
                'mod':'get',
                'filter_date_start':$('#tgl_pinjam_awal').val(),
                'filter_date_end':$('#tgl_pinjam_akhir').val(),
                'data':[
                    {
                        'tes':'tes'
                    }
                ]
            },
            success:function(res){
                let html_row='';
                
                for(let i =0; i<res.data.length; i++){
                    html_row +='<tr>';
                        html_row +='<td>'+res.data[i].idpinjam+'</td>';
                        html_row +='<td>'+res.data[i].nim+'</td>';
                        html_row +='<td>'+res.data[i].nama+'</td>';
                        html_row +='<td>'+res.data[i].tglPinjam+'</td>';
                        html_row +='<td>'+res.data[i].tglKembali+'</td>';
                    html_row +='</tr>';
                }
                $('#row_data').html(html_row);
            }
        });
        
    });

    $('.date').datepicker({
        dateFormat:"yy-mm-dd",
    });

});
</script>
