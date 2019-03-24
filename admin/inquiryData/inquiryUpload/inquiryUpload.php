<?php
session_start();
header( 'Expires:' );
header( 'Cache-Control:' );
header( 'Pragma:' );
if ( isset( $_SESSION[ 'staff_login' ] ) == false ) {
	print 'ログインされていません。<br/>';
	print '<a href="../../staffLogin/staffLogin.php">ログイン画面へ</a>';
	exit();
} else {
	print $_SESSION[ 'staff_kanji' ];
	print 'さんログイン中<br/>';
	print '<br/>';
}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>お問い合わせ情報追加画面</title>
	<link href="inquiryUpload.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div id="headerInner">
			<a href="../../../index/index.php"><img src="../../../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../../../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<nav id="gnav">
				<ul id="gNavi">
					<li><a href="../../adminBranch.php">トップメニュー</a>
					</li>
					<li><a href="../../staff/staffList.php">管理者情報一覧</a>
					</li>
					<li><a href="../../memberData/memberList/memberList.php">会員登録一覧</a>
					</li>
					<li><a href="../inquiryList/inquiryList.php">お問い合わせ一覧</a>
					</li>
					<li><a href="../../productData/productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../../orderData/orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>お問い合わせ情報追加画面</p>
		</div><br/>
		<div id="inputBox">
			<form action="inquiryUploadCheck.php" method="post" name="form1">
				<div id="shimei">
					<p>お名前</p><span class="attention">[必須]</span>
					<label for="seikanji">姓</label><input id="seikanji" class="text" type="text" name="seikanji" placeholder="(例)山田" maxlength="12" required><label for="meikanji">名</label><input id="meikanji" class="text" type="text" name="meikanji" placeholder="（例）花子" maxlength="12" required><br>
					<p>ふりがな</p><span class="attention">[必須]</span>
					<label for="seifurigana">せい</label><input id="seifurigana" class="text" type="text" name="seifurigana" placeholder="（例）やまだ" maxlength="12" required><label for="meifurigana">めい</label>
					<input id="meifurigana" class="text" type="text" name="meifurigana" placeholder="(例)はなこ" maxlength="12" required>
				</div>
				<div id="telephone">
					<p>電話番号</p><span class="attention">[必須]</span>
					<input class="text" type="text" name="tel" size="40" placeholder="0311112222" pattern="^\d{10}$|^\d{11}$" required id="hankaku" maxlength="11"><label for="hankaku">（半角数字）</label>
				</div>
				<div id="mailadress">
					<p>メールアドレス(半角英数字）</p>
					<span class="attention">[必須]</span><input class="text" type="text" name="email1" id="email1" size="40" placeholder="sample@shiawase.co.jp" maxlength="40" required>
					<p>確認のためにもう一度メールアドレスを入力してください</p><span class="attention">[必須]</span>
					<input class="text" type="text" name="email2" id="emailConfirm_1" size="40" oninput="CheckEmail_1(this)" maxlength="40" required>
				</div>
				<div id="inquiry">
					<p>お問合せ内容（200文字以内)
						<p><span class="attention">[必須]</span>
							<textarea name="inquiry" cols="60" rows="8" maxlength="200" required></textarea><br/>
				</div>
				<div id="resetZone">
					<input id="reset" type="reset" value="入力をリセットする">
				</div>
				<div id="buttonZone">
					<input id="button1" type="submit" onclick="OnButtonClick();" value="入力確認画面へ">
					<input id="button2" type="button" onclick="history.back()" value="前のページへ戻る">
				</div>
			</form>
		</div>
	</div>
	<footer>
	</footer>
	<script src="inquiryUpload.js"></script>
</body>
</html>