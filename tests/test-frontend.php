<?php

class KSPMT_Frontend_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'KSPMT_Frontend') );
	}

	function test_class_access() {
		$this->assertTrue( ksp_mission_tracker()->frontend instanceof KSPMT_Frontend );
	}
}
