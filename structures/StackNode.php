<?php

class StackNode {
    /** @var StackNode */
    public $next;
    public $value;

    public function __construct($value, $next) {
        $this->next = $next;
        $this->value = $value;
    }
}
