<?php

namespace MyBBApi\Models;

abstract class Model
{
	public function __construct( $args ) {
		foreach ($args as $key => $value) {
			$this->{$key} = $value;
		}
	}
}