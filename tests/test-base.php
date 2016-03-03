<?php

class BaseTest extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'KSP_Mission_Tracker') );
	}
	
	function test_get_instance() {
		$this->assertTrue( ksp_mission_tracker() instanceof KSP_Mission_Tracker );
	}
}
