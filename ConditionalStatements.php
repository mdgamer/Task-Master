<?php
$a=10;
$b=16;
if($a==$b){
echo "Both are Equal";	
}
else if($a<$b){
echo "B is Greater<br>";
}
else{
echo "Both are not Equal";
}

$n1='10';
$n2=10;
if($n1==$n2){
echo "Both are Equal";	
}
else{                                       //Here the answer will be equal as php will take string and int value as equal even if they are not of the same type
echo "N1 and N2 are not equal";
}
echo "<br>";
if($n1===$n2){
echo "Both are Equal";	
}                                         //Here the answer will be not equal as php will check if they are of the  same type or not
else{
echo "N1 and N2 are not equal";
}
?>


