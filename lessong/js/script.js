function verifierReponse() {
	var form = document.getElementById('reponse');
	if ((document.getElementById('texte').value).length > 1) {
		form.submit();
}
	else {
		return false;
	}
}