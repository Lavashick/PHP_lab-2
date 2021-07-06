<?php

include_once 'StackNode.php';

class Stack {
    /** @var StackNode */
    private $head;
    /** @var int */
    private $size;

    public function __construct() {
        $this->size = 0;
        $this->head = null;
    }

    public function push($value) {
        $this->size++;
        $new_node = new StackNode($value, $this->head);
        $this->head = $new_node;
    }

    public function pop() {
        if ($this->size <= 0) return null;
        $this->size--;
        $node = $this->head;
        $this->head = $this->head->next;
        return $node->value;
    }

    public function top() {
        if ($this->size <= 0) return null;
        return $this->head->value;
    }

    public function size() {
        return $this->size;
    }
}
