<?php

    $url = 'test.xml';
    $xml = simplexml_load_file($url) or die("Erro: Não consegui abrir o XML");

    $output = shell_exec('php -e processar.php');
    echo "<pre>$output</pre>";