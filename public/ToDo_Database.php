<?php

require 'dbconnection.php';

require_once('../inc/filestore.php');

$file = new Filestore(FILENAME);

$items = $file->read();

$offset = isset($_GET['offset']) ? intval($_GET['offset']) : 0;

$stmt = $dbc->query("SELECT tasks, task_date FROM todo_items LIMIT 2 OFFSET $offset");

$tasks = $stmt->fetchAll(PDO::FETCH_ASSOC);

$stmt2 = $dbc->query("SELECT count(*) FROM todo_items");

$total = $stmt2->fetchColumn();


if (!empty($_POST)) {

	$newTask = [
		$_POST['tasks'],
		$_POST['task_date']
	];

    $todo_items[] = $newTask;
}

if (isset($_POST['new_item'])) {
    try {
        if(strlen($_POST['new_item']) == 0){
            throw new Exception('You didn\'t add any items!');
        } elseif(strlen($_POST['new_item']) > 240){
            throw new Exception('Your item cant be longer then 240 characters!');
        }
        $items[] = $_POST['new_item'];
        $file->write($items);

    } catch (Exception $e) {
        $getMessage = $e->getMessage();
    }

    
} 

if (isset($_GET['remove'])) {
    unset($items[$_GET['remove']]);
    $file->write($items);
    $items = array_values($items);
}

if (isset($_FILES['upload']) && $_FILES['upload']['error'] == UPLOAD_ERR_OK) {

    $upload = $_FILES['upload'];

    $uploadPath = '/vagrant/sites/planner.dev/public/uploads/';
    $uploadBasename = basename($upload['name']);

    $newFilename = $uploadPath . $uploadBasename;

    move_uploaded_file($upload['tmp_name'], $newFilename);
    
    $newItems = $file->read($newFilename);
    $items = array_merge($newItems, $items);
   $file->write($items);
}


?>

<!DOCTYPE html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
   
    <title>Items To Complete</title>

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
        <h3 class="text-muted">Items to be Completed</h3>
      </div>

      <div class="jumbotron">
		<h1>Todo List</h1>
	        <table class="table table-hover">
				<tr>
					<th>tasks</th>
					<th>task_date</th>
				</tr>
				<?php foreach ($tasks as $key => $tasksTODO): ?>
					<tr> 
					<?php foreach ($tasksTODO as $value): ?>
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
		    <label class="sr-only" for="exampleInputtasks2">Tasks</label>
		    <input type="text" class="form-control" id="exampleInputtasks2" placeholder="New Task">
		  </div>
		  <div class="form-group">
		    <label class="sr-only" for="exampleInputDate2">Date Task entered</label>
		    <input type="date" class="form-control" id="exampleInputDate2" placeholder="Date Established">
		  </div>
		 <button type="submit" class="btn btn-default">Submit</button>
	    </form>
			
			<br>
			<br>
        <p>&copy; Todo Items 2014</p>
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