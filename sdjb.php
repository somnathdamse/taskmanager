<?php
$arra = array("vishal", array(0=>"som"), "king", array(1=>"Rana"));
$val=" ";
$op=array();
// print_r($arra);
foreach ($arra as $key=>$val)
{
    if (is_string($val)){
        $op[]=$val;
        // print_r($op);
    }
}
$o=implode(" ",$op);
echo $o;

// output:- vishal king
 ?>