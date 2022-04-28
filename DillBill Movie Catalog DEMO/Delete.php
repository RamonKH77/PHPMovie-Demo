<?php 
require_once("Include/DB.php");
$SearchQueryParameter=$_GET["id"];

if(isset($_POST["Submit"])){
			$ConnectingDB;
			$sql="DELETE FROM movieinfo WHERE id='$SearchQueryParameter'"; 

			$Execute=$ConnectingDB->query($sql);

		    if($Execute){
						echo '<script>window.open("viewFromDB.php?id=Record Deleted Successfully","_self") </script>';
			}
}	



?>


<!DOCTYPE html>
<html>
<head>
	<title>Update data to database</title>
	<link rel="stylesheet" href="Include/style.css">

</head>
<body>
	<?php 
		$ConnectingDB;
		$sql="SELECT * FROM movieinfo WHERE id='$SearchQueryParameter'";
		$stmt=$ConnectingDB->query($sql);
		while($DataRows = $stmt->fetch()){
			$Id = $DataRows["id"];
			$MName = $DataRows["MovieName"];
			$MYear = $DataRows["MovieYear"];
			$MImage = $DataRows["MovieImage"];
			$MDesc = $DataRows["MovieDescription"];
			$MPoint = $DataRows["ImdbPoint"];
			$MLang = $DataRows["MovieLanguage"];
			$MLevel = $DataRows["MovieLevel"];
			$MAccent = $DataRows["MovieAccent"];
		}
	?>
	<div class="">

		<form class="" action="Delete.php?id=<?php echo $SearchQueryParameter ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<span class="FieldInfo">Movie Name:</span>
				<br>
				<input type="text" name="MName" value="<?php echo $MName ?>">*
				
				<br>

				<span class="FieldInfo">Movie Production Year:</span>
				<br>
				<input type="text" name="MYear" value="<?php echo $MYear ?>">*
				
				<br>

				<span class="FieldInfo">Movie Image:</span> 
				<br>
				<input type="file" name="MImage" accept=".png, .jpeg, .jpg">*
				
				<br>

				<img src="<?php echo $MImage ?>" width=150 heigt=250>
				<br>

				<span class="FieldInfo">IMDB Point:</span>
				<br>
				<input type="text" name="MPoint" value="<?php echo $MPoint ?>">
				<br>

				<span class="FieldInfo">Description:</span>
				<br>
				<textarea name="MDesc" rows="9" cols="40" ></textarea>
				<br>

				<span class="FieldInfo">Movie Original Language:</span>
				<br>
				<select name="MLang" id="Language">
					<option value="Null">--</option>
					<option value="English">English</option>
					<option value="Russian">Russian</option>
				</select>*
				
				<br>

				<span class="FieldInfo">Movie Level:</span>
				<br>
				<select id="Levels" name="MLevel" style="width: 50px" >
					<option value="Null">--</option>
				    <option value="A1">A1</option>
				    <option value="A2">A2</option>
				    <option value="B1">B1</option>
				    <option value="B2">B2</option>
				    <option value="C1">C1</option>
				    <option value="C2">C2</option>
				</select>*
				
				<br>

				<span class="FieldInfo">Accent</span>
				<br>
				<select name="MAccent" id="Accent" >
					<option value="Mixed">Mixed</option>
					<option value="British">British</option>
					<option value="American">American</option>
				</select>
				<br>

				<input type="submit" name="Submit" value="Delete your record">
				<br>

			</fieldset>
		</form>
	</div>

</body>
<script type="text/javascript" src="Include/script.js"></script>
</html>