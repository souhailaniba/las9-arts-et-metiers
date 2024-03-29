<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
<!--Bootstrap Link-->
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
	<!--Bootstrap icons  Link-->
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.3.0/font/bootstrap-icons.css">
	<!-- FA -->
	<link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css" integrity="sha384-AYmEC3Yw5cVb3ZcuHtOA93w35dYTsvhLPVnYs9eStHfGJvOvKxVfELGroGkvsg+p" crossorigin="anonymous"/>
	<!--CUSTOM CSS-->
	<link rel="stylesheet" href="css/style4.css">
<script type="text/javascript" src="js/script.js"></script>
	<title>Dashboard</title>
</head>
<body>
	<!--<nav class="navbar navbar-light  navbar-expand-lg shadow  p-2 mb-2 bg-light  fixed-top">
		<div class="container-fluid">
					
					<a href="index.html" class=" navbar-brand"><img src="img/logo.png" height="70px" alt="LAS9"></a>
					<button class="navbar-toggler"  data-bs-toggle="collapse" data-bs-target="#navmenu">
						<div class="navbar-toggler-icon" ></div>
					</button>
					<div class="collapse navbar-collapse" id="navmenu">
						<ul class="navbar-nav mx-auto ">
							<li class="nav-padding   nav-item"><a href="index.html" class="nav-link ">Home</a></li>
							<li class="nav-padding   nav-item"><a href="resumes.html" class="nav-link ">Mes fichiers</a></li>
							<li class="nav-padding  nav-item"><a href="recherche.html" class="nav-link">Les LAS9s</a></li>
							
							<li class="nav-padding  nav-item"><a href="profile.html" class="nav-link">Mon profile</a></li>
							<li class="nav-padding active nav-item"><a href="editprofile.html" class="active nav-link">Edit Profile</a></li>

							<li class="nav-padding  nav-item d-none"id="toshowbutton" ><a  class="nav-link  text-nowrap "  href="#">Deconnexion </a></li>

						
						</ul>
						<a id="tobehiddenbutton"class=" nav-link text-nowrap " href="#">Deconnexion  </a>
					</div>		
		</div>
	</nav>
	-->
	<:!--ADDD NAVBAR WITH  PHP -->
	<!--Section 1-->
	<section class="padding container" id="section-1">
        <?php
        include('database.php'); #connexion avec la base de données
        #$id=$_GET(); KHASS NCHOUF ID MEN REDIRECTION LI AY3TI LIEN LI QBEL
        $id=3;
        $sql=mysqli_query($con,"SELECT * FROM users WHERE sid='$id'");
        $result=mysqli_fetch_array($sql);
        ?>

		<div class="  vh-sm-200 vh-md-100 row">
		<div class=" padding col-md-6 col-sm-12">
		<h2>General Information</h2>
		 <form method="post">
		 			<label for="exampleFormControlInput1" class="form-label">Photo</label>
	  				<input name="nphoto" type="file" class="form-control"  placeholder="Ex:Salah-pic.png" >
		        	<label for="exampleFormControlInput1" class="form-label">First Name</label>
  					<input name="nfname" ype="text" class="form-control"  placeholder="Ex:Salah" value="<?php echo $result['fname']; ?>">
  					<label for="exampleFormControlInput1" class="form-label">Last Name</label>
  					<input name="nlname" type="text" class="form-control" placeholder="Ex:Aniba" value="<?php echo $result['lname']; ?>">
  					<label for="exampleFormControlInput1" class="form-label">Email address</label>
  					<input name="nuser" type="email" class="form-control" placeholder="name@example.com" value="<?php echo $result['user']; ?>">
					<label for="exampleFormControlInput1" class="form-label">Major</label>
					<select name="nmajor" class="form-select" value="<?php echo $result['major']; ?>">
						<option value="IAGI">IAGI</option>
						<option value="MSEI">MSEI</option>
						<option value="GEM">GEM</option>
						<option value="GM">GM</option>
						<option value="GI">GI</option>
						<option value="API1">API1</option>
						<option value="API2">API2</option>
					</select>
	  				<label for="exampleFormControlInput1" class="form-label">Interests</label>
	  				<input name="ninterests" class="form-control" type="text" placeholder="PHP,HTML,Mecanique" value="<?php echo $result['interests']; ?>">
			 	     				
  					<button name="updatebtn" type="submit" class="btn btn-primary">Update</button>
		        </form>
            <?php
            include('database.php');
            if(isset($_POST['updatebtn']))
            {
                $sid=$_GET['id'];
                $nphoto=$_POST['nphoto'];
                $nfname=$_POST['nfname'];
                $nlname=$_POST['nlname'];
                $nuser=$_POST['user'];
                $nmajor=$_POST['nmajor'];
                $ninterests=$_POST['ninterests'];

                $sql=mysqli_query($con,"UPDATE `users` SET `fname`='$nfname',`lname`='$nlname',`user`='$nuser',`major`='$nmajor',`interests`='$ninterests',`photo`='$nphoto' WHERE sid='$sid' ");
                if($sql == true)
                {
                    echo '
                            <script>
                            alert("Informations successfully updated!");
                            window.location="- index.php";
                            </script>
                            ';
                }
                else
                {
                    echo '
                            <script>
                            alert("Something is wrong in the update!");
                            </script>
                            ';
                }
            }
            ?>
		</div>
		<div class=" padding col-md-6 col-sm-12">

		<h2>Change Password</h2>
			<form method="post">
		        	
  					<label for="exampleFormControlInput1" class="form-label">Old Password</label>
  					<input name="opassword" class="form-control" type="password" placeholder="Old Password">
  					<label for="exampleFormControlInput1" class="form-label">New Password</label>
  					<input name="npassword" class="form-control" type="password" placeholder="New Password">
  					<label for="exampleFormControlInput1" class="form-label">Repeat Password</label>
  					<input name="npassword2" class="form-control" type="password" placeholder="Repeat Password">
  					<button name="pupdatebtn" type="submit" class="btn btn-primary">Update</button>
		 	     
		        </form>
            <?php
            include('database.php');
            if(isset($_POST['pupdatebtn']) and $_POST['npassword']==$_POST['npassword2'])
            {
                $sid=$_GET['id'];
                $npassword=$_POST['npassword'];

                $sql2=mysqli_query($con,"UPDATE `users` SET `password`='$npassword' WHERE sid='$sid' ");
                if($sql2 == true)
                {
                    echo '
                            <script>
                            alert("Password successfully updated!");
                            window.location="- index.php";
                            </script>
                            ';
                }
                else
                {
                    echo '
                            <script>
                            alert("Something is wrong in the update!");
                            </script>
                            ';
                }
            }
            ?>
		</div>
		</div>
		  
		</section>


	<!-- footer -->
	<footer class="padding" id="aboutus">
		<div class="container ">
			<img src="img/logo.png" height="140px" alt="LAS9">
			<p class="intro"> LAS9 arts and crafts is a space that is keen on passing down informations and experience through the generations of the students of ENSAM Casablanca by providing the best LAS9 and support for our future engineers. </p>
			<div class="row pt-2">
				<div class="col-md-4 col-sm-6">
					
					<h3 class="text-center">Contact:</h3>


					 if you have any questions feel free to contact us using:
					<p class="text-center phone-number">+212587856841</p>
					Or Social Media:

					<ul class=" mt-2 d-flex align-items-center justify-content-center footer-list">
					    <li> <a href="https://facebook.com/"><i class="fab fa-facebook-f icon "></i></a></li>
				        <li><a href="https://instagram.com/"><i class="fab fa-instagram icon "></i></a></li>
					    <li> <a href="https://whatsapp.com/"><i class="fab fa-whatsapp icon "></i></a></li>
				    </ul>

				</div>
				<div class="col-md-4 col-sm-6">
					
					<h3 class="text-center">Services:</h3>
					<ul class="footer-list text-center">
						<li class="m-2"><a href="offreprof.html">Teacher service</a></li>
						<li class="m-2"><a href="offreetudient.html">Student service</a></li>
					</ul>
				</div>
				<div class="col-md-4 col-sm-12">
					<iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13299.072142994411!2d-7.5661469!3d33.5594027!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x569d5bec37f7f81a!2sENSAM%20CASABLANCA!5e0!3m2!1sfr!2sma!4v1637187425813!5m2!1sfr!2sma"  allowfullscreen="" loading="lazy"></iframe>
				</div>
			</div>
	
			
			<hr>
			<div class="text-center row d-flex align-items-center">
				<div class="col-7">ENSAMTUTO 2021</div>
				<div class="col-5">
					<ul class="d-flex align-items-center footer-list">
					    <li> <a href="https://facebook.com/"><i class="fab fa-facebook-f icon "></i></a></li>
				        <li><a href="https://instagram.com/"><i class="fab fa-instagram icon "></i></a></li>
					    <li> <a href="https://whatsapp.com/"><i class="fab fa-whatsapp icon "></i></a></li>
				    </ul>
				</div>
				
			</div>
		</div>
	</footer>
	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
	
</body>
</html>