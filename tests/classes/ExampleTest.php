<?php
namespace App\Tests;
require 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
use App\Example;

class ExampleTest extends TestCase {
	
	public function testAdd(){

		$example = new Example();
		$result = $example->add(2, 3);
		$this->assertEquals(5, $result); 

	}

}