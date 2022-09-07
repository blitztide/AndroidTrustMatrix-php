<?php
define('matrix',true);
include_once "drawpage.php";
include('config.php');

$content = '
<h2>Identified Applications</h2>
<ul>';

if(!isset($_GET['page'])){
	$page_number = 1;
} else {
	$page_number = $_GET['page'];
}

$base = ($page_number - 1) * $limit;

$sql = 'SELECT * from Applications LIMIT ' . $base . ','. $limit . ';';

$result = $conn->query($sql);

if ($result->num_rows > 0)
{
	$content .= '<li><table class="list"><tr><th>Application Name</th><th>Version</th><th>MD5</th><th>is Malware</th></tr>';
	while ($row = $result->fetch_assoc())
	{
		$content .= '<tr><td>' . $row['PackageName'] . '</td><td>'. $row['Version'].'</td><td>'. $row['MD5Sum'] .'</td><td>' . $row['IsMalware'] . '</td></tr>';
	}

} else {
	$content .= '<li> NO APPLICATIONS FOUND </li>';
}
$conn -> close();
$content .= '</table></ul>';
$content .= '</li><li><a href="/applications.php?page=' . ($page_number - 1) . '">Previous page</a><a href="/applications.php?page=' . ($page_number + 1 ) .'">Next page</a></li>';
drawpage($content);
?>
