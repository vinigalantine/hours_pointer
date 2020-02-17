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
					<?php } else { ?>
						<div class="row">
							<h3>Estagiário</h3>
						</div>
						<div>
							<button onclick="">Marcar</button>
						</div>
					<?php } ?>
				</div>
			</div>
		</div>
	</div>
</body>
<footer>
	<?php require('includes/footer.php') ?>
	<script src="<?php echo base_url('assets/custom/home.js') ?>"></script>
</footer>
</html>