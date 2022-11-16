<?php
define('matrix',true);
include('config.php');
include('helper.php');
include_once "drawpage.php";
$content = '
<h2>Trust Scores</h2>
<ul>';

$sql = 'SELECT name,DomainScore,MarketScore,CompanyScore FROM Marketplace WHERE COALESCE(MarketScore,DomainScore,CompanyScore) IS NOT NULL AND name = "google play" OR name = "amazon app store" OR name = "fdroid" OR name="aptoide" OR name = "slideme" OR name = "uptodown";';

$results = $conn->query($sql) or die("Error");

if ($results -> num_rows > 0) {
	while ($row = mysqli_fetch_array($results) )
	{
		if ($row[0] != null )
		{
			$content .= '<li><table class="outer-table"><tr><td>' . $row[0]. '</td><td><table><tr class="upper">' . print_value($row[1]) . print_value($row[2]) . print_value($row[3]) .'</tr><tr><td>Domain</td><td>Market</td><td>Company</td></tr></table></td></tr></table></li>';
		}
	}
} else {
	$content .= '<li> No Trust scores </li>';
}

$conn -> close();
$content .= '</ul>';
drawpage($content);
?>
