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
<?php

require_once( '../../../common/common.php' );

$post = sanitize( $_POST );

$memberseikanji = $post[ 'seikanji' ];
$membermeikanji = $post[ 'meikanji' ];
$memberseifurigana = $post[ 'seifurigana' ];
$membermeifurigana = $post[ 'meifurigana' ];
$membertel = $post[ 'tel' ];
$memberemail1 = $post[ 'email1' ];
$memberpostal1 = $post[ 'postal1' ];
$memberpostal2 = $post[ 'postal2' ];
$memberprefecture = $post[ 'prefecture' ];
$memberaddress = $post[ 'address' ];
$memberpassword = $post[ 'password' ];

$okflg = true;

?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>会員登録確認画面</title>
	<link href="memberUploadCheck.css" rel="stylesheet" type="text/css">
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
					<li><a href="../memberList/memberList.php">会員登録一覧</a>
					</li>
					<li><a href="../../inquiryData/inquiryList/inquiryList.php">お問い合わせ一覧</a>
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
			<p>会員登録確認画面</p>
		</div>
		<div id="inputBox">
			<h4>下記の入力されたフォームの情報を確認してください。</h4>
			<div id="infoInput">
				<table border="1">
					<tr>
						<td class="infoData">お名前（姓）</td>
						<td>
							<?php
							if ( isset( $_POST[ 'memberseikanji' ] ) && $_POST[ 'memberseikanji' ] == NULL ) {
								print 'お名前（姓）が入力されていません。';
								$okflg = false;
							} else {
								print $memberseikanji;
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="infoData">お名前（名）</td>
						<td>
							<?php
							if ( isset( $_POST[ 'membermeikanji' ] ) && $_POST[ 'membermeikanji' ] == NULL ) {
								print 'お名前（名）が入力されていません。';
								$okflg = false;
							} else {
								print $membermeikanji;
							}
							?> </td>
					</tr>
					<tr>
						<td class="infoData">お名前（せい）</td>
						<td>
							<?php
							if ( isset( $_POST[ 'memberseifurigana' ] ) && $_POST[ 'memberseifurigana' ] == NULL ) {
								print 'お名前（せい）が入力されていません。';
								$okflg = false;
							} else {
								print $memberseifurigana;
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="infoData">お名前（めい）</td>
						<td>
							<?php
							if ( isset( $_POST[ 'membermeifurigana' ] ) && $_POST[ 'membermeifurigana' ] == NULL ) {
								print 'お名前（めい）が入力されていません。';
								$okflg = false;
							} else {
								print $membermeifurigana;
							}
							?> </td>
					</tr>
					<tr>
						<td class="infoData">電話番号</td>
						<td>
							<?php
							if ( preg_match( "(^\d{10}$|^\d{11}$)", $membertel ) == 0 ) {
								print '電話番号を正確に入力してください。';
								$okflg = false;
							} else {
								print $membertel;
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="infoData">メールアドレス</td>
						<td>
							<?php
							if ( preg_match( '/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $memberemail1 ) == 0 ) {
								print 'メールアドレスを正確に入力してください。<br/>';
								$okflg = false;
							} else {
								print $memberemail1;
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="infoData">郵便番号</td>
						<td>
							<?php
							if ( preg_match( '/\A[0-9]+\z/', $memberpostal1 || $memberpostal2 ) == 0 ) {
								print '郵便番号は半角数字で入力してください。';
								$okflg = false;
							} else {
								print $memberpostal1;
								print '-';
								print $memberpostal2;
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="infoData">
							都道府県
						</td>
						<td>
							<?php
							if ( isset( $_POST[ 'memberprefecture' ] ) && $_POST[ 'memberprefecture' ] == '' ) {
								print '都道府県が選択されていません。';
								$okflg = false;
							} else {
								print $memberprefecture;
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="infoData">市区町村番地</td>
						<td>
							<?php
							if ( isset( $_POST[ 'memberaddress' ] ) && $_POST[ 'memberaddress' ] == '' ) {
								print '市区町村番地が入力されていません。';
								$okflg = false;
							} else {
								print $memberaddress;
							}
							?>
						</td>
					</tr>
					<tr>
						<td class="infoData">パスワード</td>
						<td>
							<?php
							if ( preg_match( '/^(?=.*?[a-z])(?=.*?\d)[a-z\d]{8,20}$/i', $memberpassword ) == 0 ) {
								print 'パスワードを再入力してください。';
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
				$memberpassword = md5( $memberpassword );
				$memberkanji = $memberseikanji .= $membermeikanji;
				$memberfurigana = $memberseifurigana .= $membermeifurigana;
				print '<form method="post" action="memberUploadDone.php">';
				print '<input type="hidden" name="password" value="' . $memberpassword . '">';
				print '<input type="hidden" name="kanji" value="' . $memberkanji . '">';
				print '<input type="hidden" name="furigana" value="' . $memberfurigana . '">';
				print '<input type="hidden" name="tel" value="' . $membertel . '">';
				print '<input type="hidden" name="email1" value="' . $memberemail1 . '">';
				print '<input type="hidden" name="postal1" value="' . $memberpostal1 . '">';
				print '<input type="hidden" name="postal2" value="' . $memberpostal2 . '">';
				print '<input type="hidden" name="prefecture" value="' . $memberprefecture . '">';
				print '<input type="hidden" name="address" value="' . $memberaddress . '">';
				?>
			<div id="buttonZone">
				<?php
				print '<input type="submit" id="button1" value="登録完了画面へ">';
				print '<input type="button" class="button2" onclick="history.back()" value="前のページへ戻る">';
				print '</form>';
				} else {
					?>
				<div id="buttonZone2">
					<?php
					print '<form>';
					print '<input type="button" class="button2" onclick="history.back()" value="前のページへ戻る">';
					print '</form>';
					}
					?>
				</div>
			</div>
		</div>
	</div>
	<footer>
	</footer>
</body>
</html>