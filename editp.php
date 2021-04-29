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
            <?php 
 
             require_once("conexao/config.php");
             
             if (isset($_GET['id']) && !empty($_GET['id'])){
             $id = $_GET['id'];
                 
             $sql = "SELECT email, nome,foto,codigo,idade,codigo,endereco,defeito,descricao,telefone,rg,data_adicionado,OrdemServico.cpf,Cliente.cpf,ativo,data_abertura,valor,Cliente.id, OrdemServico.id As pid FROM OrdemServico INNER JOIN Cliente ON OrdemServico.cpf = Cliente.cpf where OrdemServico.id = {$id} ";
             $result = $conn->query($sql);
             if ($result) {
             
            while($rows = $result->fetch_assoc()){
                $pid= $rows['pid'];
          ?>
<form action="conexao/updatep.php" method="post" id="FormUp" name="FormUp">
			<div class="row">
					<div class="col-xl-4 col-lg-4 col-md-4 col-sm-12 mb-30">
						<div class="pd-20 card-box height-100-p">
							<div class="profile-photo">
							    
								<a href="modal" data-toggle="modal" data-target="#modal" class="edit-avatar"><i class="fa fa-pencil"></i></a>
							   
                                <?php if($rows['foto'] == ""){echo '<img id="image" src="vendors/images/user-default.png" class="avatar-photo" style="height:160px;width:250px;">';} ?>

							</div>
							<h5 class="text-center h5 mb-0"><?php echo $rows['nome']; ?></h5>
					<p class="text-center text-muted font-14">Código da os<br><b><?php echo $rows['codigo']; ?></b></p>
							<div class="profile-info">
							<h5 class="mb-20 h5 text-blue"></h5>
								<ul>
									<li>
										<span>Email :</span>
										<?php echo $rows['email']; ?>
									</li>
									<li>
										<span>Telefone:</span>
										<?php echo $rows['telefone']; ?>
									</li>
									
									<li>
										<span>Endereço:</span>
										<?php echo $rows['endereco']; ?>
									</li>
								</ul>
							</div>
						
						</div>
					</div>
					<div class="col-xl-8 col-lg-8 col-md-8 col-sm-12 mb-30">
						<div class="card-box height-100-p overflow-hidden">
							<div class="profile-tab height-100-p">
								<div class="tab height-100-p">
                                  
								<div class="tab-content">										
                                    <div class="tab-pane fade height-100-p active show" id="setting" role="tabpanel">
											<div class="profile-setting">
							
													<ul class="profile-edit-list row">
														<li class="weight-500 col-md-6">
                                                        <h4 class="text-blue h5 mb-20"><font style="vertical-align: inherit;"><font style="vertical-align: inherit;">Edite as configurações</font></font></h4>
															<div class="form-group">
																<label>Nome</label>
                                                                <input class="form-control form-control-lg" type="text" name="nome" id="nome"  value="<?php echo $rows['nome']; ?>" disabled />
                                                                <input type="hidden" name="id" value="<?php echo $rows['id']?> ">
                                                            </div>
															<div class="form-group">
																<label>Telefone</label>
																<input class="form-control form-control-lg" type="text" name="telefone" id="telefone" value="<?php echo $rows['telefone']; ?>"  disabled />
															</div>
															<div class="form-group">
																<label>Defeito</label>
                                                                <input class="form-control form-control-lg" type="text" name="defeito" id="defeito" value="<?php echo utf8_encode($rows['defeito']); ?>"  />

															</div>
														
															
															<div class="form-group mb-0">
																<input type="submit" class="btn btn-primary" value="Salvar e Atualizar" id="BtnUp">
                                                            </div>
														</li>
														<li class="weight-500 col-md-6">
															<h4 class="text-blue h5 mb-20" style="color:#fff;">.</h4>
															<div class="form-group">
																<label>Endereço</label>
																<input class="form-control form-control-lg" type="text" name="endereco" id="endereco"  value="<?php echo $rows['endereco']; ?>" disabled />
															</div>
															<div class="form-group">
																<label>Valor:</label>
                                                                <input class="form-control form-control-lg" type="text" name="valor" id="valor"  value="<?php echo $rows['valor']; ?>" />															</div>

                                                            <div class="form-group">
																<label>Descrição</label>
															   <input class="form-control form-control-lg" type="text" name="descricao" id="descricao"  value="<?php echo $rows['descricao']; ?>"  />															</div>
															</div>
															
															
															
														</li>
														
													</ul>
													
										
											</div>
										</div>
									</div>
								</div>
							</div>
                        </form> 
                            
						</div>

                         <?php
                               }
                               
                              
                                        
                               }else{ 
                                echo ' <script>window.location.href = "error.php"</script>';
                                }if($pid != $id){
                                         echo ' <script>window.location.href = "error.php"</script>';
                                }
                                
                                
                              }else{
                                    echo ' <script>window.location.href = "error.php"</script>';
                                       
                                        }
                                        
                                  
                               
                                           
                             
                            ?> 
                      
				</div>		
	<div class="footer-wrap pd-20 mb-20 card-box">
				Prova Prática By <<a href="mailto:fabiorenatocosta1979@yahoo.com" style="text-decoration: none;
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


<script>

$('#FormUp').submit(function() {
    var form = $(this);
    $.post(form.attr('action'), form.serialize(), function(retorno) {
        swal("Dados atualizados com sucesso!", {
                icon: "success",
                timer:2000,
                buttons:false,
                   });
                   setTimeout(function () { location.reload(1); }, 2000);

    });
    return false;
});
</script>

</body>
</html>