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
$cart = $_SESSION[ 'cart' ];
$code = $_SESSION[ 'member_code' ];
$orderquantity = $_SESSION[ 'cnt' ];
?>
<?php

require_once( '../../../common/common.php' );

$post = sanitize( $_POST );

$seikanji = $post[ 'seikanji' ];
$meikanji = $post[ 'meikanji' ];
$seifurigana = $post[ 'seifurigana' ];
$meifurigana = $post[ 'meifurigana' ];
$tel = $post[ 'tel' ];
$email1 = $post[ 'email1' ];
$postal1 = $post[ 'postal1' ];
$postal2 = $post[ 'postal2' ];
$prefecture = $post[ 'prefecture' ];
$address = $post[ 'address' ];
$date = $post[ 'date' ];
$time = $post[ 'time' ];
$payment = $post[ 'pay' ];


$okflg = true;

?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>注文情報追加確認</title>
	<link href="orderAddCheck.css" rel="stylesheet" type="text/css">
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
			<p>注文情報追加確認</p>
		</div>
		<div id="inputBox">
			<table border="1" width="500px">
				<tr>
					<td class="infoData">お名前（姓）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'seikanji' ] ) && $_POST[ 'seikanji' ] == NULL ) {
							print 'お名前（姓）が入力されていません。';
							$okflg = false;
						} else {
							print $seikanji;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お名前（名）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'meikanji' ] ) && $_POST[ 'meikanji' ] == NULL ) {
							print 'お名前（名）が入力されていません。';
							$okflg = false;
						} else {
							print $meikanji;
						}
						?> </td>
				</tr>
				<tr>
					<td class="infoData">お名前（せい）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'seifurigana' ] ) && $_POST[ 'seifurigana' ] == NULL ) {
							print 'お名前（せい）が入力されていません。';
							$okflg = false;
						} else {
							print $seifurigana;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">お名前（めい）</td>
					<td>
						<?php
						if ( isset( $_POST[ 'meifurigana' ] ) && $_POST[ 'meifurigana' ] == NULL ) {
							print 'お名前（めい）が入力されていません。';
							$okflg = false;
						} else {
							print $meifurigana;
						}
						?> </td>
				</tr>
				<tr>
					<td class="infoData">電話番号</td>
					<td>
						<?php
						if ( preg_match( "(^\d{10}$|^\d{11}$)", $tel ) == 0 ) {
							print '電話番号を正確に入力してください。';
							$okflg = false;
						} else {
							print $tel;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">メールアドレス</td>
					<td>
						<?php
						if ( preg_match( '/\A[\w\-\.]+\@[\w\-\.]+\.([a-z]+)\z/', $email1 ) == 0 ) {
							print 'メールアドレスを正確に入力してください。<br/>';
							$okflg = false;
						} else {
							print $email1;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">郵便番号</td>
					<td>
						<?php
						if ( preg_match( '/\A[0-9]+\z/', $postal1 || $postal2 ) == 0 ) {
							print '郵便番号は半角数字で入力してください。';
							$okflg = false;
						} else {
							print $postal1;
							print '-';
							print $postal2;
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
						if ( isset( $_POST[ 'prefecture' ] ) && $_POST[ 'prefecture' ] == '' ) {
							print '都道府県が選択されていません。';
							$okflg = false;
						} else {
							print $prefecture;
						}
						?>
					</td>
				</tr>
				<tr>
					<td class="infoData">市区町村番地</td>
					<td>
						<?php
						if ( isset( $_POST[ 'address' ] ) && $_POST[ 'address' ] == '' ) {
							print '市区町村番地が入力されていません。';
							$okflg = false;
						} else {
							print $address;
						}
						?>
					</td>
				</tr>
				<?php
				if ( isset( $_POST[ 'date' ] ) && $_POST[ 'date' ] == '' ) {
					print '日付を指定してください';
					$okflg = false;
				}

				if ( isset( $_POST[ 'time' ] ) && $_POST[ 'time' ] == '' ) {
					print '時間帯を指定ください';
					$okflg = false;
				}

				if ( isset( $_POST[ 'pay' ] ) && $_POST[ 'pay' ] == 'cash' ) {
					$payment = '代金引換';
					require_once( '../../../common/common.php' );
					$post = sanitize( $_POST );
					$cardnumber = $post[ 'cardnumber' ];
					$cardvalidyear = $post[ 'cardvalidyear' ];
					$cardvalidmonth = $post[ 'cardvalidmonth' ];
					$cardnumber = NULL;
					$cardvalidyear = NULL;
					$cardvalidmonth = NULL;
				} else {
					$payment = 'クレジットカード';
					require_once( '../../../common/common.php' );
					$post = sanitize( $_POST );
					$cardnumber = $post[ 'cardnumber' ];
					$cardvalidyear = $post[ 'cardvalidyear' ];
					$cardvalidmonth = $post[ 'cardvalidmonth' ];
				}


				$arrival1 = '日付:' . $date;
				global $arrival1;
				$arrival2 = '時間帯:' . $time . '時頃';
				global $arrival2;
				$arrival = '日付:' . $date . '&nbsp;&nbsp;時間帯:' . $time . '時頃';
				global $arrival;

				?>
				<br/><br/>
				<table id="deliverBox" border="1">
					<tr>
						<td class="add">お支払い方法</td>
						<td class="data">
							<?php
							if ( isset( $_POST[ 'pay' ] ) && $_POST[ 'pay' ] == 'card' && preg_match( "([0-9]{16})", $cardnumber ) == false ) {
								$payment = '*カード番号を正確に入力してください。';
								$okflg = false;
								print $payment;
							} else {
								print $payment;
							}
							?>
					</tr>
					<tr>
						<td class="add">配達日時</td>
						<td class="data">
							<?php print $arrival1; ?><br/>
							<?php print $arrival2; ?>
						</td>
					</tr>
				</table>
			</table>
		</div>
		<?php
		if ( $okflg == true ) {
			$name = $seikanji .= $meikanji;
			print '<form method="post" action="orderAddDone.php">';
			print '<input type="hidden" name="name" value="' . $name . '">';
			print '<input type="hidden" name="tel" value="' . $tel . '">';
			print '<input type="hidden" name="email" value="' . $email1 . '">';
			print '<input type="hidden" name="postal1" value="' . $postal1 . '">';
			print '<input type="hidden" name="postal2" value="' . $postal2 . '">';
			print '<input type="hidden" name="prefecture" value="' . $prefecture . '">';
			print '<input type="hidden" name="address" value="' . $address . '">';
			print '<input type="hidden" name="payment" value="' . $payment . '">';
			print '<input type="hidden" name="arrival" value="' . $arrival . '">';
			print '<input type="hidden" name="cardnumber" value="' . $cardnumber . '">';
			print '<input type="hidden" name="cardvalidyear" value="' . $cardvalidyear . '">';
			print '<input type="hidden" name="cardvalidmonth" value="' . $cardvalidmonth . '">';
			?>
		<div id="buttonZone">
			<?php
			print '<input type="submit" id="button1" value="登録完了画面へ">';
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
	</div>
	<footer>
	</footer>
</body>
</html>