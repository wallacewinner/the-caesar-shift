<?php
//The Caesar Shift
//@author: Wallace Winner
//04-2020

require "./vendor/autoload.php";

use GuzzleHttp\Client;

function caesar_shift($text_cript, $factor){
    //array with letter of alphabet
    $alphabet = ['A','B','C','D','E','F','G','H','I','J','K','L','M','N','O','P','Q','R','S','T','U','V','W','X','Y','Z'];
    //explode the text and set like a array
    $pieces = str_split(strtoupper($text_cript));
    //var with the descrypted text
    $decrypted = null; 

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

    return  $decrypted ; // show thre result
}

function request($type, $uri){
    //get the content of json auth
    $file_auth = file_get_contents("auth.json");
    $json_decode_auth =  json_decode($file_auth);
    $token = $json_decode_auth->token;

    //create the client
    $client = new Client([
        'base_uri' => 'https://api.codenation.dev/v1/challenge/dev-ps/',
        'http_errors' => false,
        'header' => ['User-Agent' => 'Mozilla/5.0 (Macintosh; Intel Mac OS X 10_14_5) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/75.0.3770.80 Safari/537.36 OPR/62.0.3331.18']
    ]);

    if ($type == 'POST') {
        $request = $client->request($type, $uri.'?token='.$token,[
            'multipart' => [
                [
                    'name'     => 'answer',
                    'contents' => fopen('answer.json', 'r')
                ]
            ],
        ]);
    }else {
       //do the request
        $request = $client->request($type, $uri.'?token='.$token,[
            'read_timeout' => 10,
        ]);
    }
    
    
    return ($request);
}

echo "Start...".PHP_EOL;
/*this block is responsible for the 
/capture of the data from API and 
/saves it on Json file.*/
echo "Doing the request...".PHP_EOL;
$file_name = "answer.json";
$get_file_answer = request('GET', 'generate-data');
$fp = fopen($file_name, 'w');
fwrite($fp, $get_file_answer->getBody());
fclose($fp);


//get the content of json answer
$file_answer = file_get_contents($file_name);
$json_decode_answer =  json_decode($file_answer) ;

//take the text
$text_cript = $json_decode_answer->cifrado;
//factor is the element to find the response
$factor = $json_decode_answer->numero_casas;

//run the function to decrypt
echo "Decrypting...".PHP_EOL;
$decrypted = (caesar_shift($text_cript,$factor));

//add the result to key from file answer
$json_decode_answer->decifrado = $decrypted;
$json_decode_answer->resumo_criptografico = sha1($decrypted);
//save the file answer
echo "Saving...".PHP_EOL;
file_put_contents($file_name, json_encode($json_decode_answer));

/*this block is responsible for the 
/send the data.*/
echo "sending...".PHP_EOL;
$file_name_response = "response.json";
$get_file_response = request('POST', 'submit-solution');
$fp = fopen($file_name_response, 'w');
fwrite($fp, $get_file_response->getBody());
fclose($fp);

print_r ("Done".PHP_EOL);





