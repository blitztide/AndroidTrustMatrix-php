<?php
define('matrix',true);
include('config.php');
include_once "drawpage.php";
$content = '
<h2>Trust Scores</h2>
<ul>';

$sql = 'select DomainScore,MarketScore,CompanyScore from MarketPlace;';

$results = $conn->query($sql);

if ($results -> num_rows > 0) {
	while ($row = $result->fetch_assoc())
	{
		$content .= '<li>' . $row['DomainScore'] . $row['MarketScore'] . $row['CompanyScore'] . '</li>';
	}
} else {
	$content .= '<li> No Trust scores </li>';
}

$conn -> close();
$content .= '</ul>';
drawpage($content);
?>
