<?php
//The Caesar Shift
//@author: Wallace Winner
//04-2020

//text that user insert
//TO DO ask to user insert text
$text_cript = "vjcv jctfna gxgt jcrrgpu \"ku cpqvjgt yca qh ucakpi \"kv jcrrgpu\". fqwincu etqemhqtf";
//array with letter of alphabet
$alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
//explode the text and set like a array
$pieces = str_split(strtoupper($text_cript));
//var with the descrypted text
$decrypted; 
//factor is the element to find the response
$factor = 2;

//print the encrypted text
print_r (strtoupper($text_cript).PHP_EOL);

for ($i=0; $i <= count($pieces); $i++) { 

    if (in_array($pieces[$i], $alphabet)){
        $key_alphabet = (array_search($pieces[$i], $alphabet));
        $key_alphabet_discrypted = $key_alphabet - $factor;

        switch ($key_alphabet_discrypted) {
            case '-3':
                $decrypted .= "X";
                break;
            case '-2':
                $decrypted .= "Y";
                break;
            case '-1':
                $decrypted .= "Z";
                break;
            default:
                $decrypted .= ($alphabet[$key_alphabet_discrypted]);
                break;
        }
        
    }else{
        $decrypted .= ($pieces[$i]);
    }
    
}

print_r ( $decrypted );



