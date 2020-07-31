<?php
    $AUTHOR = "Anuradha Jayatilaka";
    $AUTHOR_URL = "https://anuradhajayatilaka.github.io";
    $YEAR = "2020";

    if(!isset($DONT_SHOW_FOOTER) or $DONT_SHOW_FOOTER==false){
        $line = "<hr>";echo $line;
        $line = "<p align=\"center\">Created by : <a href=\"$AUTHOR_URL\">$AUTHOR</a> in $YEAR</p>";echo $line;
    }
    $line = "</body></html>";echo $line;
?>