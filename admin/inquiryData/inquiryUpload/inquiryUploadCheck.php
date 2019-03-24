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

$contactseikanji = $post[ 'seikanji' ];
$contactmeikanji = $post[ 'meikanji' ];
$contactseifurigana = $post[ 'seifurigana' ];
$contactmeifurigana = $post[ 'meifurigana' ];
$contacttel = $post[ 'tel' ];
$contactemail1 = $post[ 'email1' ];
$contactinquiry = $post[ 'inquiry' ];

$okflg = true;

?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>お問い合わせ情報追加確認</title>
	<link href="inquiryUploadCheck.css" rel="stylesheet" type="text/css">
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
			<p>お問い合わせ情報確認</p>
		</div>
		<div id="infoInput">
			<table border="1">
				<tr>
					<td class="infoData">お名前（姓）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactseikanji' ] ) && $_POST[ 'contactseikanji' ] == NULL ) {
							print 'お名前（姓）が入力されていません。';
							$okflg = false;
						} else {
							print $contactseikanji;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お名前（名）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactmeikanji' ] ) && $_POST[ 'contactmeikanji' ] == NULL ) {
							print 'お名前（名）が入力されていません。';
							$okflg = false;
						} else {
							print $contactmeikanji;
						}
						?> </td>
				</tr>
				<tr>
					<td class="infoData">お名前（せい）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactseifurigana' ] ) && $_POST[ 'contactseifurigana' ] == NULL ) {
							print 'お名前（せい）が入力されていません。';
							$okflg = false;
						} else {
							print $contactseifurigana;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お名前（めい）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactmeifurigana' ] ) && $_POST[ 'contactmeifurigana' ] == NULL ) {
							print 'お名前（めい）が入力されていません。';
							$okflg = false;
						} else {
							print $contactmeifurigana;
						}
						?> </td>
				</tr>
				<tr>
					<td class="infoData">電話番号</td>
					<td>
						<?php
						if ( preg_match( "(^\d{10}$|^\d{11}$)", $contacttel ) == 0 ) {
							print '電話番号を正確に入力してください。';
							$okflg = false;
						} else {
							print $contacttel;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">メールアドレス</td>
					<td>
						<?php
						if ( preg_match( '/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $contactemail1 ) == 0 ) {
							print 'メールアドレスを正確に入力してください。<br/>';
							$okflg = false;
						} else {
							print $contactemail1;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お問合せ内容</td>
					<td>
						<?php
						if ( isset( $_POST[ 'contactinquiry' ] ) && $_POST[ 'contactinquiry' ] == NULL ) {
							print 'お問い合わせ内容が入力されていません。';
							$okflg = false;
						} else {
							print '<textarea name="inquiry" cols="60" rows="8" required>' . $contactinquiry . '</textarea>';
						}
						?>
					</td>
				</tr>
			</table>
		</div>
		<?php
		if ( $okflg == true ) {
			$contactkanji = $contactseikanji .= $contactmeikanji;
			$contactfurigana = $contactseifurigana .= $contactmeifurigana;
			print '<form method="post" action="inquiryUploadDone.php">';
			print '<input type="hidden" name="kanji" value="' . $contactkanji . '">';
			print '<input type="hidden" name="furigana" value="' . $contactfurigana . '">';
			print '<input type="hidden" name="tel" value="' . $contacttel . '">';
			print '<input type="hidden" name="email1" value="' . $contactemail1 . '">';
			print '<input type="hidden" name="inquiry" value="' . $contactinquiry . '">';
			?>
		<div id="buttonZone">
			<?php
			print '<input type="submit" id="button1" value="登録完了画面へ">';
			print '<input type="button" class="button2" onclick="history.back()" value="入力画面へ戻る">';
			print '</form>';
			} else {
				?>
			<div id="buttonZone2">
				<?php
				print '<form>';
				print '<input type="button" class="button2" onclick="history.back()" value="入力画面へ戻る">';
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