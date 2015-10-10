<?php 
function check($str)
{
		
for ($i=0; $i<strlen($str); $i++){
   if ($str[$i]=="`"){
       $str[$i]='';
   }

}
 return $str;
}
$far="CAFE`";	
$far=check($far);
echo $far;
 ?>