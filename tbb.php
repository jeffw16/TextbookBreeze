<?php
/**
 * TextbookBreeze
 * @textbookname Introduction to Lorem Ipsum
 * @licensedto Lorem ISD
*/
$settedPass = 'mot_de_passe';
$name = 'Introduction to Lorem Ipsum';
$numChapters = 50;

$chapter = $_REQUEST['c'];
$issue = $_REQUEST['i'];
$password = $_REQUEST['p'];
?>
<html>
	<head>
		<title>TextbookBreeze | <?php echo $name; ?></title>
		<style>
		body {
			font-family: Arial;
		}
		a:link {
			color: #0645AD;
		}
		a:visited {
			color: #0645AD;
		}
		</style>
		<link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/css/bootstrap.min.css" rel="stylesheet" integrity="sha256-7s5uDGW3AHqw6xtJmNNtr+OBRJUlgkNJEo78P4b0yRw= sha512-nNo+yCHEyn0smMxSswnf/OnX6/KwJuZTlNZBjauKhTK0c+zT+q5JOCx0UFhXQ6rJR9jg6Es8gPuD2uZcYDLqSw==" crossorigin="anonymous">
		<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js" integrity="sha256-KXn5puMvxCw+dAYznun+drMdG1IFl3agK0p/pqT9KAo= sha512-2e8qq0ETcfWRI4HJBzQiA3UoyFk6tbNyG+qSaIBZLyW9Xf3sWZHN/lxe9fTh1U45DpPf07yj94KsUHHWe4Yk1A==" crossorigin="anonymous"></script>
	</head>
	<body>
<?php
if ( isset ( $chapter ) && isset ( $issue ) && $password == $settedPass ) {
?>
<div class="row">
<form action="tbb.php" method="get" style="margin-top:15px">
	<span class="form-group col-md-5" style="font-size: 18px; margin-left: 15px;">TextbookBreeze &mdash; for <b><?php echo $name; ?></b></span>
	<div class="form-group col-md-1"><select name="c">
		<option value="1">Chapter</option>
		<?php
		for ( $i = 1; $i <= $numChapters; $i++ ) {
			?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
		}
		?>
	</select></div>
	<div class="form-group col-md-1"><select name="i">
		<option value="1">Issue</option>
		<option value="0">Case study</option>
		<?php
		for ( $i = 1; $i <= 4; $i++ ) {
			?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
		}
		?>
		<option value="5">Summary</option>
	</select></div>
	<input type="hidden" name="p" value="<?php echo $password; ?>" />
	<div class="form-group col-md-1"><button class="btn btn-primary" type="submit">Change</button></div>
	<div class="col-md-1">Ch. <?php echo $chapter; ?> Issue <?php echo ($issue == 0 || $issue == 5) ? ( ($issue == 5) ? "S" : "C") : $issue; ?></div>
	<div class="form-group col-md-2">
	<a class="btn btn-default" href="tbb.php?c=<?php echo ( $issue == 0 ? $chapter - 1 : $chapter ); ?>&i=<?php echo ( $issue == 0 ? 5 : $issue - 1 ); ?>&p=<?php echo $password; ?>" style="font-size:12px">&lsaquo; Back</a>
	<a class="btn btn-default" href="tbb.php?c=<?php echo ( $issue == 5 ? $chapter + 1 : $chapter ); ?>&i=<?php echo ( $issue == 5 ? 0 : $issue + 1 ); ?>&p=<?php echo $password; ?>" style="font-size:12px">Next &rsaquo;</a>
	</div>
</form></div> <!-- .row -->
<iframe style="width: 100%; height: 92%;" src="<?php echo $textbookLink; ?>">Your browser does not support iframes and is <i>ancient</i>. Please get a new one if you want to use TextbookBreeze.</iframe>
<?php
} else {
?>
<div class="container">
<h1>TextbookBreeze</h1>
<p>This is <b>protected content</b> licensed to <b><?php echo $name; ?></b>.</p>
<div class="row">
<form action="tbb.php" method="get">
	<div class="form-group col-md-1"><select name="c">
		<option value="1">Chapter</option>
		<?php
		for ( $i = 1; $i <= $numChapters; $i++ ) {
			?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
		}
		?>
	</select></div>
	<div class="form-group col-md-2"><select name="i">
		<option value="1">Issue</option>
		<option value="0">Case study</option>
		<?php
		for ( $i = 1; $i <= 4; $i++ ) {
			?>
			<option value="<?php echo $i; ?>"><?php echo $i; ?></option>
			<?php
		}
		?>
		<option value="5">Summary & vocab</option>
	</select></div>
	<div class="form-group col-md-3"><input type="text" class="form-control" name="p" placeholder="Class password" /></div>
	<div class="form-group col-md-6"><button class="btn btn-primary" type="submit">Enter TextbookBreeze</button></div>
</form>
</div> <!-- .row -->
</div> <!-- .container -->
<?php
}
?>

	</body>
</html>
