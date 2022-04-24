<html lang="ja">

<head>
    <title>reCAPTCHA v3 サンプル</title>
    <meta charset="utf-8">
</head>

<body>
    <form id="recaptcha_form" action="/recaptcha.php" method="post">
        ログインID：<input type="text" name="login_id">
        </br>
        パスワード：<input type="password" name="password">
        </br>
        <button id="login" type="submit">ログイン</button>
    </form>
    <script src="https://www.google.com/recaptcha/api.js?render=<?php echo getenv("RECAPTCHA_SITE_KEY"); ?>"></script>
    <script>
        const recaptcha_form = document.getElementById('recaptcha_form');
        recaptcha_form.onsubmit = function(event) {
            event.preventDefault();
            grecaptcha.ready(function() {
                grecaptcha.execute('<?php echo getenv("RECAPTCHA_SITE_KEY"); ?>', {action:'submit'}).then(function(token) {
                    const token_field = document.createElement('input');
                    token_field.type = 'hidden';
                    token_field.name = 'recaptcha_token';
                    token_field.value = token;
                    recaptcha_form.appendChild(token_field);
                    recaptcha_form.submit();
                })
            });
        }
    </script>
</body>
</html>
