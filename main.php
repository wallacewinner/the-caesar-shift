<?php
//The Caesar Shift
//@author: Wallace Winner
//04-2020

//text that user insert
//TO DO ask to user insert text
$text_cript = "D OLJHLUD UDSRVD PDUURP VDOWRX VREUH R FDFKRUUR FDQVDGR 23 CHCH 1d.d";
//array with letter of alphabet
$alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
//explode the text and set like a array
$pieces = str_split(strtoupper($text_cript));
//var with the descrypted text
$decrypted = []; 

//print the encrypted text
print_r (strtoupper($text_cript));

for ($i=0; $i <= count($pieces); $i++) { 

    if (in_array($pieces[$i], $alphabet)){
        $key_alphabet = (array_search($pieces[$i], $alphabet));
        $key_alphabet_discripto = $key_alphabet - 3;

        switch ($key_alphabet_discripto) {
            case '-3':
                print_r ("X");
                break;
            case '-2':
                print_r ("Y");
                break;
            case '-1':
                print_r ("Z");
                break;
            default:
                print_r ($alphabet[$key_alphabet_discripto]);
                break;
        }
        
    }else{
        print_r ($pieces[$i]);
    }
    
}


