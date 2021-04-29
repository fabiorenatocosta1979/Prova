<?php include_once 'header.php'; ?>
<?php include_once 'conexao/config.php'; ?>
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
							<div class="h5 mb-0">Ordem de Serviço</div>
						<a href="cadastrop.php" class="btn btn-outline-info">
						    <font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Cadastrar</font></font></a>
						</div>
			</h2> </div>			  
                <table class="data-table table nowrap">
					<thead>
						<tr>
						    <th>Código</th>
							<th class="table-plus">Cliente</th>						
							<th>Telefone</th>
							<th>Gerada</th>
							<th>Status</th>
                            <th>Valor</th>
							<th class="datatable-nosort">Ações</th>
						</tr>
					</thead>
                    <?php

                    require_once("conexao/config.php");

                    $sql = "SELECT email, nome,foto,idade,codigo,telefone,rg,data_adicionado,descricao, defeito,OrdemServico.cpf,Cliente.cpf,ativo,data_abertura,valor,Cliente.id, OrdemServico.id FROM OrdemServico INNER JOIN Cliente ON OrdemServico.cpf = Cliente.cpf ";
                    $result = $conn->query($sql);

                   
                    while($row = $result->fetch_assoc()) {
                        setlocale(LC_TIME, 'pt_BR', 'pt_BR.utf-8', 'pt_BR.utf-8', 'portuguese');
                    date_default_timezone_set('America/Sao_Paulo');
                    $data =  strftime('%A, %d de %B de %Y', strtotime($row['data_abertura']));
                    $data = ucfirst($data); 
                    $data = ucfirst(strtolower($data));
                    
                    ?>

                    <tbody>
						<tr>
						    	<td style="font-weight: 900;"><?php echo $row['codigo']; ?></td>
							<td class="table-plus">
								<div class="name-avatar d-flex align-items-center">
								
									<div class="txt">
											<div class="weight-600"><?php echo $row['nome']; ?></div>
									</div>
								</div>
							</td>
                            
                            <td><?php echo utf8_encode($row['telefone']); ?></td>
                            <td><?php echo utf8_encode($data); ?></td>
                            
                            <td><?php if($row['ativo'] == "0"){ echo '<span class="badge badge-pill badge-success">Fechada</span>';}else{ echo '<span class="badge badge-pill badge-danger">Aberta</span>';} ?></td>
                            <td><?php echo "R$ ". number_format($row['valor'],2,",","."); ?></td>
                            
							<td>
								<div class="table-actions">
									<a href="editp.php?id=<?php echo $row['id']; ?>" data-color="#265ed7" data-toggle="tooltip" title="Editar"><i class="icon-copy dw dw-edit2"></i></a>
									<a href="conexao/removep.php?id=<?php echo $row['id']; ?>" data-color="#e95959" id="BtnDel" data-id="<?php echo $row['id']; ?>" data-codigo="<?php echo $row['codigo']; ?>"><i class="icon-copy dw dw-delete-3"></i></a>
								</div>
							</td>
						</tr>						
					</tbody>
                 <?php }  ?>
				</table> 
			</div>			

			<div class="footer-wrap pd-20 mb-20 card-box" style="margin-top:3%;">
				Grupo PLL - Prova Prática By <<a href="mailto:fabiorenatocosta1979@yahoo.com" style="text-decoration: none;
    color: #17a2b8;">Fábio Costa</a>>
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
	<script src="src/plugins/fullcalendar/fullcalendar.min.js"></script>
	<script src="vendors/scripts/calendar-setting.js"></script>
	
	
	 <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>



    <script type="text/javascript">
    $(document).ready(function(){
     $(document).on("click","#BtnDel",function(){
        
        
            var  id        = $(this).data("id");
            var  codigo    = $(this).data("codigo");   
                
            event.preventDefault();
            swal({
            title: "Confirmação",
            text: "Excluir ordem de serviço número "+codigo+ " do sistema?",
            icon: false,
            buttons: ['Não','Sim'],
            dangerMode: true,
            })
            .then((willDelete) => {
            if (willDelete) {
                    $(this).closest('tr').fadeOut(300);
            $.post('conexao/removep.php?id='+id, function(){
                
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