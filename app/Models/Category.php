<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = "categories";

    public function getAllCategories(): array
	{
		return \DB::table($this->table)->select(['id', 'title'])->get()->toArray();
	}
}