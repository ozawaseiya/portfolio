<?php
session_start();
header( 'Expires:' );
header( 'Cache-Control:' );
header( 'Pragma:' );
session_regenerate_id( true );
if ( isset( $_SESSION[ 'member_login' ] ) == true ) {
	print $_SESSION[ 'member_kanji' ];
	print 'さんログイン中<br/>';
	print '<br/>';
}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>管理者ログイン</title>
	<link href="staffLogin.css" rel="stylesheet" type="text/css">
</head>

<body>
	<header>
		<div id="headerInner">
			<a href="../../index/index.php"><img src="../../common/logo.png" alt="東三河幸せ宅配便" id="mainPhoto"></a>
			<img src="../../common/motto.png" alt="地元のおいしさと楽しみをご自宅にお届けいたします" id="mainMotto"/>
			<nav id="gnav">
				<ul id="gNavi">
					<li><a href="../adminBranch.php">トップメニュー</a>
					</li>
					<li><a href="../staff/staffList.php">管理者情報一覧</a>
					</li>
					<li><a href="../memberData/memberList/memberList.php">会員登録一覧</a>
					</li>
					<li><a href="../inquiryData/inquiryList/inquiryList.php">お問い合わせ一覧</a>
					</li>
					<li><a href="../productData/productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../orderData/orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>管理者ログイン</p>
		</div>
		<div id="loginInput">
			<form method="post" action="staffLoginCheck.php">
				管理者名<br/>
				<input type="text" name="name" autocomplete="off" required><br/><br/> パスワードを入力してください(半角英数字をそれぞれ1種類以上含む8文字以上)
				<br/>
				<input type="password" name="password" autocomplete="off" required><br/>
				<br/>
				<input type="submit" id="loginButton" value="ログイン">
			</form>
			<br/> 新規管理者登録の場合はこちら
			<br/>
			<a href="staffAdd.php">管理者登録へ</a>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>