<?php
echo"<footer>";
echo"<p>Acessado por ". $_SERVER['REMOTE_ADDR']." em ".
date('m/d/y')."</p>";
echo"<p>Desenvolvido por Matias &copy; 2022";
echo"</footer>";
$banco->close();