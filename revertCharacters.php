<?php

function revertCharacters($string){

    $string = mb_str_split($string);

    $currentCharacter = 0;
    $upMap = [];
    $processedString = "";
    foreach($string as $char) {
        if (mb_strtoupper($char) == $char && ($char !== " ")) {
            $upMap[] = $currentCharacter;
        }

        $char = mb_strtolower($char);

        if (ctype_punct($char) || ctype_space($char)) {
            $processedString .= implode("",array_reverse($tmp)).$char;
            $tmp = [];
        } else {
            $tmp[] = $char;
        }
        
        $currentCharacter++;
    }
    $processedString .= implode("", array_reverse($tmp));

    $result = mb_str_split($processedString);

    for($i = 0; $i <= count($upMap)-1; $i++){
        $result[$upMap[$i]] = mb_strtoupper($result[$upMap[$i]]);
    }

    return implode("", $result);
}

echo revertCharacters('Это прОсто, теСтовая!!! сТрока.');
