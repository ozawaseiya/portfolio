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
	<title>注文情報追加</title>
	<link href="orderProductAdd.css" rel="stylesheet" type="text/css">
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
					<li><a href="../../productData/productList/productList.php">商品管理情報一覧</a>
					</li>
					<li><a href="../orderList/orderList.php">注文管理情報一覧</a>
					</li>
				</ul>
			</nav>
		</div>
	</header>
	<div id="contents">
		<div id="mainTitle">
			<p>注文情報追加</p>
		</div>
		<div id="inputBox">
			<form action="orderProductCount.php" method="get">
				商品選択<br/>
				<select name="code" id="orderproduct" height="40px">
					<option value="0" selected>生クリームロール</option>
					<option value="1">チョコドー</option>
					<option value="2">岡崎味噌まんじゅう</option>
					<option value="3">プレミアムシュー</option>
					<option value="4">蒲郡みかんジュース</option>
					<option value="5">豊根サイダー</option>
					<option value="6">新城健康生活</option>
					<option value="7">三河ワイン</option>
				</select>
				注文個数
				<select name="cnt" id="orderquantity" height="40px">
					<option value="1" selected>1</option>
					<option value="2">2</option>
					<option value="3">3</option>
					<option value="4">4</option>
					<option value="5">5</option>
					<option value="6">6</option>
					<option value="7">7</option>
					<option value="8">8</option>
					<option value="9">9</option>
					<option value="10">10</option>
				</select>個
				<br/>
				<div id="buttonZone">
					<input id="button1" type="submit" onclick="OnButtonClick();" value="注文確認画面へ">
					<input id="button2" type="button" onclick="history.back()" value="前のページへ戻る">
				</div>
			</form>
		</div>
	</div>

	</div>
	</div>
	<footer>
	</footer>
</body>
</html>