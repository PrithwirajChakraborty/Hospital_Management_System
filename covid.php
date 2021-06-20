<?php 
require_once "importance.php"; 

if(!User::loggedIn()){
	Config::redir("login.php"); 
}
?> 

<html>
<head>
	<title>CORONA Virus - <?php echo CONFIG::SYSTEM_NAME; ?></title>
	<?php require_once "inc/head.inc.php";  ?> 
</head>
<body>
	<?php require_once "inc/header.inc.php"; ?> 
	<div class='container-fluid'>
		<div class='row'>
			<div class='col-md-2'><?php require_once "inc/sidebar.inc.php"; ?></div> <!-- this should be a sidebar --> 
			<div class='col-md-7'>
				<div class='content-area'> 
				<div class='content-header'> 
					COVID19 <small>Human Immune Deficiency Virus</small>
				</div>
				<div class='content-body'> 
					<?php Messages::info("Coronaviruses are a large family of viruses that cause illness ranging from the common cold to more severe diseases"); ?> 
					<div class='form-holder'> 
						<?php 
						
								if(isset($_POST['name']) ){
									$name = $_POST['name']; 
									$age = $_POST['age']; 
									$location = $_POST['location'];
									$mod = $_POST['m-o-c']; 
									$comments = $_POST['d-comment']; 
									
									if($name == "" || $age == "" || $location == "" || $mod == ""){
										Messages::error("You most fill in all the fields");
									} else {
										covid::add($name, $age, $location, $mod, $comments);
									}
								}
							
							
							Db::formSpecial(
								array("Name", "Age", "Location",  "mode of Contraction"), 
								3, 
								array("name", "age", "location", "m-o-c"),
								array("text", "text", "text", 'text'),  
								array("Doctor's Comment"), 
								array('d-comment'),  
								"", 
								"", 
								"",  
								"Add Data"
							);
						?> 
					</div> 
				</div><!-- end of the content area --> 
				</div> 
				
			</div><!-- col-md-7 --> 

			<div class='col-md-3'>
				<!-- <img src='images/doc-background-one.png' class='img-responsive' />  -->
			</div> <!-- this should be a sidebar -->
				
		</div> 
	</div> 
</body>
</html>
