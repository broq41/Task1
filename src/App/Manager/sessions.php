<?php


function id_prevent_adoption()
{
    if (!isset($_SESSION['our_own']))
    {
        session_regenerate_id();
        $_SESSION['our_own'] = true;

    }
}

function id_regeneration()
{
    $now = time();
    $regenerateSec = 1800;
    $regenerateReq = 10;

    if (!isset($_SESSION['started'])) {

        $_SESSION['started'] = true;
        $_SESSION['time'] = $now;
        $_SESSION['req'] = 1;

    } else {

        $_SESSION['req']++;

        if (isset($_SESSION['time']) && ((int)$_SESSION['time'] + $regenerateSec < $now)) {

            session_regenerate_id(true);

            $_SESSION['time'] = $now;
        }

        if (isset($_SESSION['req']) && ((int)$_SESSION['req'] > $regenerateReq)) {

            session_regenerate_id(true);

            $_SESSION['req'] = 1;
        }
    }
}




