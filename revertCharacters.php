<?php

function revertCharacters($string){

    $string = mb_str_split($string);

    $c = 0;
    $up_map = [];
    $tmp2 = "";
    foreach($string as $char) {
        if (mb_strtoupper($char) == $char && ($char !== " ")) {
            $up_map[] = $c;
        }

        $char = mb_strtolower($char);

        if (ctype_punct($char) || ctype_space($char)) {
            $tmp2 .= implode("",array_reverse($tmp)).$char;
            $tmp = [];
        } else {
            $tmp[] = $char;
        }
        
        $c++;
    }
    $tmp2 .= implode("", array_reverse($tmp));

    $result = mb_str_split($tmp2);

    for($i = 0; $i <= count($up_map)-1; $i++){
        $result[$up_map[$i]] = mb_strtoupper($result[$up_map[$i]]);
    }

    return implode("", $result);
}

echo revertCharacters('Это прОсто, теСтовая!!! сТрока.');
