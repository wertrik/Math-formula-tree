<?php


class node implements INode {
    
    public function __construct(private array $tree) {
        
    }

    public function calculate() {
        
        if (is_array($this->tree)) {
            
            $operator = array_key_first($this->tree);
            
            if ($operator != "right" && $operator != "left") {
                
                $rightChild = $this->getChild($this->tree[$operator]["right"]);
                $leftChild = $this->getChild($this->tree[$operator]["left"]);

                return " (".$leftChild ." ".$operator." ".$rightChild.")";
                
            }
            
        }
        
    }
    
    private function getChild($child) {
        
            if (is_array($child)) {
                
                $node = new node($child);
                return $node->calculate();
                
            } else {
                return $child;
            }
        
    }
    
    
}
