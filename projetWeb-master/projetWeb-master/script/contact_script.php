<?php	
				
	$email = htmlspecialchars($_POST['email']);	
	$sujet = htmlspecialchars($_POST['sujet']); 
	$message = htmlspecialchars($_POST['message']);						
							
	$destinataire = 'gaetan.philippe1@gmail.com';					
		
	$headers = "From: <".$email.">\n";
	$headers .= "Reply-To: ".$email."\n";
	$headers .= "Content-Type: text/plain; charset=\"iso-8859-1\"";		
		
	if(mail($destinataire,$sujet,$message,$headers)) // envoi du mail réussit
	{ 
		header("Location: ../contact.php?mail=1"); 
	} 
	else // échec de l'envoi du mail
	{ 
		header("Location: ../contact.php?mail=0");
	} 	
	
?>
