<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;



class ParserController extends Controller
{
    public function index()
	{
		$load = \XmlParser::load("https://news.yandex.ru/army.rss");
		$data = $load->parse([
			 'title' => [
			 	'uses' => 'channel.title'
			 ],
			'link' => [
				'uses' => 'channel.link'
			],
			'description' => [
				'uses' => 'channel.description'
			],
			'image' => [
				'uses' => 'channel.image.url'
			],
			'news' => [
				'uses' => 'channel.item[title,link,guid,description,pubDate]'
			]
		]);

		dd($data);
	}
}
