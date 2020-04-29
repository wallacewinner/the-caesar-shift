<?php
//The Caesar Shift
//@author: Wallace Winner
//04-2020

//text that user insert
//TO DO ask to user insert text
$text_cript = "D OLJHLUD UDSRVD PDUURP VDOWRX VREUH R FDFKRUUR FDQVDGR 23 CHCH 1d.d  AA BB CC ZZ";
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

        if ($key_alphabet_discrypted < 0){
            $decrypted .= ( $alphabet[$key_alphabet_discrypted + count($alphabet)]);
        }else {
            $decrypted .= ($alphabet[$key_alphabet_discrypted]);
        }
        
    }else{
        $decrypted .= ($pieces[$i]);
    }
    
}

print_r ( $decrypted );



