<!DOCTYPE html>
<html>

<head>
    <title>Logowanie</title>
    <link rel="stylesheet" type="text/css" href="app.css">
</head>

<body>
<div class="center">

    <div class="header center">
        <h2>Logowanie</h2>
    </div>

    <div class="center">

        <form method="post" action="index.php?page=user&action=login">

            <div class="input_row">
                <label for="email">E-mail</label>
                <input id="email" type="text" name="email" required>

                <p id="no_user_errors">
                    <?php if (!empty($GLOBALS['no_user_error'])) {
                        echo $GLOBALS['no_user_error'];
                    }
                    ?>
                </p>
            </div>

            <div class="input_row">
                <label for="password">Hasło</label>
                <input id="password" type="password" name="password" required>

                <p id="password_errors">
                    <?php if (!empty($GLOBALS['pswrd_mismatch_error'])) {
                        echo $GLOBALS['pswrd_mismatch_error'];
                    }
                    ?>
                </p>
            </div>

            <div class="input-group">
                <button type="submit" class="btn btn_primary" name="reg_user">Zaloguj</button>
            </div>
            <p>
                Nie masz konta ? <a href="index.php?page=user&action=register">Zarejestruj się</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>
