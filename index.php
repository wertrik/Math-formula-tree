<?php

include 'INode.php';
include 'node.php';


// ((A + (B * (C * (D + E)))) + F)

$nodes = [
    "+" => ["right" => "F", "left" => ["+" => ["left" => "A", "right" => [ "*" => ["left" => "B", "right" => ["*" => ["left" => "C", "right" => ["+" => ["left" => "D", "right" => "E"]]]]]]]]]
];

function drawTree($nodes) {
    
    if (is_array($nodes)) {
        
        $key = array_key_first($nodes);

        if ($key != "right" && $key != "left") {

            echo "[ ".$key." ]<br />";
            echo " / &nbsp;&nbsp; \ <br />";

            if (is_array($nodes[$key]["left"])) {
                echo "/ ";
            } else {
                echo "(". $nodes[$key]["left"]. ")";            
            }                

            if (is_array($nodes[$key]["right"])) {            
                echo "&nbsp; &nbsp; &nbsp; \  <br />";            
            } else {
                echo "&nbsp; &nbsp; &nbsp;(". $nodes[$key]["right"]. ")  <br />";            
            }    

            drawTree($nodes[$key]["right"]);

            drawTree($nodes[$key]["left"]);
            
        }
        
    }
    
    
}

echo "<strong>Formula: A + B * C * (D + E) + F </strong><br />";

print_r($nodes);

echo "<br /><br /><div style=\"width:200px; border: 1px solid #000000;text-align: center\">"
. "Formula tree<br /> <br />";

drawTree($nodes);

echo "</div><br />";

echo "Formula rebuild: ";

$node = new node($nodes);
echo $node->calculate();


/*
 * 
 * Assignment 2
 * 
 */

// ((A + (B * (C * (D + E)))) + (F + Y))


echo "<br /> <br /><strong>Formula: A + B * C * (D + E) + (F + Y)</strong><br />";

$nodes = [
    "+" => ["right" => ["+" => ["left" => "F", "right" => "Y"]], "left" => ["+" => ["left" => "A", "right" => [ "*" => ["left" => "B", "right" => ["*" => ["left" => "C", "right" => ["+" => ["left" => "D", "right" => "E"]]]]]]]]]
];

print_r($nodes);

echo "<br /><br /><div style=\"width:200px; border: 1px solid #000000;text-align: center\">"
. "Formula tree<br /> <br />";

drawTree($nodes);

echo "</div><br />";

echo "Formula rebuild:<br />";

$node = new node($nodes);
echo $node->calculate();