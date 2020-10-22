<?php

namespace MyBBApi\Models;

class Topic extends Model
{
	function PublicFacingData() {
		$data = new \stdClass;

		$data->id = $this->tid;
		$data->title = $this->subject;
		$data->slug = $this->slug;
		$data->author = $this->username; // TODO: turn this into a Member object

		return $data;
	}
}
