<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
	/**
	 * @return string
	 */
	public function index(): string
	{
		return "Список новостей";
	}

	/**
	 * @return string
	 */
	public function create(): string
	{
		$id = mt_rand(1,100);
		$slug = \Str::slug('Просто текст', "_");

		return redirect()->route('news.edit',  ['slug' => $slug, 'id' => $id]);
	}

	/**
	 * @param string $slug
	 * @param int $id
	 * @return string
	 */
	public function edit(string $slug, int $id): string
	{
		//$title = "Какойто слаг для сайта";
		//$slug = \Str::slug($title);
		return "Редактировать новость Slug {$slug} #ID {$id} <br>" . $slug;
	}
}
