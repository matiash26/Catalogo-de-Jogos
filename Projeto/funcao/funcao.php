<?php
function thumb($dir){
    $caminho = "fotos/$dir";
    if(is_null($caminho) or !file_exists($caminho)){
        return 'fotos/indisponivel.png';
    }
    else{
        return $caminho;
    }
}
?>