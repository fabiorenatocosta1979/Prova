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
			    
               <div class="pd-20 card-box mb-30">
					<div class="clearfix">
						<div class="pull-left">
						<div class="h5 mb-0">Clientes Cadastro</div>
						</div>
						<div class="pull-right">
						</div>
					
					</div>
						<hr>
					<form method="post" action="" id="FormCad" name="FormCad">
					
						<div class="row">
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Nome</font></font></label>
									<input type="text" class="form-control" id="nome" name="nome">
								</div>
							</div>
							<div class="col-md-6 col-sm-12">
								<div class="form-group">
									<label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">E-mail</font></font></label>
									<input type="text" class="form-control" id="email" name="email">
								</div>
							</div>
						</div>
						<div class="row">
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Telefone</font></font></label>
									<input type="text" class="form-control" id="telefone" name="telefone">
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Idade</font></font></label>
									<input type="text" class="form-control" id="idade" name="idade">
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">RG</font></font></label>
									<input type="text" class="form-control" id="rg" name="rg">
								</div>
							</div>
							<div class="col-md-3 col-sm-12">
								<div class="form-group">
									<label><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">CPF</font></font></label>
									<input type="text" class="form-control" id="cpf" name="cpf">
								</div>
							</div>
						</div>
						
						<div class="form-group">
							<label>Endereço</label>
							<textarea class="form-control" style="height:130px;" id="endereco" name="endereco"></textarea>
						</div>
						
						<div class="modal-footer" style="border:0px;">
						    <button type="submit" class="btn btn-success"><i class="fa fa-save"></i>&nbsp;Salvar</button>
                        <button type="button" class="btn btn-danger" data-dismiss="modal">Cancelar</button>
                        
                    </div>
						
						</div>
					</div>
				</form>
					

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



    <script type = "text/javascript" >
  jQuery(document).ready(function() {
    jQuery('#FormCad').submit(function() {
      var dados = jQuery(this).serialize();
        event.preventDefault();
      jQuery.ajax({
        type: "POST",
        url: "conexao/insertc.php",
        data: dados,
        success: function() {
           
           swal("Cliente cadastrado com sucesso!", {
                icon: "success",
                timer:2000,
                buttons:false,
                }).then(function() {
                 window.location = "clientes.php";
         });
            }
      });

      return false;
    });
  }); 
  </script>


</body>
</html>