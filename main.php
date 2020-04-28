<?php
//cripto Júlio Cesar
//@author: Wallace Winner
//04-2020

//text that user insert
//TO DO ask to user insert text
$text = "a ligeira raposa marrom saltou sobre o cachorro cansado 23 ZEZE";
$text_cript = "D OLJHLUD UDSRVD PDUURP VDOWRX VREUH R FDFKRUUR FDQVDGR 23 CHCH";

//array with letter of alphabetic
$alphabetic = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];

//echo strtoupper($text. PHP_EOL);

$pieces = str_split(strtoupper($text_cript));

echo "iniciando". PHP_EOL;

echo "cripto".PHP_EOL;
print_r (strtoupper($text_cript));

echo PHP_EOL."descripto".PHP_EOL;
for ($i=0; $i <= count($pieces); $i++) { 

    if (in_array($pieces[$i], $alphabetic)){
        $key_alphabetic = (array_search($pieces[$i], $alphabetic));
        $key_alphabetic_discripto = $key_alphabetic - 3;

        switch ($key_alphabetic_discripto) {
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
                print_r ($alphabetic[$key_alphabetic_discripto]);
                break;
        }
        
    }else{
        print_r ($pieces[$i]);
    }
    
}

echo PHP_EOL."finalizado". PHP_EOL;
