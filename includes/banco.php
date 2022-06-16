<?php
$banco = new mysqli("localhost", "root", "", "bd_games");
if ($banco->connect_errno) {
    echo "<p>Encontrei um erro</p>";
    die();
}
?>