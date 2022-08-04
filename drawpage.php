<?php
include("header.php");
include("footer.php");
include("navbar.php");
function drawpage($content)
{
	drawheader();
	drawnav();
	print("<article>" . $content . "</article>");
	drawfooter();	
}
?>
