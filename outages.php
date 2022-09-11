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
<th>Start Time</th>
<th>End Time</th>
</tr>';

$sql = 'SELECT Marketplace.name, FailedRequests.StartTime, FailedRequests.EndTime FROM FailedRequests INNER JOIN Marketplace where Marketplace.Domain = FailedRequests.Domain;';

$results = $conn->query($sql);
if($results->num_rows > 0)
{
	while( $row = $results->fetch_assoc())
	{
		$content .= '<tr><td>' . $row["name"] . '</td><td>' . $row["StartTime"] . '</td><td>' . $row["EndTime"] . '</td></tr>';
	}
} else {
	$content .= '<tr>No results found</tr>';
}

$content .= '</table></li><ul>';
$conn -> close();
drawpage($content);
?>
