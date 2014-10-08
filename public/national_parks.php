<?php

require 'dbconnection.php';

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$stmt = $dbc->query("SELECT name, location, date_established, area_in_acres, description FROM national_parks LIMIT 10 OFFSET $offset");

$parks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $dbc->query("SELECT count(*) FROM national_parks");

$total = $stmt2->fetchColumn();


if (!empty($_POST)) {

	$newPark = [
		$_POST['name'],
		$_POST['location'],
		$_POST['date_established'],
		$_POST['area_in_acres'],
		$_POST['description']
	];

    $national_parks[] = $newPark;
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>National Parks</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap-theme.min.css">

	<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.2.0/js/bootstrap.min.js"></script>

  </head>
  <body>
  	<style type="text/css">
  	.jumbotron {
		padding: 30px;
		margin-bottom: 30px;
		color: inherit;
		background-color: #99FFCC;
		}
	.nav-pills>li.active>a:hover, 
	.nav-pills>li.active>a:focus {
		color: #fff;
		background-color: #eee;
		}
	.nav-pills>li.active>a, 
	.nav-pills>li.active>a:focus {
		color: #fff;
		background-color: #99FFCC;
		}
	.nav>li>a:hover, 
	.nav>li>a:focus {
		color: white;
		text-decoration: none;
		background-color: #99FFCC;
		}

  	</style>

    <div class="container">

      <div class="header">
        <ul class="nav nav-pills pull-right">
          <li class="active"><a href="#">Home</a></li>
          <li><a href="#">About</a></li>
        </ul>
        <h3 class="text-muted">State National Parks</h3>
      </div>

      <div class="jumbotron">
		<h1>National Parks</h1>
	        <table class="table table-hover">
				<tr>
					<th>Name</th>
					<th>Location</th>
					<th>Date Established</th>
					<th>Acres</th>
					<th>Park Description</th>
				</tr>
				<?php foreach ($parks as $key => $parkInfo): ?>
					<tr> 
					<?php foreach ($parkInfo as $value): ?>
						<td>
						<?=$value?>
						</td>
					<?php endforeach ?>
					</tr>
				<?php endforeach ?>
			</table>
      </div>

      <div class="footer">

		<ul class="pager">
			<?php if ($offset != 0): ?>
				  <li class="previous"><a href='?offset=<?= $offset-10; ?>'>&larr; Older</a></li>
			<?php endif; ?>
			<?php if ($offset + 10 < $total): ?>
				  <li class="next"><a href='?offset=<?= $offset+10; ?>'>Newer &rarr;</a></li>
			<?php endif; ?>
		</ul>


        <form class="form-inline" role="form" method"POST">
         <h3>New Park</h3>
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputName2">Park Name</label>
		    <input type="text" class="form-control" id="exampleInputName2" placeholder="Park Name">
		  </div>
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputLocation2">Park Location</label>
		    <input type="text" class="form-control" id="exampleInputLocation2" placeholder="Park Location">
		  </div>
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputDate2">Date Established</label>
		    <input type="date" class="form-control" id="exampleInputDate2" placeholder="Date Established">
		  </div>
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputAcres2">Park Acres</label>
		    <input type="text" class="form-control" id="exampleInputAcres2" placeholder="Park Acres">
		  </div>
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputDescription2">Park Description</label>
		    <input type="text" class="form-control" id="exampleInputDescription2" placeholder="Park Description">
		  </div>

		 <button type="submit" class="btn btn-default">Submit</button>
	    </form>
			
			<br>
			<br>
        <p>&copy; State National Parks 2014</p>
      </div>


    </div>


    <!-- IE10 viewport hack for Surface/desktop Windows 8 bug -->
    <script src="../../assets/js/ie10-viewport-bug-workaround.js"></script>
    <!-- jQuery (necessary for Bootstrap's JavaScript plugins) -->
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
    <!-- Include all compiled plugins (below), or include individual files as needed -->
    <script src="js/bootstrap.min.js"></script>
  </body>
</html>