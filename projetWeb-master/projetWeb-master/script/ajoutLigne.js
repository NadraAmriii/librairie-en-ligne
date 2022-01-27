var nbLignes = 0;
function ajouterLigne(form) {
	nbLignes ++;
	var ligne = '<p id="nbLignes'+nbLignes+'"><input type="text" name="ingredient[]" placeholder="ingredient" value="'+form.ingredientAjoute.value+'"> <input type="text" name="quantite[]" placeholder="quantité" value="'+form.quantiteAjoute.value+'">  <input type="text" name="mesure[]" placeholder="mesure physique (facultatif)" value="'+form.mesureAjoute.value+'"> </p><br>';
	jQuery('#ligneIngredient').append(ligne);
	form.ingredientAjoute.value = '';
	form.quantiteAjoute.value = '';
	form.mesureAjoute.value = '';		
}