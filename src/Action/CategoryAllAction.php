<?php


namespace Aleksandr\Action;

use Aleksandr\Model\Category;
use GuzzleHttp\Psr7\ServerRequest;

class CategoryAllAction
{
    public function __invoke(ServerRequest $request)
    {
        $categories = Category::all();
        return view('category-all', ['categories' => $categories]);
    }
}