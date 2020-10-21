<?php

namespace MyBBApi\Models;

class Member extends Model
{
	function PublicFacingData() {
		$data = new \stdClass;

		$data->id = $this->uid;
		$data->username = $this->username;
		$data->slug = $this->slug;
		$data->usertitle = $this->usertitle;

		return $data;
	}
}
