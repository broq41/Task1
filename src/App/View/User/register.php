<!DOCTYPE html>
<html>

<head>
    <title>Rejestracja użytkownika</title>
    <link rel="stylesheet" type="text/css" href="app.css">
    <script src="app.js"></script>
</head>

<body>
<div class="center register_form">
    <div class="header center">
        <h2>Rejestracja użytkownika</h2>
    </div>

    <div class="center">
        <form id="register_form" method="post" action="index.php?page=user&action=register">

            <div class="input_row">
                <label for="email">E-mail</label>
                <input id="email" type="email" name="email" required>
                <p id="email_errors">
                    <?php if (!empty($GLOBALS['repeated_mail_error'])) {
                        echo $GLOBALS['repeated_mail_error'];
                    }
                    ?>
                </p>
            </div>

            <div class="input_row">
                <label for="first_name">Imię</label>
                <input id="first_name" type="text" name="first_name">

            </div>

            <div class="input_row">

                <label for="last_name">Nazwisko</label>
                <input id="last_name" type="text" name="last_name">
            </div>

            <div class="input_row">

                <label for="gender_male">Mężczyzna</label>
                <input id="gender_male" type="radio" name="gender" value="Mężczyzna" checked>

            </div>
            <div class="input_row">

                <label for="gender_female">Kobieta</label>
                <input id="gender_female" type="radio" name="gender" value="Kobieta">
            </div>

            <div class="input_row">
                <label for="password_1">Hasło</label>
                <input id="password_1" type="password" name="password_1" required>
            </div>
            <div class="input_row">
                <label for="password_2">Potwierdź hasło</label>
                <input id="password_2" type="password" name="password_2" required>
                <p id="password_mismatch_errors">
                    <?php if (!empty($GLOBALS['pswrd_mismatch_error'])) {
                        echo $GLOBALS['pswrd_mismatch_error'];
                    }
                    ?>

                </p>
            </div>

            <div class="input-group">
                <button type="submit" class="btn">Zarejestruj</button>
            </div>
            <p>
                Masz już konto ? <a href="index.php?page=user&action=login">Zaloguj się</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>
