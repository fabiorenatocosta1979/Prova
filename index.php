<?php include_once 'header.php'; ?>
<?php include_once 'conexao/config.php';

var_dump('oi');
?>
<style>
	.fc-day-grid-event .fc-content {
		white-space: nowrap;
		overflow: hidden;
		font-size: 10px;
		text-align: center;
	}

	.badge {
		padding: 0.6em;
	}

	textarea.form-control {
		height: 101px;
	}
</style>
<?php
$today = date("Y-m-d");
$result_events = "SELECT * FROM OrdemServico";
$resultado_events = mysqli_query($conn, $result_events);

?>

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
							<div class="icon"><span class="icon-copy dw dw-crown"></span></div>
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
							if ($resultado->num_rows > 0) {
								while ($row = $resultado->fetch_assoc()) {

							?>
									<div class="weight-700 font-24 text-dark"><?php echo "R$ " . number_format($row['valor'], 2, ',', '.'); ?></div>
									<div class="font-14 text-secondary weight-500"><?php echo date('d/m/Y', strtotime('today')); ?></div>
								<?php }
							} else { ?>

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


		<div class="row">
			<!--<div class="col-lg-4 col-md-6 col-sm-12 mb-30">
					<div class="card-box pd-30 pt-10 height-100-p">
						<h2 class="mb-30 h4">Últimas Entradas</h2>
						<div class="browser-visits">
							
						</div>
					</div>
				</div>-->
			<div class="col-lg-4 col-md-6 mb-20">
				<div class="card-box height-100-p pd-20 min-height-200px" style="height:auto;">
					<div class="d-flex justify-content-between pb-10">
						<div class="h5 mb-0">Últimas Entradas</div>
						<div class="dropdown">
							<a class="btn btn-link font-24 p-0 line-height-1 no-arrow dropdown-toggle" data-color="#1b3133" href="#" role="button" data-toggle="dropdown" style="color: rgb(27, 49, 51);">
								<i class="dw dw-more"></i>
							</a>
							<div class="dropdown-menu dropdown-menu-right dropdown-menu-icon-list">
								<a class="dropdown-item" href="#"><i class="dw dw-eye"></i> Todos</a>
								<a class="dropdown-item" href="#"><i class="dw dw-edit2"></i> Editar</a>
								<a class="dropdown-item" href="#"><i class="dw dw-delete-3"></i> Deletar</a>
							</div>
						</div>
					</div>
					<div class="user-list">
						<ul>
							<?php

							$sql = "SELECT email, nome,foto,idade,telefone,rg,data_adicionado,OrdemServico.cpf,Cliente.cpf,ativo,data_abertura,valor FROM OrdemServico INNER JOIN Cliente ON OrdemServico.cpf = Cliente.cpf  LIMIT 5 ";
							$resultado = $conn->query($sql);
							if ($resultado->num_rows > 0) {
								while ($row = $resultado->fetch_assoc()) {

							?>
									<li class="d-flex align-items-center justify-content-between">
										<div class="name-avatar d-flex align-items-center pr-2">
											<div class="avatar mr-2 flex-shrink-0">
												<?php if ($row['foto'] == "") {
													echo '<img src="vendors/images/user-default.png" class="border-radius-100 box-shadow" width="50" height="50" alt="">';
												} ?>
											</div>
											<div class="txt">
												<span class="badge badge-pill badge-sm" data-bgcolor="#e7ebf5" data-color="#265ed7" style="color: rgb(38, 94, 215); background-color: rgb(231, 235, 245);"><?php echo "R$ " . number_format($row['valor'], 2, ',', '.'); ?></span>
												<div class="font-14 weight-600"><?php echo $row['nome']; ?></div>
												<div class="font-12 weight-500"><?php echo $row['telefone']; ?></div>
											</div>
										</div>
										<div class="cta flex-shrink-0">
											<td><?php if ($row['ativo'] == "0") {
													echo '<span class="badge badge-pill badge-success">Fechada</span>';
												} else {
													echo '<span class="badge badge-pill badge-danger">Aberta</span>';
												} ?></td>

										</div>
									</li>
							<?php }
							}  ?>
						</ul>
					</div>
				</div>
			</div>

			<div class="col-lg-8 col-md-6 col-sm-12 mb-30">
				<div class="pd-20 card-box mb-30">
					<div class="calendar-wrap">
						<div id='calendar'></div>
					</div>
					<!-- calendar modal -->
					<div id="modal-view-event" class="modal modal-top fade calendar-modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<div class="modal-body">
									<h4 class="h4"><span class="event-icon weight-400 mr-3"></span><span class="event-title"></span></h4>
									<div class="event-body"></div>
								</div>
								<div class="modal-footer">
									<button type="button" class="btn btn-primary" data-dismiss="modal">Entendi</button>
								</div>
							</div>
						</div>
					</div>

					<!--	<div id="modal-view-event-add" class="modal modal-top fade calendar-modal">
						<div class="modal-dialog modal-dialog-centered">
							<div class="modal-content">
								<form id="add-event">
									<div class="modal-body">
										<h4 class="text-blue h4 mb-10">Nova Ordem de Serviço</h4>
										<div class="form-group">
											<label>Defeito</label>
											<input type="text" class="form-control" name="ename">
										</div>
									
										<div class="form-group">
											<label>Descrição</label>
											<textarea class="form-control" name="edesc" cols="3" rows="3"></textarea>
										</div>
										<div class="form-group">
											<label>Clientes</label>
											<select class="form-control" name="ecolor">
											     <?php

													$sql = "SELECT * FROM Cliente ";
													$resultado = $conn->query($sql);

													while ($row = $resultado->fetch_assoc()) {

													?>
												<option value="fc-bg-default"><?php echo $row['nome']; ?></option>
													<?php } ?>
											</select>
									
										</div>
										
									</div>
									<div class="modal-footer">
										<button type="submit" class="btn btn-primary" >Salvar</button>
										<button type="button" class="btn btn-primary" data-dismiss="modal">Cancelar</button>
									</div>
								</form>
							</div>
						</div>
					</div>-->
				</div>


			</div>
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



<script>
	jQuery(document).ready(function() {
		jQuery("#add-event").submit(function() {
			alert("Submitted");
			var values = {};
			$.each($('#add-event').serializeArray(), function(i, field) {
				values[field.name] = field.value;
			});
			console.log(
				values
			);
		});
	});

	(function() {

		jQuery(function() {
			// page is ready
			jQuery('#calendar').fullCalendar({
				themeSystem: 'bootstrap4',
				locale: 'pt-br',
				businessHours: false,
				defaultView: 'month',
				editable: true,
				defaultDate: Date(),
				navLinks: false,
				editable: false,
				eventLimit: false,
				displayEventEnd: true,
				timeFormat: 'H:mm',
				dateFormat: 'd/yyyy',
				agendaEventMinHeight: 'auto',
				displayEventTime: false,
				// header
				monthNames: ['Janeiro', 'Fevereiro', 'Março', 'Abril', 'Maio', 'Junho', 'Julho', 'Agosto', 'Setembro',
					'Outubro', 'Novembro', 'Dezembro'
				],
				monthNamesShort: ['Jan', 'Fev', 'Mar', 'Abr', 'Mai', 'Jun', 'Jul', 'Aug', 'Set', 'Out', 'Nov', 'Dez'],
				dayNames: ['Domingo', 'Segunda', 'Terça', 'Quarta', 'Quinta', 'Sexta', 'Sábado'],
				dayNamesShort: ['Dom', 'Seg', 'Ter', 'Qua', 'Qui', 'Sex', 'Sab'],

				buttonText: {
					today: 'Hoje',
					month: 'Mês',
					week: 'Semana',
					day: 'Dia'
				},
				header: {
					left: 'title',
					center: 'month,agendaWeek,agendaDay',
					right: 'Hoje, prev,next'
				},
				events: [
					<?php
					while ($row_events = mysqli_fetch_array($resultado_events))
					?> {

						id: '<?php echo $row_events['id']; ?>',

						title: '<?php echo $row_events['title']; ?>',

						start: '<?php echo $row_events['start']; ?>',
						end: '<?php echo $row_events['end']; ?>',
						color: '<?php echo $row_events['color']; ?>',
						description: '<?php echo $row_events['description']; ?>',
					},
					<?php

					?>
				],

				dayClick: function() {
					jQuery('#modal-view-event-add').modal();
				},
				eventClick: function(event, jsEvent, view) {
					jQuery('.event-icon').html("<i class='fa fa-calendar'></i>");
					jQuery('.event-title').html(event.title);
					jQuery('.event-body').html(event.description);
					//jQuery('.eventUrl').html('href',event.url);
					jQuery('#modal-view-event').modal();
				},
			})
		});

	})(jQuery);
</script>

</body>

</html>