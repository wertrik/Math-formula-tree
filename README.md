# Math-formula-tree



This is simple solution for algorithm task in PHP.
Defined mathematical formula e.g. A + B * (C + D) convert to the tree.

Solution containt procedural function drawTree() - use recursion.
Drawing of tree is not perfect, but it is sufficient for me :-)

Next contains Object node() [which implement interface] with method calculate().
Method calculate actually dont do mathematical operations - just show final leftNode + operator + rightNode.


Next steps:
- Implement formula parser - now is formula hardcoded into array.
- Implement mathematical methods for do real math operations.

Nice task!

Formula: A + B * C * (D + E) + F 
Formula tree:
```
[ + ]
/    \
/    (F)
[ + ]
/    \
(A)   \
[ * ]
/    \
(B)   \
[ * ]
/    \
(C)   \
[ + ]
/    \
(D)  (E) 
```
