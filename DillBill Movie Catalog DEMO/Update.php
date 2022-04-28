<?php 
require_once("Include/DB.php");
$SearchQueryParameter=$_GET["id"];

$NameError="";
$YearError="";
$ImageError="";
$LanguageError="";
$LevelError="";
$Folder="MovieImages/";



if(isset($_POST["Submit"])){
	if(empty($_POST["MName"])){
		$NameError="Movie Name can't be empty!";
	}
	if(empty($_FILES["MImage"])){
		$ImageError="Movie Image can't be empty!";
	}
	if(empty($_POST["MYear"])){
		$YearError="Production year can't be empty!";
	}
	if($_POST["MLang"]=="Null"||$_POST["MLang"]=="--"){
		$LanguageError="Please chose Movie Language!";
	}
	if($_POST["MLevel"]=="Null"||$_POST["MLevel"]=="--"){
		$LevelError="Please chose Movie Level!";
	}



	if(!empty($_POST["MName"])&&!empty($_POST["MYear"])&&!empty($_FILES["MImage"])&&!($_POST["MLang"]=="Null"||$_POST["MLang"]=="--")&&!($_POST["MLevel"]=="Null"||$_POST["MLevel"]=="--")){
			$MName=$_POST["MName"];
			$MYear=$_POST["MYear"];
			$MImageLoc=$Folder.$_FILES["MImage"]['name'];
			//$MImage=$_POST["MImage"];
			$MPoint=$_POST["MPoint"];
			$MDesc=$_POST["MDesc"];
			$MLang=$_POST["MLang"];
			$MLevel=$_POST["MLevel"];
			$MAccent="";
			if($_POST["MAccent"]!=Null){
				$MAccent=$_POST["MAccent"];
			}else{
				$MAccent="Mixed";
			}

			$ConnectingDB;
			$sql="UPDATE movieinfo SET MovieName='$MName',MovieYear='$MYear',MovieImage='$MImageLoc',ImdbPoint='$MPoint',MovieDescription='$MDesc',MovieLanguage='$MLang',MovieLevel='$MLevel',MovieAccent='$MAccent' WHERE id='$SearchQueryParameter'"; 

			$Execute=$ConnectingDB->query($sql);

			if($_FILES['MImage']['name'] != ''){
				if (move_uploaded_file($_FILES['MImage']['tmp_name'],$Folder. $_FILES['MImage']['name']))
			    {
			        echo "Image Updated!";
				     
			    } else {
			        echo "Image couldn't upload!\n";
			    }
			}

			

		    if($Execute){
						echo '<script>window.open("viewFromDB.php?id=Record Updated Successfully","_self") </script>';
			}
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

		<form class="" action="Update.php?id=<?php echo $SearchQueryParameter ?>" method="post" enctype="multipart/form-data">
			<fieldset>
				<span class="FieldInfo">Movie Name:</span>
				<br>
				<input type="text" name="MName" value="<?php echo $MName ?>">*
				<span class="Error"><?php echo $NameError ?></span>
				<br>

				<span class="FieldInfo">Movie Production Year:</span>
				<br>
				<input type="text" name="MYear" value="<?php echo $MYear ?>">*
				<span class="Error"><?php echo $YearError ?></span>
				<br>

				<span class="FieldInfo">Movie Image:</span> 
				<br>
				<input type="file" name="MImage" accept=".png, .jpeg, .jpg">*
				<span class="Error"><?php echo $ImageError ?></span>
				<br>

				<img src="<?php echo $MImage ?>" width=150 heigt=250>
				<br>

				<span class="FieldInfo">IMDB Point:</span>
				<br>
				<input type="text" name="MPoint" value="<?php echo $MPoint ?>">
				<br>

				<span class="FieldInfo">Description:</span>
				<br>
				<textarea name="MDesc" rows="9" cols="40" ><?php echo $MDesc ?></textarea>
				<br>

				<span class="FieldInfo">Movie Original Language:</span>
				<br>
				<select name="MLang" id="Language">
					<option value="Null">--</option>
					<option value="English"<?php if($MLang=="English"){ echo "selected"; } ?> >English</option>
					<option value="Russian"<?php if($MLang=="Russian"){ echo "selected"; } ?> >Russian</option>
				</select>*
				<span class="Error"><?php echo $LanguageError ?></span>
				<br>

				<span class="FieldInfo">Movie Level:</span>
				<br>
				<select id="Levels" name="MLevel" style="width: 50px" >
					<option value="Null">--</option>
				    <option value="A1" <?php if($MLevel=="A1"){ echo "selected"; } ?> >A1</option>
				    <option value="A2" <?php if($MLevel=="A2"){ echo "selected"; } ?> >A2</option>
				    <option value="B1" <?php if($MLevel=="B1"){ echo "selected"; } ?> >B1</option>
				    <option value="B2" <?php if($MLevel=="B2"){ echo "selected"; } ?> >B2</option>
				    <option value="C1" <?php if($MLevel=="C1"){ echo "selected"; } ?> >C1</option>
				    <option value="C2" <?php if($MLevel=="C2"){ echo "selected"; } ?> >C2</option>
				</select>*
				<span class="Error"><?php echo $LevelError ?></span>
				<br>

				<span class="FieldInfo">Accent</span>
				<br>
				<select name="MAccent" id="Accent" >
					<option value="Mixed" <?php if($MAccent=="Mixed"){ echo "selected"; } ?> >Mixed</option>
					<option value="British" <?php if($MAccent=="British"){ echo "selected"; } ?> >British</option>
					<option value="American" <?php if($MAccent=="American"){ echo "selected"; } ?> >American</option>
				</select>
				<br>

				<input type="submit" name="Submit" value="Submit your record">
				<br>

			</fieldset>
		</form>
	</div>

</body>
<script type="text/javascript" src="Include/script.js"></script>
</html>