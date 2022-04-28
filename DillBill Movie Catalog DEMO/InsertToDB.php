<?php 
require_once("Include/DB.php");

$NameError="";
$YearError="";
$ImageError="";
$LanguageError="";
$LevelError="";
$Folder="MovieImages/";

if(isset($_POST["View"])){

    header("Location: viewFromDB.php");
    exit;

}

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

			//$MAccent=$_POST["MAccent"];//there is a small problem: Notice: Undefined index: MAccent in C:\xampp\htdocs\Php Course\Exercise\exinsdb.php on line 40. Because it is disabled
			$ConnectingDB;
			 $sql="INSERT INTO movieinfo(MovieName,MovieYear,MovieImage,MovieDescription,ImdbPoint,MovieLanguage,MovieLevel,MovieAccent) VALUES(:movienamE,:movieyeaR,:movieimagE,:moviedescriptioN,:imdbpoinT,:movielanguagE,:movieleveL,:movieaccenT)";

			// $sql="INSERT INTO movieinfo(MovieName,MovieYear,MovieDescription,ImdbPoint,MovieLanguage,MovieLevel,MovieAccent) VALUES(:movienamE,:movieyeaR,:moviedescriptioN,:imdbpoinT,:movielanguagE,:movieleveL,:movieaccenT)";//temporary for experiment. original is on the 42nd line.

			$stmt=$ConnectingDB->prepare($sql);
			$stmt->bindValue(':movienamE',$MName);
			$stmt->bindValue(':movieyeaR',$MYear);
			$stmt->bindValue(':movieimagE',$MImageLoc);//location on database.
			$stmt->bindValue(':moviedescriptioN',$MDesc);
			$stmt->bindValue(':imdbpoinT',$MPoint);
			$stmt->bindValue(':movielanguagE',$MLang);
			$stmt->bindValue(':movieleveL',$MLevel);
			$stmt->bindValue(':movieaccenT',$MAccent);
			$Execute=$stmt->execute();
			

			if (move_uploaded_file($_FILES['MImage']['tmp_name'],$Folder. $_FILES['MImage']['name']))
		    {
		        if($Execute){
						echo '<span class="success">Image uploaded.<br>Your Movie added to database successfully. </span>';
				}
			     
		    } else {
		        echo "Image couldn't upload!\n";
		    }
	}
}


?>


<!DOCTYPE html>
<html>
<head>
	<title>Inserting data to database</title>
	<link rel="stylesheet" href="Include/style.css">

</head>
<body>

	<div class="">

		<form class="" action="InsertToDB.php" method="post" enctype="multipart/form-data">
			<fieldset>
				<span class="FieldInfo">Movie Name:</span>
				<br>
				<input type="text" name="MName">*
				<span class="Error"><?php echo $NameError ?></span>
				<br>

				<span class="FieldInfo">Movie Production Year:</span>
				<br>
				<input type="text" name="MYear">*
				<span class="Error"><?php echo $YearError ?></span>
				<br>

				<span class="FieldInfo">Movie Image:</span> 
				<br>
				<input type="file" name="MImage" accept=".png, .jpeg, .jpg">*
				<span class="Error"><?php echo $ImageError ?></span>
				<br>

				<span class="FieldInfo">IMDB Point:</span>
				<br>
				<input type="text" name="MPoint">
				<br>

				<span class="FieldInfo">Description:</span>
				<br>
				<textarea name="MDesc" rows="9" cols="40"></textarea>
				<br>

				<span class="FieldInfo">Movie Original Language:</span>
				<br>
				<select name="MLang" id="Language">
					<option value="Null">--</option>
					<option value="English">English</option>
					<option value="Russian">Russian</option>
				</select>*
				<span class="Error"><?php echo $LanguageError ?></span>
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
				<span class="Error"><?php echo $LevelError ?></span>
				<br>

				<span class="FieldInfo">Accent</span>
				<br>
				<select name="MAccent" id="Accent" disabled="true" style="margin-bottom: 15px">
					<option value="Mixed">Mixed</option>
					<option value="British">British</option>
					<option value="American">American</option>
				</select>
				<br>

				<input type="submit" name="Submit" value="Submit your record">
				<input type="submit" name="View" value="View Your Movie List">
				
				<br>

			</fieldset>
		</form>
	</div>

</body>
<script type="text/javascript" src="Include/script.js"></script>
</html>