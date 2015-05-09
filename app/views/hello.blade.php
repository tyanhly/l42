<!doctype html>
<html lang="en">
<head>
	<meta charset="UTF-8">
	<title>Laravel PHP Framework</title>

</head>
<body>
	<div class="welcome">
		<a href="http://laravel.com" title="Laravel PHP Framework"></a>
		<h1>You have arrived.</h1>
@qrcode("https://github.com/tyanhly/vcode_qrcode")
@qrcodeBase64Dom("https://github.com/tyanhly/vcode_qrcode")
<img src="data:image/png;base64,@qrcodeBase64("https://github.com/tyanhly/vcode_qrcode")" />
		</div>
	</div>
</body>
</html>
