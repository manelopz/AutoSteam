<?php

$validFunctions = array("hello","anotherF");

$functName = $_REQUEST['f'];
if(in_array($functName,$validFunctions))
{
    $$functName();
}else{
    echo "You don't have permission to call that function so back off!";
    exit();
}

function hello()
{
    echo "bye bye";
}

function anotherF()
{
    echo "the other funct";
}

function noTouch()
{
    echo "can't touch this!";
}
?>