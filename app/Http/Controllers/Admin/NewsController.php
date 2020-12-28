<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
	/**
	 *
	 */
	public function index()
	{
		$status = 1;
		return view('admin.news.index', [
			'news' => $this->news,
			'status'   => $status
		]);
	}

	/**
	 * @return string
	 */
	public function create(): string
	{
		return view('admin.news.create');
	}

	/**
	 * @param int $id
	 * @return string
	 */
	public function edit(int $id): string
	{
		return view('admin.news.edit');
	}
}
