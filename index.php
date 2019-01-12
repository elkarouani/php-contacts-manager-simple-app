<?php 
	require_once('contactsController.php');

	$contacts = allContacts();
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
		            		<a class="nav-link" href="new.php">New Contact</a>
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
	      	<br>

	      	<footer>
		      	<!-- Pagination -->
		      	<ul class="pagination justify-content-center">
		        	<li class="page-item">
		          		<a class="page-link" href="#" aria-label="Previous">
		            		<span aria-hidden="true">&laquo;</span>
		            		<span class="sr-only">Previous</span>
		          		</a>
		        	</li>
		        	<li class="page-item">
		          		<a class="page-link" href="#">1</a>
		        	</li>
		        	<li class="page-item">
		          		<a class="page-link" href="#">2</a>
		        	</li>
		        	<li class="page-item">
		          		<a class="page-link" href="#">3</a>
		        	</li>
		        	<li class="page-item">
		          		<a class="page-link" href="#" aria-label="Next">
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