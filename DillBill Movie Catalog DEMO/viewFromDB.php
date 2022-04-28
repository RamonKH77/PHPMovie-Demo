<?php 
require_once("Include/DB.php");

?>


<!DOCTYPE html>
<html>
<head>
	<title>View data from database</title>
	<link rel="stylesheet" href="Include/View.css">

</head>
<body>
	<h2 class="success" align="center"><?php echo @$_GET["id"]; ?></h2>
	<div class="Search" align="center">
		<fieldset align="center">
			<form action="viewFromDB.php" method="GET">
				<input type="text" name="Search" placeholder ="Search by Movie Name, Language, Level or Accent">
				<input type="submit" name="SearchButton" value="Search">
			</form>
		</fieldset>
	</div>
	<br>
	<?php 

	if(isset($_GET['SearchButton'])){
		$Search=$_GET['Search'];
		$sql="SELECT * FROM movieinfo WHERE MovieName=:searcH OR MovieLanguage=:searcH OR MovieLevel=:searcH OR MovieAccent=:searcH";
		$stmt=$ConnectingDB->prepare($sql);
		$stmt->bindValue(':searcH',$Search);
		$stmt->execute();
		while($DataRows=$stmt->fetch()){
			$Id = $DataRows["id"];
			$MName = $DataRows["MovieName"];
			$MYear = $DataRows["MovieYear"];
			$MImage = $DataRows["MovieImage"];
			$MDesc = $DataRows["MovieDescription"];
			$MPoint = $DataRows["ImdbPoint"];
			$MLang = $DataRows["MovieLanguage"];
			$MLevel = $DataRows["MovieLevel"];
			$MAccent = $DataRows["MovieAccent"];
			?>

			<table width="1000" border="5" align="center">
		<caption>Search Result</caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Production Year</th>
			<th>Image Location</th>
			<th>Image</th>
			<th class="Description">Description</th>
			<th>IMDB Point</th>
			<th>Language</th>
			<th>Level</th>
			<th>Accent</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		<tr>
			<td><?php echo $Id ?></td>
			<td><?php echo $MName ?></td>
			<td><?php echo $MYear ?></td>
			<td><?php echo $MImage?></td>
			<td><?php echo '<img src="'.$MImage.'" width="170" height="190">' ?></td>
			<td class="Description"><?php echo $MDesc ?></td>
			<td><?php echo $MPoint ?></td>
			<td><?php echo $MLang ?></td>
			<td><?php echo $MLevel ?></td>
			<td><?php echo $MAccent ?></td>
			<td><a href="Update.php?id=<?php echo $Id; ?>">Update</a></td>
			<td><a href="Delete.php?id=<?php echo $Id; ?>">Delete</a></td>
			<td><a href="viewFromDB.php"></a></td>
		</tr>



	<?php	
		}//end of while
	}//end of submit button

	?>

	<table width="1000" border="5" align="center">
		<caption>View From Database</caption>
		<tr>
			<th>ID</th>
			<th>Name</th>
			<th>Production Year</th>
			<th>Image Location</th>
			<th>Image</th>
			<th>Description</th>
			<th>IMDB Point</th>
			<th>Language</th>
			<th>Level</th>
			<th>Accent</th>
			<th>Update</th>
			<th>Delete</th>
		</tr>
		

<?php 

$ConnectingDB;
$sql="SELECT * FROM movieinfo";
$stmt= $ConnectingDB->query($sql);
while($DataRows=$stmt->fetch()){
	$Id = $DataRows["id"];
	$MName = $DataRows["MovieName"];
	$MYear = $DataRows["MovieYear"];
	$MImage = $DataRows["MovieImage"];
	$MDesc = $DataRows["MovieDescription"];
	$MPoint = $DataRows["ImdbPoint"];
	$MLang = $DataRows["MovieLanguage"];
	$MLevel = $DataRows["MovieLevel"];
	$MAccent = $DataRows["MovieAccent"];



?>

<tr>
	<td><?php echo $Id ?></td>
	<td><?php echo $MName ?></td>
	<td><?php echo $MYear ?></td>
	<td><?php echo $MImage?></td>
	<td><?php echo '<img src="'.$MImage.'" width="170" height="190">' ?></td>
	<td><?php echo $MDesc ?></td>
	<td><?php echo $MPoint ?></td>
	<td><?php echo $MLang ?></td>
	<td><?php echo $MLevel ?></td>
	<td><?php echo $MAccent ?></td>
	<td><a href="Update.php?id=<?php echo $Id; ?>">Update</a></td>
	<td><a href="Delete.php?id=<?php echo $Id; ?>">Delete</a></td>
</tr>
<?php } ?>
	</table>
	

</body>
<!-- <script type="text/javascript" src="Include/script.js"></script> -->
</html>