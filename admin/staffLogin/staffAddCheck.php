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
<?php

require_once( '../../common/common.php' );

$post = sanitize( $_POST );

$staffname = $post[ 'name' ];
$staffpass = $post[ 'password' ];
$staffpass2 = $post[ 'password2' ];

$okflg = true;

?>

<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>管理者登録確認</title>
	<link href="staffAddCheck.css" rel="stylesheet" type="text/css">
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
			<p>管理者登録確認</p>
		</div>
		<div id="infoInput">
			<table border="1">
				<tr>
					<td class="infoData">管理者名</td>
					<td>
						<?php
						if ( isset( $_POST[ 'name' ] ) && $_POST[ 'name' ] == NULL ) {
							print 'お名前が入力されていません。';
							$okflg = false;
						} else {
							print $staffname;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">パスワード</td>
					<td>
						<?php
						if ( ( preg_match( '/^(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,20}$/i', $staffpass ) == 0 ) || $staffpass !== $staffpass2 ) {
							print '指定通りに入力してください。';
							$okflg = false;
						} else {
							print 'パスワードの登録は完了しました。';
						}
						?>
					</td>
				</tr>
			</table>
		</div>
		<?php
		if ( $okflg == true ) {
			print '<form method="post" action="staffAddDone.php">';
			print '<input type="hidden" name="name" value="' . $staffname . '">';
			print '<input type="hidden" name="password" value="' . $staffpass . '">';
			?>
		<div id="buttonZone">
			<?php
			print '<input type="submit" id="button1" value="登録完了へ">';
			print '<input type="button" id="button2" onclick="history.back()" value="前のページへ戻る">';
			print '</form>';
			} else {
				?>
			<div id="buttonZone2">
				<?php
				print '<form>';
				print '<input type="button" id="button2" onclick="history.back()" value="前のページへ戻る">';
				print '</form>';
				}
				?>
			</div>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>