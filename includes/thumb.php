<?php
    function thumb($dir)
    {
        $caminho = "fotos/$dir";
        if (is_null($dir) or !file_exists($caminho)) {
            return 'fotos/indisponivel.png';
        } else {
            return $caminho;
        }
    }

    
?>