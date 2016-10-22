<?php
	include 'database.php';
	$output = '';
	$sql = "select page_name from fb_feed where id = '1'";
	$result = mysql_query($sql) or die("prb");
	$name= mysql_fetch_array($result);
	
	$output = '<iframe class="embed-responsive-item" src="http://www.facebook.com/plugins/likebox.php?href=http%3A%2F%2Fwww.facebook.com%2F'.$name['page_name'].'&width=600&colorscheme=light&show_faces=true&border_color&stream=true&header=true&height=435" scrolling="yes" style="border:none; overflow:hidden; width:600px; height:430px; background: white; float:left; " allowtransparency="true" frameborder="0"></iframe>';
	echo $output;
	mysql_close();


?>