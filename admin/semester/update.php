<?php
	include ("..\..\class\connect.php");
	include("../../class/alert.php");
	include ("..\..\class\cls_semester.php");
	
	$retval=1;
	$errMsg="";
	if(isset($_GET['uid']))
    $updateid = $_GET['uid'];
    if(isset($_GET['uid'])){
        $edit="SELECT * from tbl_semester where ID=$updateid";
        $updateQuery=mysqli_query($con,$edit);
        $row=mysqli_fetch_array($updateQuery);
    }
    if(isset($_POST['pname'])){
		if (empty($_POST["pname"])) {
			$errMsg="Field cannot be empty!";
		}
		else {
        $editname = $_POST['pname'];
		$editid= $updateid;
		$deptobj= new Semester();
		$retval=$deptobj->updateSemester($editid,$editname);
		if($retval==1)
		{			
			
			header("Location: index.php");
		}
		}
	}
?>

<!DOCTYPE html>
<html lang="en">
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge" />
	<title>Elearning</title>
	<meta content='width=device-width, initial-scale=1.0, shrink-to-fit=no' name='viewport' />
	<link rel="icon" href="../../img/icon.ico" type="image/x-icon"/>

	<!-- Fonts and icons -->
	<script src="../../js/plugin/webfont/webfont.min.js"></script>
	<script>
		WebFont.load({
			google: {"families":["Lato:300,400,700,900"]},
			custom: {"families":["Flaticon", "Font Awesome 5 Solid", "Font Awesome 5 Regular", "Font Awesome 5 Brands", "simple-line-icons"], urls: ['../css/fonts.min.css']},
			active: function() {
				sessionStorage.fonts = true;
			}
		});
	</script>

	<!-- CSS Files -->
	<link rel="stylesheet" href="../../css/bootstrap.min.css">
	<link rel="stylesheet" href="../../css/atlantis.min.css">

	<!-- CSS Just for demo purpose, don't include it in your project -->
	<link rel="stylesheet" href="../../css/demo.css">
</head>
<body>
	<div class="wrapper">
	<div class="main-header">
			<!-- Logo Header -->
			<div class="logo-header bg-light" >
				
				<a href="https://www.scmsgroup.org/" class="logo">
					<img width="190"  src="../../img/scms.png" alt="navbar brand" class="navbar-brand">
				</a>
				<button class="navbar-toggler sidenav-toggler ml-auto" type="button" data-toggle="collapse" data-target="collapse" aria-expanded="false" aria-label="Toggle navigation">
					<span class="navbar-toggler-icon">
						<i  class="icon-menu"></i>
					</span>
				</button>
				<button class="topbar-toggler  more"><i  class="icon-options-vertical"></i></button>
				<div class="nav-toggle">
					<button class="btn btn-toggle toggle-sidebar">
						<i class="icon-menu"></i>
					</button>
				</div>
			</div>
	<?php
	include("../../include\menu.php");		
	?>
		<!-- End Sidebar -->



		<div  class="main-panel align-middle ">
			<div style="" class="bg-light content">

			
			

				<div class="col-md-12 ">
					<div class="card mt-4 bg-light">
						<div class="card-header">
							<div class="card-title">
								Semester 
							</div>
						</div>
						<div class="card-body">
							<div class="col-md-5 mr-auto ml-auto ">
								<div class="card mt-4  bg-light">
									<div class="card-body">
										<form action="" method="POST">
											<div class="form-group">
												<label for="exampleInputEmail1">Update Semester</label>
												<input type="text" name="pname" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Program" value="<?php echo $row['sName']; ?>">
												 <p style = "color: red;"><?php echo $errMsg; ?></p>   
											</div>
											<button name="submit" type="submit" class="btn btn-primary ml-3 float-right">Submit</button>
											<a href="index.php"><input type="button" value="Cancel" class="btn btn-danger float-right"></a>
										</form>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		 <footer class="footer bg-dark2">
                <div class="copyright ml-auto text-center">
                        Copyright  2021 &copy;<!--<i class="fa fa-heart heart text-danger"></i>--> Powered by <span  style= " font-weight: bolder;  color: rgb(255, 255, 255);" class="avatar-img  rounded-circle">Web Development Team SSTM</span>
                </div>				
			</footer> 


			<!--<footer  class=" bg-dark2 text-center text-lg-start">
				<!-- Copyright -->
				<!--<div class="text-center p-3" >
				  Â© 2020 Copyright:
				  <a class="text-light" href="">Web development team SSTM</a>
				</div>-->
				<!-- Copyright -->
			 <!-- </footer>-->

		</div>
		
		<!-- Custom template | don't include it in your project! -->
		<!-- End Custom template -->
	</div>
	<!--   Core JS Files   -->
	<script src="../../js/core/jquery.3.2.1.min.js"></script>
    <script src="../../js/core/popper.min.js"></script>
    <script src="../../js/core/bootstrap.min.js"></script>
    <!-- jQuery UI -->
    <script src="../../js/plugin/jquery-ui-1.12.1.custom/jquery-ui.min.js"></script>
    <script src="../../js/plugin/jquery-ui-touch-punch/jquery.ui.touch-punch.min.js"></script>
    <!-- Bootstrap Notify -->
    <script src="../../js/plugin/bootstrap-notify/bootstrap-notify.min.js"></script>

    <!-- jQuery Scrollbar -->
    <script src="../../js/plugin/jquery-scrollbar/jquery.scrollbar.min.js"></script>
    <!-- Atlantis JS -->
    <script src="../../js/atlantis.min.js"></script>
    <!-- Atlantis DEMO methods, don't include it in your project! -->
    <script src="../../js/setting-demo2.js"></script>

	<?php
    if($retval==2){
		custom_alert("Duplicate entry","The semester already exists","warning");
	}
	?>
</body>
</html>