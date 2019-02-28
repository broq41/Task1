<!DOCTYPE html>
<html>

<head>
    <title>Nowy news</title>
    <link rel="stylesheet" type="text/css" href="app.css">
</head>

<body>
<div class="center news_form">

    <div class="header center">
        <h2>Nowy news</h2>
    </div>
    <div class="center">


        <form id="new_news_form" method="post" action="index.php?page=news&action=create">

            <?php
            include('form.php');
            ?>

            <div class="input-group">
                <button type="submit" class="btn">Dodaj newsa</button>
            </div>

            <p>
                <a href="index.php?page=news&action=index">Wróć do listy newsów</a>
            </p>
    </div>
</div>
</form>
</body>
</html>