<?php require('config_page.php') ?>

<html>
	<head>
		<title>Tes Combobox with ajax</title>
	</head>
	<body>
		<button id="load_data">Ambil Data</button>
		<select id="tes_cmb"></select>
		
		<table border= "1px">
			<tr><th>Nama</th></tr>
			<tbody id="list_table"></tbody>
		</table>
	</body>
	
	<script src="lib/jquery-3.4.1.min.js"></script>
	<script>
		$(document).ready(function(){
			$('#load_data').click(function(){
				
			
				$.ajax({
					url:'<?php echo API_URL ?>pengembalian/pengembaliancontroller.php',
					data:{mod:'get'},
					dataType:'json',
					type:'POST',
					beforeSend:function(){
						console.log('sedang mengambil data...')
					},
					success:function(res){
						console.log(res)
						/* let cmb_list='';
						let list_table ='';
						console.log(res.length)
						 for(let i =0; i<res.length; i++){
							cmb_list += "<option value='"+res[i].id+"'>"+res[i].nama+"</option>";
							list_table += "<tr><td>"+res[i].nama+"</td></tr>"
						} 
						$('#tes_cmb').html(cmb_list);
						$('#list_table').html(list_table); */
					}
				});
			
			});
		});
	</script>
</html>

