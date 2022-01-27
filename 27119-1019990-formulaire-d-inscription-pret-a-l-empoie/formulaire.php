<html>
<head>
<title>inscription cours SSS</title>
<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
<script language="JavaScript">
//La fonction JavaScript qui vérifie si les champs obligatoirs du formulaire ont été bien remplis
<!--
function envoie(formulaire) {
if ( (document.getElementById('nom').value.length>0)
&&(document.getElementById('prenom').value.length>0)
&&(document.getElementById('adresse').value.length>0)
&&(document.getElementById('npa').value.length>0)
&&(document.getElementById('localite').value.length>0)
&&(document.getElementById('annee').value.length>0)
 ){
formulaire.submit();
} else
alert('IMPOSSIBLE D\' ENVOER LE FORMULAIRE, VOUS AVEZ OUBLIEZ DE REMPLIRE DES CHAMPS OBLIGATOIRS');
}
-->
</script>
<style type="text/css">
<!--
.Style4 {	font-size: 16px;
	font-weight: bold;
}
.Style10 {font-size: 18px; font-weight: bold; }
.Style11 {
	font-size: 36px;
	font-weight: bold;
}
-->
</style>
</head>

<body bgcolor="#FFFFFF">
<div align="center">
  <p align="left" class="Style11">Formulaire d'inscription </p>
  <p align="left" class="Style10"><font color="#FF0000">Les cases marqu&eacute;es d'une * sont obligatoires </font> </p>
  <form action="envoi.php" method="post" name="form_contacts" id="form_contacts">
    <p align="left" class="Style4">No membre SSS
        <input name="nomembre" type="text" id="nomembre">
  (si connue) </p>
    <p align="left" class="Style4">*Monsieur
        <input type="radio" name="sex" value="Monsieur" id="sex">
  Madame
  <input type="radio" name="sex" value="madame"id="sex">
    </p>
    <p align="left" class="Style4">*Nom :
        <input type="text" name="nom" id="nom">
    </p>
    <p align="left" class="Style4">*Pr&eacute;nom :
        <input type="text" name="prenom"id="prenom">
    </p>
    <p align="left" class="Style4">*Adresse :
        <input type="text" name="adresse"id="adresse">
    </p>
    <p align="left" class="Style4">*NPA
      <input name="npa" type="text" id="npa">
*Localit&eacute; :
<input name="localite" type="text" id="localite">
</p>
    <p align="left" class="Style4">Num. t&eacute;l&eacute;phone:
        <input name="tel" type="text" id="numtel">
  Nat.
  <input name="nat" type="text" id="nat">
    </p>
    <p align="left" class="Style4">*Date de naissance : Jour
        <select name="jour" id="jour">
          <option>##</option>
          <option>1</option>
          <option>2</option>
          <option>3</option>
          <option>4</option>
          <option>5</option>
          <option>6</option>
          <option>7</option>
          <option>8</option>
          <option>9</option>
          <option>10</option>
          <option>11</option>
          <option>12</option>
          <option>13</option>
          <option>14</option>
          <option>15</option>
          <option>16</option>
          <option>17</option>
          <option>18</option>
          <option>19</option>
          <option>20</option>
          <option>21</option>
          <option>22</option>
          <option>23</option>
          <option>24</option>
          <option>25</option>
          <option>26</option>
          <option>27</option>
          <option>28</option>
          <option>29</option>
          <option>30</option>
          <option>31</option>
        </select>
  Mois
  <select name="mois" id="mois">
    <option>##</option>
    <option>Janvier</option>
    <option>F&eacute;vrier</option>
    <option>Mars</option>
    <option>Avril</option>
    <option>Mai</option>
    <option>Juin</option>
    <option>Juillet</option>
    <option>Ao&ucirc;t</option>
    <option>Septembre</option>
    <option>Octobre</option>
    <option>Novembre</option>
    <option>D&eacute;cembre</option>
  </select>
  Anne&eacute;
  <input name="annee" type="text" id="annee">
    </p>
    <p align="left"><span class="Style4">*adresse email :
        <input name="email" type="text" id="email" size="50">
    </span></p>
    <p align="left"> 
	  <input name="envoyer" type="button" id="envoyer" value="Envoyer" onClick="envoie(this.form)">
      <input name="retablir" type="reset" id="retablir" value="R&eacute;tablir">
    </p>
  </form>
  <p>&nbsp;</p>
</div>
</body>
</html>
