<?php
    session_start();
    session_unset();
    session_gc();
    session_destroy();
    header('location: /');
?>
