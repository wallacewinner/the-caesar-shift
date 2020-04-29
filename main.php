<?php
//The Caesar Shift
//@author: Wallace Winner
//04-2020


//get the content of json
$file = file_get_contents("answer.json");
$json_decode =  json_decode($file) ;

//text that user insert
//TO DO ask to user insert text
$text_cript = $json_decode->cifrado;
//array with letter of alphabet
$alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
//explode the text and set like a array
$pieces = str_split(strtoupper($text_cript));
//var with the descrypted text
$decrypted; 
//factor is the element to find the response
$factor = $json_decode->numero_casas;





//print the encrypted text
print_r (strtoupper($text_cript).PHP_EOL);

//logical to caesar shift
for ($i=0; $i <= count($pieces); $i++) { //determine how many loops will be

    if (in_array($pieces[$i], $alphabet)){ //search the key in the alphabetic array
        $key_alphabet = (array_search($pieces[$i], $alphabet)); //determine the key at in the alphabetic array
        $key_alphabet_discrypted = $key_alphabet - $factor;//apply the factor on the alphabetic' key to find the real letter

        if ($key_alphabet_discrypted < 0){//when the result is negative it determine the letter
            $decrypted .= ( $alphabet[$key_alphabet_discrypted + count($alphabet)]); 
        }else {//if not it follow the flow
            $decrypted .= ($alphabet[$key_alphabet_discrypted]);
        }
        
    }else{//when the character is not found, it is part of the text semantics and is inserted directly
        $decrypted .= ($pieces[$i]); 
    }
    
}

print_r ( $decrypted ); // show thre result



/*TO DO
transform the logical of Caesar in function;
make a function to capture the file json;
make a function to crypto the answer
make a function to send the response;
*/
