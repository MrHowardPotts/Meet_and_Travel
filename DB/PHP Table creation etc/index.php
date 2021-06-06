<?php
    //database connection settings
    $host = 'localhost';
    $user = 'root';
    $pass = '';
    $db = 'meetandtravel';

    $mysqli = mysqli_connect($host,$user,$pass,$db) or die("db-connection failed bate: " . $mysqli->error());

    if(isset($_POST["import"])){

        $fileName = $_FILES["file"]["tmp_name"];

        if($_FILES["file"]["size"] > 0){

            $file = fopen($fileName, "r");

            while(($column = fgetcsv($file, 100000, ",")) !== FALSE){

                $sqlInsert = "INSERT INTO `city` (city,latitude,longitude,country) VALUES ('". $column[0] . "','". $column[1] . "','" . $column[2] ."','" . $column[3]."')";
                $result = mysqli_query($mysqli,$sqlInsert);
            }
        }
    }
?>


<!DOCTYPE html>
<html>
	<head>
		<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
		<script type="text/javascript" src="js/index.js"></script>
		<link rel="stylesheet" type="text/css" href="css/home.css">
	</head>

	<body>
	    <div class="outer-scontainer">
	        <div class="row">
	            <form class="form-horizontal" action="" method="post" name="frmCSVImport" id="frmCSVImport" enctype="multipart/form-data">
	            	<div class="form-area">
						<input type="file" name="file" id="file-input" accept=".csv">
    					<button type="submit" id="submit" name="import" class="btn-submit">IMPORT TO DB</button><br />
					</div>
	            </form>
	        </div>

	        <?php
	            $sqlSelect = "SELECT * FROM `city` ";
	            $result = mysqli_query($mysqli, $sqlSelect);

	            if (mysqli_num_rows($result) > 0) {?>

	            <table id='userTable'>
	            <thead>
	                <tr>
	                    <th>ID</th>
	                    <th>city</th>
	                    <th>latitude</th>
	                    <th>longitude</th>
	                    <th>country</th>
	                </tr>
	            </thead>

	        <?php
	            while ($row = mysqli_fetch_array($result)) {?>
	            <tbody>
		            <tr>
		                <td><?php  echo $row['ID']; ?></td>
		                <td><?php  echo $row['city']; ?></td>
		                <td><?php  echo $row['latitude']; ?></td>
		                <td><?php  echo $row['longitude']; ?></td>
		                <td><?php  echo $row['country']; ?></td>
		            </tr>
	                <?php
	            }?>
	            </tbody>
	        </table>
	        <?php } ?>
	    </div>
	</body>
</html>