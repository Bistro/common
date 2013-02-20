<?php

class HashTest extends PHPUnit_Framework_TestCase
{
	public $hash;

	public function setUp()
	{
		$this->hash = new \Bistro\Hash(array(
			'name' => "Dave",
			'editor' => 'Sublime Text 2'
		));
	}

	public function testLength()
	{
		$this->assertSame(2, $this->hash->length());
	}

	public function testSetGetHasLoop()
	{
		$this->hash->set('scheme', 'Blackboard');
		$this->assertTrue($this->hash->has('scheme'));
		$this->assertSame('Blackboard', $this->hash->get('scheme'));
	}

	public function testDelete()
	{
		$this->hash->delete('editor');
		$this->assertFalse($this->hash->has('editor'));
	}

	public function testMerge()
	{
		$this->hash->merge(array(
			'scheme' => 'Blackboard',
			'indentation' => 'tabs'
		));

		$this->assertSame(4, $this->hash->length());
	}

	public function testReplace()
	{
		$this->hash->replace(array(
			'replaced' => true
		));

		$this->assertSame(1, $this->hash->length());
	}

	public function testClear()
	{
		$this->hash->clear();
		$this->assertSame(0, $this->hash->length());
	}

	public function testToArray()
	{
		$this->assertSame(array(
			'name' => "Dave",
			'editor' => "Sublime Text 2"
		), $this->hash->toArray());
	}

	public function testToJSON()
	{
		$json = '{"name":"Dave","editor":"Sublime Text 2"}';
		$this->assertSame($json, $this->hash->toJSON());
	}

}
