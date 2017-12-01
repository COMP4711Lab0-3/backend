<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class TaskListTest extends PHPUnit_Framework_TestCase{

    private $CI;
    private $task;

    public function setUp() {
      // Load CI instance normally
      $this->CI = &get_instance();
      $this->task = new Task;
    }

    public function testIncompleteTasks() {
        $data = (new Tasks())->all();
        $total = count($data);
        $incomplete = 0;
        foreach($data as $item){
            if($item->status != 2){
                $incomplete++;
            }
        }
        $this->assertGreaterThan($total - $incomplete, $incomplete);
    }
}