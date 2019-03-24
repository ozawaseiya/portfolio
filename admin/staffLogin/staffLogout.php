<?php
session_start();
header( 'Expires:' );
header( 'Cache-Control:' );
header( 'Pragma:' );
$_SESSION = array();
if ( isset( $_COOKIE[ session_name() ] ) == true ) {
	setcookie( session_name(), '', time() - 42000, '/' );
}
session_destroy();
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>ログアウト</title>
	<link href="staffLogout.css" rel="stylesheet" type="text/css">
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
			<p>ログアウト</p>
		</div>
		<div id="buttonZone">
			ログアウトしました。<br/>
			<br/>
			<a href="staffLogin.php">管理者ログインページへ</a>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>