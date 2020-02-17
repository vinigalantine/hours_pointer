<?php require('includes/header.php') ?>
</head>
<body id="page-top">
	<div id="wrapper">
		<?php require('includes/navbar.php') ?>
		<div id="content-wrapper" class="d-flex flex-column">
			<div id="content">
				<div class="container-fluid">
					<div class="row">
						<h3>Olá <?php echo $this->session->userdata('user')->name;?></h3>
					</div>
					<?php if($this->session->userdata('user')->type_id == 2){ ?>
						<div class="row">
							<h3>Administrador</h3>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<button class="btn btn-info form-control"type="button" onclick="pointTime()">
									<i class="fas fa-user"></i>
									Adicionar Usuário
								</button>
							</div>					
						</div>
					<?php } else { ?>
						<div class="row">
							<h3>Estagiário</h3>
						</div>
						<div class="row">
							<div class="col-lg-6 col-md-6 col-sm-12">
								<button class="btn btn-info form-control" type="button" onclick="pointTime()">
									<i class="fas fa-hourglass"></i>
									Marcar
								</button>
							</div>
							<div class="col-lg-6 col-md-6 col-sm-12">
								<button class="btn btn-secondary form-control" type="button" onclick="pointTime()">
									<i class="fas fa-hourglass"></i>
									Solicitar inclusão de ponto
								</button>
							</div>							
						</div>
					<?php } ?>
					<br>
					<div class="row">
						<ul class="nav nav-tabs" role="tablist" style="width: 100%;">
							<li class="nav-item">
								<a class="nav-link active" id="hours-tab" data-toggle="tab" href="#hours" role="tab" aria-controls="hours" aria-selected="true">Horas</a>
							</li>
							<?php if($this->session->userdata('user')->type_id == 2){ ?>
								<li class="nav-item">
									<a class="nav-link" id="solicitations-tab" data-toggle="tab" href="#solicitations" role="tab" aria-controls="solicitations" aria-selected="false">Solicitações</a>
								</li>
							<?php } ?>
						</ul>
						<div class="tab-content" id="tab_content" style="width: 100%;">
							<div class="tab-pane fade show active" id="hours" role="tabpanel" aria-labelledby="hours-tab">
								<div class="custom-table table-responsive">
									<table class="table table-dark table-bordered table-striped">
										<thead>
											<tr>
												<th>Hora</th>
												<th>Dia</th>
												<th>Tipo</th>
											</tr>
										</thead>
										<tbody id="table_body"></tbody>
										<tfoot></tfoot>
									</table>
								</div>				
							</div>
							<?php if($this->session->userdata('user')->type_id == 2){ ?>
								<div class="tab-pane fade" id="solicitations" role="tabpanel" aria-labelledby="profile-tab">
									<h4>Area destinada a listagem de solicitações de hora...</h4>
									<!-- Exemplo -->
									<div class="custom-table table-responsive">
										<table class="table table-dark table-bordered table-striped">
											<thead>
												<tr>
													<th>Hora</th>
													<th>Dia</th>
													<th>Tipo</th>
													<th>Ações</th>
												</tr>
											</thead>
											<tbody id="table_body">
												<tr>
													<td>23:40</td>
													<td>16/02/2020</td>
													<td>Entrada</td>
													<td>
														<button type="button" class="btn btn-success" title="Aceitar"><i class="fas fa-check"></i></button>
														<button type="button" class="btn btn-danger" title="Rejeitar"><i class="fas fa-times"></i></button>
													</td>
												</tr>
											</tbody>
											<tfoot></tfoot>
										</table>
									</div>	
								</div>
							<?php } ?>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<!-- Modals -->

	<?php if($this->session->userdata('user')->type_id == 2){ ?>
	<?php } ?>
</body>
<footer>
	<?php require('includes/footer.php') ?>
	<script src="<?php echo base_url('assets/custom/home.js') ?>"></script>
</footer>
</html>