<?php
include 'dbConnection.php';
$sql = "SELECT * FROM list";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
	while ($row = $result->fetch_assoc()) {
?>

		<?= $row['title']; ?> <br>
<?php
	}
} else {
	echo "0 results";
}
mysqli_close($conn);
?>