<?php
//il vous suffit de mettre votre adresse email a la ligne 35 


//On r�cup�re les valeurs du formulaire
$nomembre = $_POST['nomembre'];
$sex = $_POST['sex'];
$nom = $_POST['nom'];
$prenom = $_POST['prenom'];
$jour = $_POST['jour'];
$mois = $_POST['mois'];
$annee = $_POST['annee'];
$adresse = $_POST['adresse'];
$npa = $_POST['npa'];
$localite = $_POST['localite'];                                                           
$tel = $_POST['tel'];   
$nat = $_POST['nat'];
$email = $_POST['email'];

?>
<?php //On cr��e le message email

$msg = "Sex= $sex 
no membre= $nomembre 
Nom= $nom 
Pr�nom= $prenom 
Date de naissance= $jour $mois $annee  
Adresse: $adresse 
Npa= $npa 
Localit�= $localite
T�lephone= $numtel  
Natel= $nat  
Adresse email : $email";

$recipient = "webmaster@net.com"; //On met l'adresse email ou on veut recevoire le mail
$subject = "Formulaire"; //On met le sujet du mail

$mailheaders = "From: Mon site web<> \n"; //depuis o� il a �t� post�


mail($recipient, $subject, $msg, $mailheaders); // message confirmation que le mail a bien �t� envoy�

echo "<HTML><HEAD>";
echo "<TITLE>Formulaire envoyer!</TITLE></HEAD><BODY>";
echo "<H1 align=center>Merci, $sex $nom </H1>";
echo "<P align=center>";
echo "Votre formulaire � bien �t� envoy� !</P>";
echo "</BODY></HTML>";

?> 