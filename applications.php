<?php
define('matrix',true);
include_once "drawpage.php";
include('config.php');

$content = '
<h2>Identified Applications</h2>
<ul>';

$sql = 'SELECT * from Applications;';

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
	while ($row = $result->fetch_assoc())
	{
		$content .= '<li>' . $row['PackageName'] . '</li>';
	}

} else {
	$content .= '<li> NO APPLICATIONS FOUND </li>';
}

$conn -> close();
$content .= '</ul>';
drawpage($content);
?>
