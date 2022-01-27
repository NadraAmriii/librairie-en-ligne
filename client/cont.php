<?php
	
    require("../config/msg.php");

	if(isset($_POST['valider']))
	echo(($_POST["valider"]));
	{
	if(isset($_POST['vnom']) AND isset($_POST['vprenom']) AND isset($_POST['vemail']) AND isset($_POST['vmsg']))
	{
		echo($_POST['vnom']);

	if(!empty($_POST['vnom']) AND !empty($_POST['vprenom']) AND !empty($_POST['vemail']) AND !empty($_POST['vmsg']))
		{ 
			$vnom = htmlspecialchars(strip_tags($_POST['vnom']));
			$vprenom = htmlspecialchars(strip_tags($_POST['vprenom']));
			$vemail = htmlspecialchars(strip_tags($_POST['vemail']));
			$vmsg = htmlspecialchars(strip_tags($_POST['vmsg']));
			
			try 
			{
			ajouter($vnom, $vprenom, $vemail, $vmsg);
			} 
			catch (Exception $e) 
			{
				$e->getMessage();
			}

		}
	}
}


?>



