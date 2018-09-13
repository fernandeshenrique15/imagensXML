<?php

    $relatorio = [
        'semFoto' => [],
        'comFoto'  => []
    ];

    $url = 'test.xml';
    $xml = simplexml_load_file($url) or die("Erro: Não consegui abrir o XML");

    foreach($xml->Listings->children() as $listing){

        // Número total de fotos processadas
        $n = 0;

        if(count($listing->Media->Item)) {

            array_push($relatorio['comFoto'], $listing->ListingID. " <br>");

            // Número da foto do respectivo imóvel
            $i = 0;

            // Criação da pasta
            mkdir($listing->ListingID, 0777);
            
            foreach($listing->Media->Item as $foto){    
                $i++;
                $n++;

                $options = array(
                    CURLOPT_RETURNTRANSFER => true, // return web page
                    CURLOPT_HEADER => false, // don't return headers
                    CURLOPT_FOLLOWLOCATION => true, // follow redirects
                    CURLOPT_ENCODING => "", // handle all encodings
                    CURLOPT_USERAGENT => "spider", // who am i
                    CURLOPT_AUTOREFERER => true, // set referer on redirect
                    CURLOPT_CONNECTTIMEOUT => 120, // timeout on connect
                    CURLOPT_TIMEOUT => 120, // timeout on response
                    CURLOPT_MAXREDIRS => 10 // stop after 10 redirects
                );
                
                $ch = curl_init($foto);
                curl_setopt_array($ch, $options);
                $content = curl_exec($ch);
                $header = curl_getinfo($ch);
                curl_close($ch);

                // Formação do nome da imagem: imagem + número da imagem do imóvel + quantia fotos processadas
                $dir = $listing->ListingID . '/imagem' . $i . "-". $n .".jpg";
                $downloaded_file = fopen($dir, 'w');
                fwrite($downloaded_file, $content);
                fclose($downloaded_file);
            }              
        } else {

            array_push($relatorio['semFoto'], $listing->ListingID. " <br>");

        }
    }

    if($relatorio['semFoto']) {

        echo "<div class='alert alert-danger'><h3>Imóveis sem foto</h3>";
        foreach($relatorio['semFoto'] as $listingID){
            echo $listingID;
        }
        echo "</div>";

    }

    if($relatorio['comFoto']) {

        echo "<div class='alert alert-success'><h3>Imóveis com foto</h3>";
        foreach($relatorio['comFoto'] as $listingID){
            echo $listingID;
        }
        echo "</div>";
        
    }

?>