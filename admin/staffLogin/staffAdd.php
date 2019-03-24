<?php
session_start();
header( 'Expires:' );
header( 'Cache-Control:' );
header( 'Pragma:' );
if ( isset( $_SESSION[ 'staff_login' ] ) == true ) {
	print $_SESSION[ 'staff_kanji' ];
	print 'さんログイン中<br/>';
	print '<br/>';
}
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>管理者登録</title>
	<link href="staffAdd.css" rel="stylesheet" type="text/css">
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
			<p>管理者登録</p>
		</div>
		<div id="staffInput">
			<form method="post" action="staffAddCheck.php">
				追加したい管理者名を入力してください<br/>
				<input type="text" name="name" style="width:200px" autocomplete="off" required><br/> パスワードを入力してください(半角英数字をそれぞれ1種類以上含む8文字以上)
				</br>
				<input type="password" name="password" style="width:100px" autocomplete="off" required><br/> パスワードをもう一度入力してください
				<br/>
				<input type="password" name="password2" style="width:100px" autocomplete="off" required><br/>
				<br/>
				<div id="buttonZone">
					<input type="button" id="backButton" onclick="history.back()" value="戻る">
					<input type="submit" id="serviceButton" value="登録確認へ">
				</div>
			</form>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>