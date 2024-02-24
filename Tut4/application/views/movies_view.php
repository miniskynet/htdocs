<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?><!DOCTYPE html>
<html lang="en">
<head>
	<meta charset="utf-8">
	<title>Movie Search</title>

	<style type="text/css">

		::selection { background-color: #E13300; color: white; }
		::-moz-selection { background-color: #E13300; color: white; }

		body {
			background-color: #fff;
			margin: 40px;
			font: 13px/20px normal Helvetica, Arial, sans-serif;
			color: #4F5155;
		}

		table, th, td {
			border-collapse: collapse;
			border: 2px solid black;
			padding: 10px;
		}

		a {
			color: #003399;
			background-color: transparent;
			font-weight: normal;
			text-decoration: none;
		}

		a:hover {
			color: #97310e;
		}

		h1 {
			color: #444;
			background-color: transparent;
			border-bottom: 1px solid #D0D0D0;
			font-size: 19px;
			font-weight: normal;
			margin: 0 0 14px 0;
			padding: 14px 15px 10px 15px;
		}

		code {
			font-family: Consolas, Monaco, Courier New, Courier, monospace;
			font-size: 12px;
			background-color: #f9f9f9;
			border: 1px solid #D0D0D0;
			color: #002166;
			display: block;
			margin: 14px 0 14px 0;
			padding: 12px 10px 12px 10px;
		}

		#body {
			margin: 0 15px 0 15px;
			min-height: 96px;
		}

		p {
			margin: 0 0 10px;
			padding:0;
		}

		p.footer {
			text-align: right;
			font-size: 11px;
			border-top: 1px solid #D0D0D0;
			line-height: 32px;
			padding: 0 10px 0 10px;
			margin: 20px 0 0 0;
		}

		#container {
			margin: 10px;
			border: 1px solid #D0D0D0;
			box-shadow: 0 0 8px #D0D0D0;
		}
	</style>
</head>
<body>

<div id="container">
	<h1>Movie Search</h1>

	<div id="body">
		<form action="http://localhost/Tut4/index.php/movies_controller/search" method="post">
			<label>Enter movie genre : </label>
			<input type="text" name="genre">
			<input type="submit">
		</form> <br>
		<button><a href="http://localhost/Tut4/index.php/movies_controller/allMovies">Get all movies</a></button>
	</div>

</div>

<div id="container">
	<div id="body">
		<table>
			<?php
			if(empty($movies)){
				echo "<br><h2>No movies found</h2>";
			}else{
				echo '<tr>';
				echo '<th>Id</th>';
				echo '<th>Title</th>';
				echo '<th>Director</th>';
				echo '<th>Genre</th>';
				echo '<th>IMDb Rating</th>';
				echo '<th>Release Year</th>';
				echo '</tr>';
				foreach ($movies as $movie){
					echo '<tr>';
					foreach ($movie as $value){
						echo '<td>' . $value . '</td>';
					}
					echo '</tr>';
				}
			}
			?>
		</table>
	</div>
</div>


</body>
</html>
