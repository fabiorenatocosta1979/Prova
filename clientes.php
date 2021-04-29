<?php include_once 'header.php'; ?>
<?php include_once 'conexao/config.php'; ?>

<style>
    
    .btn-group, .btn-group-vertical {
    position: relative;
    display: -ms-inline-flexbox;
    display: -webkit-inline-box;
    display: inline-flex;
    vertical-align: middle;
    top: 38px;
}

.btn-group > .btn-group:not(:last-child) > .btn, .btn-group > .btn:not(:last-child):not(.dropdown-toggle) {
    border-top-right-radius: 0;
    border-bottom-right-radius: 0;
    border-radius: 0px;
    border: 2px solid #FFF;
}

.btn-group > .btn-group:not(:first-child) > .btn, .btn-group > .btn:not(:first-child) {
    border-top-left-radius: 0;
    border-bottom-left-radius: 0;
    border-radius: 0px;
    border: 2px solid #FFF;
}
.dataTables_info{display:none;}
</style>
	<div class="main-container">
		<div class="xs-pd-20-10 pd-ltr-20">

		<!--	<div class="title pb-20">
				<h2 class="h3 mb-0">Hospital Overview</h2>
			</div>	-->		

			<div class="row pb-10">
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
							    <?php 
								 $resultado = $conn->query("SELECT * FROM OrdemServico WHERE ativo ='1' ");
								 $numero = $resultado->num_rows;
								?>
								<div class="weight-700 font-24 text-dark"><?php echo $numero; ?></div>
								<div class="font-14 text-secondary weight-500">Ordens Finalizadas</div>
							
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#00eccf"><i class="icon-copy dw dw-calendar-6"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
							     <?php 
								 $resultado = $conn->query("SELECT * FROM Cliente ");
								 $numero = $resultado->num_rows;
								?>
								<div class="weight-700 font-24 text-dark"><?php echo $numero; ?></div>
								<div class="font-14 text-secondary weight-500">Clientes</div>
							</div>
							<div class="widget-icon">
								<div class="icon" ><span class="icon-copy dw dw-crown"></span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
							    <?php 
								 $resultado = $conn->query("SELECT * FROM OrdemServico WHERE ativo ='0' ");
								 $numero = $resultado->num_rows;
								?>
								<div class="weight-700 font-24 text-dark"><?php echo $numero; ?></div>
								<div class="font-14 text-secondary weight-500">Ordens Abertas</div>
							</div>
							<div class="widget-icon" data-color="#ff5b5b" style="color: rgb(255, 91, 91);">
								<div class="icon"><i class="icon-copy dw dw-wall-clock" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
				<div class="col-xl-3 col-lg-3 col-md-6 mb-20">
					<div class="card-box height-100-p widget-style3">
						<div class="d-flex flex-wrap">
							<div class="widget-data">
							    <?php 
							
								$sql = "SELECT * FROM OrdemServico WHERE ativo = '1' ";
								 $resultado = $conn->query($sql);
								 if($resultado->num_rows > 0){
									 while($row = $resultado->fetch_assoc()){

								?>
								<div class="weight-700 font-24 text-dark"><?php echo "R$ ".number_format($row['valor'],2,',','.'); ?></div>
								<div class="font-14 text-secondary weight-500"><?php echo date('d/m/Y', strtotime('today')); ?></div>
								<?php } }else{ ?>
								
									<div class="weight-700 font-24 text-dark"><?php echo "R$ 0"; ?></div>
								<div class="font-14 text-secondary weight-500"><?php echo date('d/m/Y', strtotime('today')); ?></div>
								<?php } ?>
							</div>
							<div class="widget-icon">
								<div class="icon" data-color="#09cc06"><i class="icon-copy dw dw-money-2" aria-hidden="true"></i></div>
							</div>
						</div>
					</div>
				</div>
			</div>

			<div class="card-box pb-10">
			    	<div class="h5 pd-20 mb-0"><h2 class="h3 mb-0">
			    <div class="d-flex justify-content-between pb-10">
							<div class="h5 mb-0">Clientes</div>
						<a href="cadastroc.php" class="btn btn-outline-info">
						    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cadastrar</font></font></a>
						</div>
			</h2> </div>	
              		  
                 <table id="example123" class="table table-hover" cellspacing="0" width="100%">
					<thead>
						<tr>
							<th class="table-plus">Nome</th>							
							<th  class="datatable-nosort">Documento</th>
							<th  class="datatable-nosort">E-mail</th>
							<th>Cadastrado</th>
							<th  class="datatable-nosort">Telefone</th>
							<th class="datatable-nosort"></th>
						</tr>
					</thead>
				 
                    <tbody>
                         <?php  

                    include_once "conexao/config.php";
                    
                    $sql = "SELECT * FROM Cliente";
                    $resultado = $conn->query($sql);  
                    if ($resultado->num_rows > 0) {                    
                    while($row = $resultado->fetch_assoc()) 
                    {                   
                  ?>	
						<tr>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
									<div class="avatar mr-2 flex-shrink-0">
										<?php if($row['foto']== ""){echo '<img src="vendors/images/user-default.png" class="border-radius-100 shadow" width="40" height="40" alt="">';}else{
										echo '<img src="vendors/images/'.$row['foto'].'" class="border-radius-100 shadow" width="40" height="40" alt="">';} ?>
									</div>
									<div class="txt">
										<div class="weight-600"><?php echo $row['nome']; ?></div>
									</div>
								</div>
							</td>
							<td><?php echo substr($row['cpf'],0,3)."******".substr($row['cpf'],-2) ?></td>
							<td><?php echo $row['email']; ?></td>                            
							<td><?php echo date('d/m/Y', strtotime($row['data_adicionado'])); ?></td>
                            <td><?php echo $row['telefone']; ?></td>							
							<td>
								<div class="table-actions">
									<a href="editc.php?id=<?php echo $row['id']; ?>" data-color="#265ed7" data-toggle="tooltip" title="Editar"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="conexao/removec.php?id=<?php echo $row['id']; ?>" data-color="#e95959" id="BtnDel" name="BtnDel" data-id="<?php echo $row['id']; ?>" data-cliente="<?php echo $row['nome']; ?>" data-toggle="tooltip" title="Deletar"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>
						<?php } } ?>
					</tbody>
                 
				</table> 
			</div>			

			<div class="footer-wrap pd-20 mb-20 card-box" style="margin-top:3%;">
			Prova Prática By <a href="mailto:fabiorenatocosta1979@yahoo.com" style="text-decoration: none;
    color: #17a2b8;">Fábio Costa</a>
			</div>
		</div>
	</div>
	
	
	<!-- js -->
	<script src="vendors/scripts/core.js"></script>
	<script src="vendors/scripts/script.min.js"></script>
	<script src="vendors/scripts/process.js"></script>
	<script src="vendors/scripts/layout-settings.js"></script>
	<script src="src/plugins/apexcharts/apexcharts.min.js"></script>
	<script src="src/plugins/datatables/js/jquery.dataTables.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/dataTables.responsive.min.js"></script>
	<script src="src/plugins/datatables/js/responsive.bootstrap4.min.js"></script>
	<script src="vendors/scripts/dashboard3.js"></script>

	
	
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    

	<!-- buttons for Export datatable -->
	<script src="src/plugins/datatables/js/dataTables.buttons.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.bootstrap4.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.print.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.html5.min.js"></script>
	<script src="src/plugins/datatables/js/buttons.flash.min.js"></script>
	<script src="src/plugins/datatables/js/pdfmake.min.js"></script>
	<script src="src/plugins/datatables/js/vfs_fonts.js"></script>
	<!-- Datatable Setting js -->

 <script>
    $(document).ready(function() {
   	$('.table').DataTable({
   	    
		scrollCollapse: true,
		autoWidth: false,
		responsive: true,
		columnDefs: [{
			targets: "datatable-nosort",
			orderable: false,
		}],
		"lengthMenu": [[10, 25, 50, -1], [10, 25, 50, "All"]],
		"language": {
			"info": "_START_-_END_ of _TOTAL_ entries",
			searchPlaceholder: "Digite o cpf",
			search           :"Pesquisar",
		
			paginate: {
				next: '<i class="ion-chevron-right"></i>',
				previous: '<i class="ion-chevron-left"></i>'  
			}
		},
		dom: 'Bfrtip',
     buttons: [
           , {
            extend: 'pdf',
            text: 'Exportar',
            exportOptions: {
                // Exporta "Agente", "Ramal" e "Almoço"
                columns: [0, 1, 2,3] 
            }
        },
        , {
            extend: 'print',
            text: 'Imprimir',
            exportOptions: {
                // Exporta "Agente", "Ramal" e "Almoço"
                columns: [0, 1, 2,3] 
            }
        },
         {
            
            extend: 'excel',
            text: 'MS Excel',
            exportOptions: {
                // Exporta "Agente", "Ramal" e "Almoço"
                columns: [0, 1, 2,3] 
            }
        }
        ],
	});
  });
  
    
         

  
    </script>
 <script>
    $(document).ready(function() {
    $('#example123 tfoot th').each(function() {
        var title = $(this).text();
        $(this).html('<input type="text" placeholder="Search ' + title + '" />');
    });
 
    var table = $('#example').DataTable({
        searchPanes: {
            viewTotal: true
        },
        dom: 'Plfrtip'
    });
 
     table.columns().every( function() {
        var that = this;
  
        $('input', this.footer()).on('keyup change', function() {
            if (that.search() !== this.value) {
                that
                    .search(this.value)
                    .draw();
            }
        });
    });
});
</script>

    <script type="text/javascript">
    $(document).ready(function(){
     $(document).on("click","#BtnDel",function(){
        
        
            var  id        = $(this).data("id");
            var  cliente   = $(this).data("cliente");   
                
            event.preventDefault();
            swal({
            title: "Confirmação",
            text: "Excluir cliente "+cliente+ " do sistema?",
            icon: false,
            buttons: ['Não','Sim'],
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                    $(this).closest('tr').fadeOut(300);
            $.post('conexao/removec.php?id='+id, function(){
                
            //setTimeout(function () { location.reload(1); }, 1000);
            swal("Deletado com sucesso", {
                icon: "success",
                timer:1000,
                buttons:false,
                });
                });
            } else {
                
                swal({
                    title:false,
                    text:"Sabia decisão você teve jovem padawan!",
                    timer:3000,
                    buttons:false
                    
            });
            }
            });

    });
    });
</script>


</body>
</html>