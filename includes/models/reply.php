<?php

class Reply
{
	
	function __construct( $args ) {
		foreach ($args as $key => $value) {
			$this->{$key} = $value;
		}
	}
}
