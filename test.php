<?php
echo 123;
$filename = "messageData.json";
		// $originMessage = json_decode(fread( $file, $filesize),TRUE);
function renderMessage(){
  global $filename;
  // $file = fopen( $filename, "r");
  // $filesize = filesize( $filename );
  // $originMessage = json_decode(fread( $file, $filesize+1 ),TRUE)["messages"];
  // // $messages = ($test["messages"]);
  // // $new = [
  // //   "name"=>"羅國豐",
  // //   "nickName"=>"Freddy",
  // //   "Email"=>"a0983330053@gmail.com",
  // //   "CreateTime"=>"2021-08-28 12:33"
  // // ];
  // // $originMessage[]=$new;
  // // $file = fopen($filename, 'w');
  // // $json = json_encode($originMessage,JSON_UNESCAPED_UNICODE);
  // // $readySave = "{\"messages\":$json}";
  // // fwrite($file,$readySave);
	// fclose($file);
  

  print_r ($data);





  
}
renderMessage();
?>