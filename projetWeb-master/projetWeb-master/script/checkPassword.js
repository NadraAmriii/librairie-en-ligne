function verifPassword(input) {
	if (input.value != document.getElementById('password').value) {
		input.setCustomValidity('Les deux mots de passes doivent correspondre');
	} else {
		// Les mots de passes sont identiques donc on réinitialise le message d'erreur
		input.setCustomValidity('');
	}
}