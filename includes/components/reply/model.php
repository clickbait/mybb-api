<?php

namespace MyBBApi\Models;

class Reply extends Model
{
	function PublicFacingData() {
		$data = new \stdClass;

		$data->id = $this->pid;
		$data->message = $this->message;
		$data->author = $this->username; // TODO: turn this into a Member object

		return $data;
	}
}
