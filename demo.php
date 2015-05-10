<?php
$arr = array();

for ($i=1; $i<=6; $i++) {
   $obj = new stdClass();
   $obj->s="sid".$i;
   $obj->u="uri".$i;
   $obj->t=$_GET["s"]." t".$i;
   if ($i % 3 == 0) {
      $obj->o="entity";
   } else if ($i % 3 == 1) {
      $obj->o="category";
   } else {
      $obj->o="attribute";
   }
   $arr[] = $obj;
}

# JSON-encode the response
$json_response = json_encode($arr);

# Optionally: Wrap the response in a callback function for JSONP cross-domain support
if($_GET["callback"]) {
    $json_response = $_GET["callback"] . "(" . $json_response . ")";
}

# Return the response
echo $json_response;

?>
