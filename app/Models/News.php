<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $table = "news";

    public function getAllNews(): array
	{
		 return \DB::table($this->table)
			 ->join('categories', 'news.category_id', '=', 'categories.id')
			 /*->where([
			 	['news.id', '>', 2],
				['news.slug',  'like', '%pt%']
			 ])
			 ->orWhere('news.title', 'like', '%ka%')*/
			 ->whereNotIn('news.id', [4,5,6,7])
			 ->select('news.*', 'categories.title as category_title')
			 ->get()->toArray();
	}
	public function getNews(int $id)
	{
		return \DB::table($this->table)->find($id);
	}
}
