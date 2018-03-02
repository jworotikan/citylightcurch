<?php


/*===============================
    Parse PDF with Tika
================================*/

function tika($file)
{

  // Set where to connect to
  //$ch = curl_init("http://localhost:9998/tika");
  //$ch = curl_init("ec2-54-179-130-81.ap-southeast-1.compute.amazonaws.com:9998/tika");
  //$ch = curl_init("http://ec2-54-255-219-124.ap-southeast-1.compute.amazonaws.com:9998/tika");
  $ch = curl_init("http://182.23.57.162:9998/tika");


  // Request will be a PUT
  curl_setopt($ch, CURLOPT_PUT, 1);

  // Set the file to send
  $file_path_str = $file;
  $fh_res = fopen($file_path_str, 'r');

  curl_setopt($ch, CURLOPT_INFILE, $fh_res);
  curl_setopt($ch, CURLOPT_INFILESIZE, filesize($file_path_str));
  curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

  // Send the request
  $curl_response_res = curl_exec ($ch);
  $curl_response_res = trim(addslashes($curl_response_res));
  fclose($fh_res);

  // Do something with the result
  //echo "<p>Tika says:</p>";
  //echo '<pre>'; print_r($curl_response_res); echo '</pre>';die;
  //echo "<pre>" + $curl_response_res + "</pre>";

  return $curl_response_res;
}

?>