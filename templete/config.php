<?php


try{
$BdD2 = new PDO ("mysql:host=localhost;dbname=","root","",
	 array(PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES utf8'));

	$BdD2-> setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
	$BdD2-> setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);


	if (!$BdD2) {
   echo "\nPDO::errorInfo():\n";
   print_r($BdD2->errorInfo());
}



}
catch (PDOException $e) {
    echo 'Échec lors de la connexion : ' . $e->getMessage();
};


?>