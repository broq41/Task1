<!DOCTYPE html>
<html>

<head>
    <title>Newsy</title>
    <link rel="stylesheet" type="text/css" href="app.css">
</head>

<body>

<nav>
    <ul class="center_nav">
        <li><a class="btn btn_link" href="index.php?page=news&action=create">Dodaj newsa</a></li>
        <li><a class="btn btn_link" href="index.php?page=user&action=logout">Wyloguj</a></li>

    </ul>
</nav>

<div class="news_container">

    <div class="header">
        <h2>Newsy</h2>
    </div>


    <?php

    if (!empty($data['news'])) {
        if (is_array($data['news'])) {

            foreach ($data['news'] as $news) {

                echo "<div class='news_index_element'>

                    <div class='news_index_inline news_information'> 
                  <p> Tytuł: " . $news['name'] . "</p>
                  <p> Opis: " . $news['description'] . "</p>
                  </div>
                  <div class='news_index_inline'>
                <div class='pull_right'><a class='btn btn_link btn_danger' href=\"index.php?page=news&action=remove&params[id]=" . $news['id'] . "\">Usuń newsa</a></div>
                <div class='pull_right'><a class='btn btn_link' href=\"index.php?page=news&action=edit&params[id]=" . $news['id'] . "\">Edytuj newsa</a></div>
                </div>
                </div>
";

            }

        }

    }
    ?>
</div>
</body>
</html>
