<?php

namespace App\Http\Controllers;

use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;

class Controller extends BaseController
{
	protected $categories = [
		[
			'title' => 'category1',
			'text'  => 'some text'
		],
		[
			'title' => 'category2',
			'text'  => 'some text2'
		],
	];
	protected $news = [
		[
			'category_id' => 0,
			'title' => 'title 1'
		],
		[
			'category_id' => 1,
			'title' => 'title 2'
		],
	];
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;
}
