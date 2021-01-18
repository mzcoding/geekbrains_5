<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Category;
use App\Models\News;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
		$status = 1;
		$news = (new News())->getAllNews();


		return view('admin.news.index', [
			'newsList' => $news,
			'status'   => $status
		]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
    	$categories = (new Category())->getAllCategories();
		return view('admin.news.create', ['categories' => $categories]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
    	$request->validate([
    		'title' => 'required|string|min:3'
		]);

        $data = $request->except('_token');
		$saveFile = function(array $data) {
			$responseData = [];
			$fileNews = storage_path('app/news.txt');
			if(file_exists($fileNews)) {
				$file = file_get_contents($fileNews);
				$response = json_decode($file, true);
			}


			$responseData[] = $data;
			if(isset($response) && !empty($response)) {
				$r = array_merge($response, $responseData);
			}else {
				$r = $responseData;
			}
			file_put_contents($fileNews, json_encode($r));
		};

		$saveFile($data);
        return redirect()->route('news.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(int $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function edit(int $id)
    {
    	$news = (new News())->getNews($id);
    	if(!$news) {
    		 return abort(404);
		}
		$categories = (new Category())->getAllCategories();
		return view('admin.news.edit', [
			'categories' => $categories,
			'news' => $news
		]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, int $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
