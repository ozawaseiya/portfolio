function CheckEmail_1(input) {
	var mail = document.getElementById("email1").value;
	var mailConfirm = input.value;
	if (mail != mailConfirm) {
		input.setCustomValidity('メールアドレスが一致しません');
	} else {
		input.setCustomValidity('');
	}
}
