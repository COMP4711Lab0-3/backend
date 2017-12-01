<?php

require_once APPPATH . 'core/Entity.php';
/* Represents a single task */
class Task extends Entity {

    public $task;
    public $priority;
    public $size;
    public $group;

    public function setTask($value) {
        if (!is_int($value) && (bool) preg_match('/^[A-Z0-9 ]+$/i', $value) && 64 >= mb_strlen($value) && !empty($value)) {
            $this->task = $value;
        }
    }
    public function setPriority($value) {
        if (is_int($value) && 0 < $value && $value < 5) {
            $this->priority = $value;
        }
    }
    public function setSize($value) {
        if (is_int($value) && 0 < $value && $value < 5) {
            $this->size = $value;
        }
    }
    public function setGroup($value) {
        if (is_int($value) && 0 < $value && $value < 6) {
            $this->group = $value;    
        }
    }
    public function getTask() {
        return $this->task;
    }
    public function getPriority() {
        return $this->priority;
    }
    public function getSize() {
        return $this->size;
    }
    public function getGroup() {
        return $this->group;
    }
}