<?php
$a=array(100,100);

$c=0;
for($i=0;$i<=(sizeof($a)-1);$i++)
{
    if ($i==0){
        $c =$a[$i]; 
    }
    elseif ($i%2==0){
        $c = $c + $a[$i];
    }

    else{
         $c=$c-$a[$i];
        }
}
echo $c;
?>