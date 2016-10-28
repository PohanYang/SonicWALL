<!DOCTYPE html>
<html>
<head>
	<meta charset = "utf-8">
	<title>SonicWALL Database Analysis</title>
	<link href="dist/css/bootstrap.min.css" rel="stylesheet">
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
<?
$hostname_db = "localhost";
$database_db = "sonicwall";
$username_db = "root";
$password_db = "123";
$db = mysql_connect($hostname_db, $username_db, $password_db);
if(!$db){
	die('Could not connect: ' . mysql_error());
}
mysql_query("set names 'utf8'");
mysql_select_db($database_db);
?>
<div class="col-md-12">
	<div class="col-md-4"></div>
	<div class="col-md-4"></div>
	<div class="col-md-4"><img src="img/nctumark.png" height="60px;"><img src="img/dell_sonicwall_logo.png" height="100px;"></div>
</div>
<div class="col-md-12">
	<div class="col-md-1"></div>
	<div class="col-md-5">
		<h1>SonicWALL Database Analysis</h1>
	</div>
	<div class="col-md-6"></div>
</div>
<div class="col-md-12"><hr/></div>
<div class="col-md-12">
	<div class="col-md-1"></div>
	<div class="col-md-9">
	<div class="container">
		<ul class="nav nav-tabs">
			<li class="active"><a data-toggle="tab" href="#intro">Introduction</a><li/>
			<li><a data-toggle="tab" href="#database">Database</a></li>
			<li><a data-toggle="tab" href="#analysis">Analysis</a></li>
		</ul>
		<div class="tab-content">
			<div id="intro" class="tab-pane fade in active">
				<div class="col-md-12">
					<h1>About SonicWALL</h1>
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<center>
							<img src="img/all.png" width="50%"><br>
							About project Flow
						</center>
						<br><br>
						In this project, First I have two topic:<br>
						blablabla
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
			<div id="database" class="tab-pane fade">
				<div class="col-md-12">
					<h1>Database</h1>
					<div class="col-md-1"></div>
					<div class="col-md-10">
						<table class="table table-striped">
							<tr class="success">
								<td>Application Name</td>
								<td>Application Category</td>
								<td>Protocol</td>
								<td>Source Prot</td>
								<td>Destination Port</td>
								<td>Insert Time</td>
							</tr>
							<tr>
								<?php
								$list = mysql_query("select * from package");
								while($listrow = mysql_fetch_array($list, MYSQL_ASSOC)){
								?>
								<td><?php echo $listrow['appname'] ?></td>
								<td><?php echo $listrow['appcat'] ?></td>
								<td><?php echo $listrow['protocol'] ?></td>
								<td><?php echo $listrow['src'] ?></td>
								<td><?php echo $listrow['dis'] ?></td>
								<td><?php echo $listrow['timestamp'] ?></td>
								<?php } ?>
							</tr>
						</table>
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
			<div id="analysis" class="tab-pane fade">
				<div class="col-md-12">
					<h1>Analysis</h1>
					<div class="col-md-1"></div>
					<div class="col-md-10">
						To be continue.....
					</div>
					<div class="col-md-1"></div>
				</div>
			</div>
		</div>
	</div>
	</div>
	<div class="col-md-2"></div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<script src="js/bootstrap.min.js"></script>
</body>
</html>
