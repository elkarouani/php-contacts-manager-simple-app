<?php 
	require_once('contactsController.php');

	$paginate = 1;
	
	$contacts = allContacts();
	$size = sizeof($contacts);
	$opt1 = intdiv($size,3)+1;
	$opt2 = $size / 3;
	
	$pages = (is_float($opt2))? $opt1 : $opt2;


	if (isset($_GET['p'])) {
		$paginate = (((integer)$_GET['p'] == 0) || ((integer)$_GET['p'] > $pages))? 1 : (integer)$_GET['p'];
	}

	$index = (($paginate) + ($paginate - 3));

	$array = $contacts;
	$contacts = [];

	$contacts[0] = $array[$index + $paginate];
	if(isset($array[$index + $paginate + 1])){$contacts[1] = $array[$index + $paginate + 1];}
	if(isset($array[$index + $paginate + 2])){$contacts[2] = $array[$index + $paginate + 2];}
?>
<!DOCTYPE html>
<html>
	<head>
		<link rel="stylesheet" type="text/css" href="assets/css/style.css">
		<link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">
        <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">
		<title>Contacts Manager</title>
	</head>
	<body>
		<header>
			<nav class="navbar navbar-expand navbar-dark bg-dark">
		      	<a class="navbar-brand" href="#">Contacts Manager</a>
		      	<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExample02" aria-controls="navbarsExample02" aria-expanded="false" aria-label="Toggle navigation">
		        	<span class="navbar-toggler-icon"></span>
		      	</button>

		      	<div class="collapse navbar-collapse" id="navbarsExample02">
		        	<ul class="navbar-nav mr-auto">
		          		<li class="nav-item active">
		            		<a class="nav-link" href="index.php">Home 
		            			<span class="sr-only">(current)</span>
		            		</a>
		          		</li>
		          		<li class="nav-item">
		            		<a class="nav-link" href="new.php" data-toggle="modal" data-target="#CreateContact">New Contact</a>

		            		<div class="modal fade" id="CreateContact" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog modal-dialog-centered" role="document">
								   	<div class="modal-content">
								      	<div class="modal-header">
								        	<h5 class="modal-title" id="exampleModalLabel">New Contact :</h5>
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          		<span aria-hidden="true">&times;</span>
								        	</button>
								      	</div>
								      	<div class="modal-body text-center">
								        	<form action="contactsController.php" method="POST">
									   			<table class="d-flex justify-content-center">
													<tr>
														<td><label>Nom : </label></td>
														<td class="form-group"><input class='form-control' name="nom" type="text"></td>
													</tr>
													<tr>
														<td><label>Prenom : </label></td>
														<td class="form-group"><input class='form-control' name="prenom" type="text"></td>
													</tr>
													<tr>
														<td><label>Portable : </label></td>
														<td class="form-group"><input class='form-control' name="portable" type="text"></td>
													</tr>	
													<tr>
														<td><label>Fax : </label></td>
														<td class="form-group"><input class='form-control' name="fax" type="text"></td>
													</tr>
									                <tr>
														<td><label>Ville : </label></td>
														<td class="form-group"><input class='form-control' name="ville" type="text"></td>
													</tr>			
												</table>
												<br>
												<input class='btn btn-primary' type="submit" name="add" value="Ajouter">
											</form>
								      	</div>
								    </div>
								</div>
							</div>
		          		</li>
		        	</ul>
		        	<form class="form-inline my-2 my-md-0">
		          		<input class="form-control" type="text" placeholder="Search By Name">
		        	</form>
		      	</div>
		    </nav>
		</header>


		<!-- Page Content -->
	    <div class="container">
	      <!-- Page Heading -->
	      	<h1 class="my-4 text-center">Welcome To Contacts Manager</h1>

	      	<div class="row">
	      		<?php foreach ($contacts as $contact): ?>
	        	<div class="col-lg-4 col-sm-6 portfolio-item Card">
	        		<form>
	        			<div class="card h-100 text-center">
		            		<a href="#"><img class="user" src="assets/img/user.png" alt="user"></a>
		            		<div class="card-body">
		              			<h4 class="card-title">
		                			<a href="#"><?= $contact['nom'] ?> <?= $contact['prenom'] ?></a>
		              			</h4>
		              			<ul class="list-group">
		              				<li class="list-group-item">
		              					Portable : <strong><?= $contact['portable'] ?></strong>
		              				</li>
		              				<li class="list-group-item">
		              					Fax : <strong><?= $contact['fax'] ?></strong>
		              				</li>
		              				<li class="list-group-item">
		              					Ville : <strong><?= $contact['ville'] ?></strong>
		              				</li>
		              			</ul>
		            		</div>
		            		<div class="card-footer actions">
		            			<h4>Actions</h4>
		            			<button class="btn btn-warning" type="button" name="edit" data-toggle="modal" data-target="#EditModal<?= $contact['id'] ?>">
		            				<i class="fa fa-edit"></i>
		            			</button>
		            			<button class="btn btn-danger" type="button" name="delete" data-toggle="modal" data-target="#DeleteModal<?= $contact['id'] ?>">
		            				<i class="fa fa-trash"></i>
		            			</button>
		            		</div>

		            		<!-- Edit Modal -->
							<div class="modal fade" id="EditModal<?= $contact['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								   	<div class="modal-content">
								      	<div class="modal-header">
								        	<h5 class="modal-title" id="exampleModalLabel">Edit Contact : <strong>User</strong> </h5>
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          		<span aria-hidden="true">&times;</span>
								        	</button>
								      	</div>
								      	<div class="modal-body">
								        	<?= $contact['id'] ?>
								      	</div>
								      	<div class="modal-footer">
								        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        	<button type="button" class="btn btn-primary">Save changes</button>
								      	</div>
								    </div>
								</div>
							</div>

							<!-- Delete Modal -->
							<div class="modal fade" id="DeleteModal<?= $contact['id'] ?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
								<div class="modal-dialog" role="document">
								    <div class="modal-content">
								      	<div class="modal-header">
								        	<h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
								        	<button type="button" class="close" data-dismiss="modal" aria-label="Close">
								          		<span aria-hidden="true">&times;</span>
								        	</button>
								      	</div>
								      	<div class="modal-body">
								        	...
								      	</div>
								      	<div class="modal-footer">
								        	<button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
								        	<button type="button" class="btn btn-primary">Save changes</button>
								      	</div>
								    </div>
								</div>
							</div>
		          		</div>
	        		</form>
	        	</div>
	        	<?php endforeach ?>
	    	</div>
	      	<!-- /.row -->
	      	<br><br><br>

	      	<footer class="page-footer font-small blue pt-4">
		      	<!-- Pagination -->
		      	<ul class="pagination justify-content-center">
		        	<li class="page-item">
		          		<a class="page-link" href="index.php?p=<?= $paginate - 1 ?>" aria-label="Previous">
		            		<span aria-hidden="true">&laquo;</span>
		            		<span class="sr-only">Previous</span>
		          		</a>
		        	</li>
		        	<?php foreach (range(1, $pages) as $value): ?>
			        	<li class="page-item">
			          		<a class="page-link" href="index.php?p=<?= $value ?>"><?= $value ?></a>
			        	</li>
		        	<?php endforeach ?>
		        	<li class="page-item">
		          		<a class="page-link" href="index.php?p=<?= $paginate + 1 ?>" aria-label="Next">
		            		<span aria-hidden="true">&raquo;</span>
		            		<span class="sr-only">Next</span>
		          		</a>
		        	</li>
		      	</ul>
	      	</footer>
	    </div>
	    <!-- /.container -->

        <script type="text/javascript" src="assets/js/jquery.js"></script>
        <script type="text/javascript" src="assets/js/popper.js"></script>
        <script type="text/javascript" src="assets/js/app.js"></script>
		<script type="text/javascript" src="assets/js/bootstrap.min.js"></script>
	</body>
</html>