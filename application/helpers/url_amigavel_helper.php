<?php //URL AMIGAVEM
function url_amigavel($variavel){
	$procurar 	= array('à','ã','â','é','ê','í','ó','ô','õ','ú','ü','ç',);
	$substituir = array('a','a','a','e','e','i','o','o','o','u','u','c',);
	$variavel = strtolower($variavel);
	$variavel	= str_replace($procurar, $substituir, $variavel);
	$variavel = htmlentities($variavel);
  	$variavel = preg_replace("/&(.)(acute|cedil|circ|ring|tilde|uml);/", "$1", $variavel);
  	$variavel = preg_replace("/([^a-z0-9]+)/", "-", html_entity_decode($variavel));
  	
  	return trim($variavel, "-");

}

function SKU_gen($string = 'GE', $id = null, $l = 2){
    $results = ''; // empty string
    $vowels = array('a', 'e', 'i', 'o', 'u', 'y'); // vowels
    preg_match_all('/[A-Z][a-z]*/', ucfirst($string), $m); // Match every word that begins with a capital letter, added ucfirst() in case there is no uppercase letter
    foreach($m[0] as $substring){
        $substring = str_replace($vowels, '', strtolower($substring)); // String to lower case and remove all vowels
        $results .= preg_replace('/([a-z]{'.$l.'})(.*)/', '$1', $substring); // Extract the first N letters.
    }
    $results .= '-'. str_pad($id, 4, 0, STR_PAD_LEFT); // Add the ID
    return $results;
}