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
$code = $_SESSION[ 'member_code' ];
$orderquantity = $_SESSION[ 'cnt' ];
?>
<!doctype html>
<html lang="ja">
<head>
	<meta charset="UTF-8N">
	<title>注文情報追加</title>
	<link href="orderAdd.css" rel="stylesheet" type="text/css">
	<link rel="stylesheet" href="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/themes/south-street/jquery-ui.css">
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
			<form action="orderAddCheck.php" method="post" name="form1">
				<div id="shimei">
					<p>お名前</p><span class="attention">[必須]</span>
					<label for="seikanji">姓</label><input id="seikanji" class="text" type="text" name="seikanji" placeholder="(例)山田" maxlength="12" required><label for="meikanji">名</label><input id="meikanji" class="text" type="text" name="meikanji" placeholder="（例）花子" maxlength="12" required><br>
					<p>ふりがな</p><span class="attention">[必須]</span>
					<label for="seifurigana">せい</label><input id="seifurigana" class="text" type="text" name="seifurigana" placeholder="（例）やまだ" maxlength="12" required><label for="meifurigana">めい</label>
					<input id="meifurigana" class="text" type="text" name="meifurigana" placeholder="(例)はなこ" maxlength="12" required>
				</div>
				<div id="telephone">
					<p>電話番号</p><span class="attention">[必須]</span>
					<input class="text" type="text" name="tel" size="40" placeholder="0311112222" pattern="^\d{10}$|^\d{11}$" maxlength="11" id="hankaku" required><label for="hankaku">（半角数字）</label>
				</div>
				<div id="mailadress">
					<p>メールアドレス(半角英数字）</p>
					<span class="attention">[必須]</span>
					<input class="text" type="text" name="email1" id="email1" size="40" placeholder="sample@shiawase.co.jp" maxlength="40" required><br>
					<p>＊確認のためにもう一度メールアドレスを入力してください</p><span class="attention">[必須]</span><input class="text" type="text" name="email2" id="emailConfirm_1" size="40" oninput="CheckEmail_1(this)" maxlength="40" required>
				</div>
				<div id="zipform">
					<p>配送先郵便番号</p><span class="attention">[必須]</span>
					<table>
						<tr>
							<th>郵便番号</th>
							<td><input class="text" type="text" name="postal1" id="zip1" size="4" pattern="^\d{3}$" maxlength="3" required> － <input class="text" type="text" name="postal2" id="zip2" size="5" pattern="^\d{4}$" maxlength="4" onKeyUp="AjaxZip3.zip2addr('postal1','postal2','prefecture','address');" required>
							</td>
						</tr>
						<tr>
							<th>都道府県</th>
							<td>
								<input class="text" type="text" name="prefecture" id="prefecture" size="20" required>
							</td>
						</tr>
						<tr>
							<th>市区町村</th>
							<td><input class="text" type="text" name="address" id="address" size="40" required>
							</td>
						</tr>
					</table>
				</div>
				<div id="shipmentDate">
					<span class="attention">[必須]</span>発送予定日時<br/>
					<input type="text" id="inputDate" name="date" height="40px" autocomplete="off" required>
					<select name="time" id="timeNumber" required>
						<option value="10" selected>10</option>
						<option value="12">12</option>
						<option value="14">14</option>
						<option value="16">16</option>
						<option value="18">18</option>
						<option value="20">20</option>
					</select>
					時頃
				</div><br/>
				<div id="payment">
					<span class="attention">[必須]</span>お支払方法（選択)<br/><br/>
					<div id="radioButton">
						<input type="radio" name="pay" value="card" onclick="display()" checked="checked">クレジットカード払い<br>
						<input type="radio" name="pay" value="cash" onclick="nondisplay()">代金引換<br>
					</div><br/><br/>
					<div id="cardData">
						<span class="attention">[必須]</span>カード情報入力<br/>
						<input type="text" pattern="\d*" name="cardnumber" id="cardNumberInput" height="40px" maxlength="16" autocomplete="off">カード番号<br/><br/>
						<select name="cardvalidyear" id="cardValidYear" height="40px">
							<option value="2019">2019</option>
							<option value="2020">2020</option>
							<option value="2021">2021</option>
							<option value="2022">2022</option>
							<option value="2023">2023</option>
						</select>年
						<select name="cardvalidmonth" id="cardValidMonth" height="40px">
							<option value="1">1</option>
							<option value="2">2</option>
							<option value="3">3</option>
							<option value="4">4</option>
							<option value="5">5</option>
							<option value="6">6</option>
							<option value="7">7</option>
							<option value="8">8</option>
							<option value="9">9</option>
							<option value="10">10</option>
							<option value="11">11</option>
							<option value="12">12</option>
						</select>月 カード有効期限
					</div>
					<div id="resetZone">
						<input id="reset" type="reset" value="入力をリセットする">
					</div>
					<div id="buttonZone">
						<input id="button1" type="submit" onclick="OnButtonClick();" value="登録確認画面へ">
						<input id="button2" type="button" onclick="history.back()" value="前のページへ戻る">
					</div>
			</form>
			</div>
		</div>
	</div>
	</div>
	<footer>
	</footer>
	<script src="orderAdd.js"></script>
	<script src="https://ajaxzip3.github.io/ajaxzip3.js" charset="UTF-8N"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1.12.1/jquery-ui.min.js"></script>
	<script src="https://ajax.googleapis.com/ajax/libs/jqueryui/1/i18n/jquery.ui.datepicker-ja.min.js"></script>
	<script>
			$( function () {
			$.datepicker.setDefaults( $.datepicker.regional[ "ja" ] );
			$( "#inputDate" ).datepicker({minDate:'+1d'});
		} );
	</script>
</body>
</html>