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
	<title>商品追加</title>
	<link href="productAdd.css" rel="stylesheet" type="text/css">
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
					<li><a href="../../inquiryData/inquiryList/inquiryList.php">お問い合わせ一覧</a>
					</li>
					<li><a href="../productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../../orderData/orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>商品追加</p>
		</div>
		<div id="inputBox">
			<form method="post" action="productAddCheck.php" enctype="multipart/form-data">
				商品名を入力してください<br/>
				<input type="text" class="text" name="productname" style="width:200px" required><br/><br/> 販売店名を入力してください
				<br/>
				<input type="text" class="text" name="companyname" style="width:200px" required><br/><br/> 価格を入力してください
				<br/>
				<input type="text" class="text" name="price" style="width:200px" required><br/><br/> 商品画像を選んでください。（250px×300px）
				<br/>
				<input type="file" name="image" style="width:400px" required><br/><br/> ランキング画像を選んでください。（200px×240px）
				<br/>
				<input type="file" name="rankingimage" style="width:400px" required><br/><br/> カート画像を選んでください。（100px×120px）
				<br/>
				<input type="file" name="imagecart" style="width:400px" required><br/><br/>
				<input type="submit" id="button1" value="商品追加確認へ">
			</form>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>