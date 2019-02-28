<!DOCTYPE html>
<html>

<head>
    <title>Edycja newsa</title>
    <link rel="stylesheet" type="text/css" href="app.css">
</head>

<body>
<div class="center">


    <div class="header center">
        <h2>Edycja newsa</h2>
    </div>
    <div class="center">
        <form id="edit_news_form" method="post"
              action="index.php?page=news&action=edit&params[id]=<?php echo $data['news']['id'] ?>">

            <?php
            include('form.php');
            ?>

            <div class="input-group">
                <button type="submit" class="btn">Edytuj newsa</button>
            </div>

            <p>
                <a href="index.php?page=news&action=index">Wróć do listy newsów</a>
            </p>
        </form>
    </div>
</div>
</body>
</html>
