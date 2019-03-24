function CheckEmail_1(input) {
	var mail = document.getElementById("email_1").value;
	var mailConfirm = input.value;
	if (mail != mailConfirm) {
		input.setCustomValidity('メールアドレスが一致しません');
	} else {
		input.setCustomValidity('');
	}
}

function PassCode_1(input) {
	var password = document.getElementById("password").value;
	var passConfirm = input.value;
	if (password != passConfirm) {
		input.setCustomValidity('パスワードが一致しません');
	} else {
		input.setCustomValidity('');
	}
}
