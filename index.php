<?php

	$baglan = mysql_connect('localhost', 'root', 'root');
	$veritabani = mysql_select_db('csv' , $baglan);
	
	if($baglan){
		echo 'db bağlantı başarılı' . "<br/>";
	}
		
	

	if(isset($_FILES["dosya"]["name"]))  //dosya var mı bak
	
	{
	
	$veri = $_FILES["dosya"]["tmp_name"];	 //var ise veri değişkenine dosya bilgisini al
	
	$acilan = fopen($veri,"r"); //dosyayı aç ve acilan değişkenine at
	
		if($acilan !== FALSE);  //acilan dosya geriye false döndürüyor mu bak
			{
				while(($data = fgetcsv($acilan, 1000, ',')) !== FALSE) //false dönmüyor ise fgetcsv fonsiyonu ile data dizine gönder
				{
					
					$ad = $data[0];
					$soyad = $data[1];
					$sql = mysql_query("INSERT INTO mytable (ad,soyad) VALUES ('$ad','$soyad')");
					
					if($sql){
						echo 'veriler girildi' . "<br/>";
						}
				}
		
			}
		
		// echo $_FILES["dosya"]["name"];
	}
	
	
$liste = mysql_query("SELECT * FROM mytable (ad,soyad)");

	if(isset($liste)){
		echo $liste;
	}else {
		echo mysql_error();
	}
	
	
?>
	
	
	
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=UTF-8" />
<title>PHP Upload Form</title>
<style type="text/css">
.form {
	background-color: #EFEFEF;
	padding: 50px;
	height: 200px;
	width: 300px;
	margin-top: 50px;
	margin-bottom: 50px;
	margin-right: auto;
	margin-left: auto;
}
</style>
</head>

<body>

<div class="form">
<form name="upload" action="index.php" enctype="multipart/form-data" method="post">
	<p>Dosya:<br/><input type="file" name="dosya" /></p>
    <p>Açıklama:<br/><input type="text" name="aciklama" /></p>
    <p><input type="submit" value="Upload!" /></p>
</form>
</div>

</body>
</html>