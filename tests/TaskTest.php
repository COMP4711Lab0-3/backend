<?php

if (! class_exists('PHPUnit_Framework_TestCase')) {
    class_alias('PHPUnit\Framework\TestCase', 'PHPUnit_Framework_TestCase');
}

class TaskTest extends PHPUnit_Framework_TestCase {

    private $CI;
    private $task;

    public function setUp() {
      // Load CI instance normally
      $this->CI = &get_instance();
      $this->task = new Task;
    }

    // task tests

    public function testTaskMaxLength65(){
      $value = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
      $this->task->setTask($value);
      $this->assertNotSame($this->task->task, $value);
    }

    public function testTaskMaxLength64(){
      $value = "aaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaaa";
      $this->task->setTask($value);
      $this->assertSame($this->task->task, $value);
    }

    public function testTaskEmpty(){
      $value = "";
      $this->task->setTask($value);
      $this->assertNotSame($this->task->task, $value);
    }

    public function testTaskString(){
      $value = "Task";
      $this->task->setTask($value);
      $this->assertSame($this->task->task, $value);
    }

    public function testTaskStringSpace(){
      $value = "Task Creation";
      $this->task->setTask($value);
      $this->assertSame($this->task->task, $value);
    }

    public function testTaskStringInt(){
      $value = "2";
      $this->task->setTask($value);
      $this->assertSame($this->task->task, $value);
    }

    public function testTaskInt(){
      $value = 2;
      $this->task->setTask($value);
      $this->assertNotSame($this->task->task, $value);
    }

    // priority tests

    public function testPriorityString(){
      $value = "priority";
      $this->task->setPriority($value);
      $this->assertNotSame($this->task->priority, $value);
    }

    public function testPriorityIntInRangeMin(){
      $value = 1;
      $this->task->setPriority($value);
      $this->assertSame($this->task->priority, $value);
    }

    public function testPriorityIntInRangeMax(){
      $value = 4;
      $this->task->setPriority($value);
      $this->assertSame($this->task->priority, $value);
    }

    public function testPriorityIntOutOfRangeAbove(){
      $value = 5;
      $this->task->setPriority($value);
      $this->assertNotSame($this->task->priority, $value);
    }

    public function testPriorityIntOutOfRangeBelow(){
      $value = 0;
      $this->task->setPriority($value);
      $this->assertNotSame($this->task->priority, $value);
    }

    public function testPriorityDouble(){
      $value = 2.0;
      $this->task->setPriority($value);
      $this->assertNotSame($this->task->priority, $value);
    }

    // size tests

    public function testSizeString(){
      $value = "Size";
      $this->task->setSize($value);
      $this->assertNotSame($this->task->size, $value);
    }

    public function testSizeIntInRangeMin(){
      $value = 1;
      $this->task->setSize($value);
      $this->assertSame($this->task->size, $value);
    }

    public function testSizeIntInRangeMax(){
      $value = 4;
      $this->task->setSize($value);
      $this->assertSame($this->task->size, $value);
    }

    public function testSizeIntOutOfRangeAbove(){
      $value = 5;
      $this->task->setSize($value);
      $this->assertNotSame($this->task->size, $value);
    }

    public function testSizeIntOutOfRangeBelow(){
      $value = 0;
      $this->task->setSize($value);
      $this->assertNotSame($this->task->size, $value);
    }

    public function testSizeDouble(){
      $value = 2.0;
      $this->task->setSize($value);
      $this->assertNotSame($this->task->size, $value);
    }

    // group tests

    public function testGroupString(){
      $value = "Group";
      $this->task->setGroup($value);
      $this->assertNotSame($this->task->group, $value);
    }

    public function testGroupIntInRangeMin(){
      $value = 1;
      $this->task->setGroup($value);
      $this->assertSame($this->task->group, $value);
    }

    public function testGroupIntInRangeMax(){
      $value = 5;
      $this->task->setGroup($value);
      $this->assertSame($this->task->group, $value);
    }

    public function testGroupIntOutOfRangeAbove(){
      $value = 6;
      $this->task->setGroup($value);
      $this->assertNotSame($this->task->group, $value);
    }

    public function testGroupIntOutOfRangeBelow(){
      $value = 0;
      $this->task->setGroup($value);
      $this->assertNotSame($this->task->group, $value);
    }

    public function testGroupDouble(){
      $value = 2.0;
      $this->task->setGroup($value);
      $this->assertNotSame($this->task->group, $value);
    }
}