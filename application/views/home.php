<!DOCTYPE html>
<html>
<head>
	<title></title>
	<?php include("css.php"); ?>
	<style>
		#modal
		{
			background-color: rgba(0,0,0,0.7);
			height: 100%;
			width: 100%;
			position: fixed;
			top: 0px;
			left: 0px;
			display: none;
		}
		#modal-form
		{
			background-color: white;
			width: 30%;
			height: auto;
			margin-left: 30%;
			margin-top: 100px;
			border-radius: 8px;
			padding: 10px;
			position: absolute;
		}
		#close-btn
		{
			background-color: red;
			color: white;
			width: 30px;
			height: 30px;
			position: absolute;
			top: -15px;
			right: -15px;
			text-align: center;
			border-radius: 8px;
			cursor: pointer;
		}
	</style>
</head>
<body>
<div class="container">
	<table class="table" id="alldata"></table>
</div>

<div id="modal">
	<div id="modal-form">
		<h2>Edit Form..</h2>
		<form id="editform">
			<div class="form-group">
				<label>Name : </label>
				<input type="text" name="name" id="name" class="form-control">
				<input type="hidden" name="id" id="id">
			</div>
			<div class="form-group">
				<label>Email : </label>
				<input type="text" name="email" id="email" class="form-control">
			</div>
			<div class="form-group">
				<label>Password : </label>
				<input type="text" name="password" id="password" class="form-control">
			</div>
			<div class="form-group">
				<label>Mobile : </label>
				<input type="text" name="mobile" id="mobile" class="form-control">
			</div>
			<input type="submit" value="Update" id="update" class="btn btn-success">
		</form>
	</div>
</div>
<script src="<?php echo base_url('assist/jquery.js'); ?>"></script>

</body>
</html>