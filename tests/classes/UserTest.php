<?php
namespace App\Tests;
require 'vendor'.DIRECTORY_SEPARATOR.'autoload.php';

use PHPUnit\Framework\TestCase;
use App\User;
use PHPUnit_Extensions_Database_TestCase;

class UserTest extends PHPUnit_Extensions_Database_TestCase {

	/**
     * This is the object that will be tested
     * @var DataPump
     */
    protected $object;
    
    /**
     * only instantiate pdo once for test clean-up/fixture load
     * @var PDO
     */
    static private $pdo = null;

    /**
     * only instantiate PHPUnit_Extensions_Database_DB_IDatabaseConnection once per test
     * @var type 
     */
    private $conn = null;

	protected function getConnection()
    {
        if ($this->conn === null) {
            if (self::$pdo == null) {
                self::$pdo = new \PDO('mysql:dbname=job;host=localhost', 'root', '');;
            }
            $this->conn = $this->createDefaultDBConnection(self::$pdo, '');
        }
        return $this->conn;
    }

	protected function getDataSet()
    {
        return $this->createFlatXmlDataSet(__DIR__ . '/job.xml');
    }

	public function testLoginFail(){

		$sql = "select * from user_tbl where username = 'manish' and password= 'test'";
		$user = new User();
		$result = $user->login($sql);

		$this->assertEquals(false, $result);

	}

	public function testLoginSuccess(){

		$sql = "select * from user_tbl where username = 'manish' and password= 'manish'";
		$user = new User();
		$result = $user->login($sql);

		$this->assertEquals((object)[
			'id' => 7,
			'first_name' => 'manish',
			'second_name' => 'shrestha',
			'username' => 'manish',
			'password' => 'manish',
			'email' => 'manishrestha529@gmail.com',
			'address' => 'Kathmandu',
			'country' => 'Nepal',
			'user_type' => 'Job Seeker',
		], $result);

	}

	public function testLists(){
		$user = new User();
		$result = $user->lists();
		$expectedData = $this->getDataSet();

		$this->assertEquals($expectedData, $result);
	}


}