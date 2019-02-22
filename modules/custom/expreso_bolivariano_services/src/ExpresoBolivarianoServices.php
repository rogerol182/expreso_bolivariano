<?php
/**
* @file providing the all services that we need in te Drupal Site'.
*
*/
namespace  Drupal\expreso_bolivariano_services;

class ExpresoBolivarianoServices {
	
	protected $say_something;
	
	public function __construct() {
		$this->say_something = 'Hello World!';
	}
	
	public function sayHello($name = '') {
		if (empty($name)) {
			return $this->say_something;
		}
		else {
			return "Hello " . $name . "!";
		}
	}
}