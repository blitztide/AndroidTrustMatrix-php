<?php
define('matrix',true);
include('config.php');
include_once "drawpage.php";
$content = '
<h2>Searched Marketplaces</h2>
<ul><li>
<table class="list">
<tr>
<th>Store Name</th>
<th>Domain</th>
</tr>';

$sql = 'SELECT Marketplace.name,Domains.URI FROM Marketplace CROSS JOIN Domains ON Domains.DomainID=Marketplace.Domain;';

$results = $conn->query($sql);
if($results->num_rows > 0)
{
	while( $row = $results->fetch_assoc())
	{
		$content .= '<tr><td>' . $row["name"] . '</td><td>' . $row["URI"] . '</td></tr>';
	}
} else {
	$content .= '<tr>No results found</tr>';
}

$content .= '</table></li><ul>';
$conn -> close();
drawpage($content);
?>
