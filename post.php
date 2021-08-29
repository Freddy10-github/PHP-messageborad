<?php
$content = trim(file_get_contents("php://input"));
$decoded = json_decode($content, true);
$file = fopen("messageData.json", 'w');
// $json = json_encode($decoded,JSON_UNESCAPED_UNICODE);
$readySave = "{\"messages\":$decoded}";
fwrite($file,$readySave);
fclose($file);
?>