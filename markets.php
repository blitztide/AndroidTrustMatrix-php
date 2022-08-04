<?php
define('matrix',true);
include('config.php');
include_once "drawpage.php";
$content = '
<h2>Searched Marketplaces</h2>
<table>
<tr>
<th>Store Name</th>
<th>Domain</th>
</tr>';

$sql = 'SELECT name, Domain FROM Marketplace';

$results = $conn->query($sql);
if($results->num_rows > 0)
{
	while( $row = $results->fetch_assoc())
	{
		$content .= '<tr><td>' . $row["name"] . '</td><td>' . $row["Domain"] . '</td></tr>';
	}
} else {
	$content .= '<tr>No results found</tr>';
}

$content .= '</table>';
$conn -> close();
drawpage($content);
?>
