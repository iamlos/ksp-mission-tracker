<?php

class KSPMT_Mission_Test extends WP_UnitTestCase {

	function test_sample() {
		// replace this with some actual testing code
		$this->assertTrue( true );
	}

	function test_class_exists() {
		$this->assertTrue( class_exists( 'KSPMT_Mission') );
	}

	function test_class_access() {
		$this->assertTrue( ksp_mission_tracker()->mission instanceof KSPMT_Mission );
	}

  function test_cpt_exists() {
    $this->assertTrue( post_type_exists( 'kspmt-mission' ) );
  }
}
