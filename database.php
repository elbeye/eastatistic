<?php

	$baglanti = mysql_connect("localhost","root","root") or die ("baglanti hatasi");
	$veritabani = mysql_select_db("csv",$baglanti) or die ("baglanti hatasi");


?>