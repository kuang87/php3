<?php

namespace Aleksandr\Action;


use Aleksandr\Model\Category;
use GuzzleHttp\Psr7\ServerRequest;

class CategoryGetAction
{
    public function __invoke(ServerRequest $request)
    {
        $category = Category::find($request->getAttribute('id'));

        return view('category-get', ['category' => $category]);
    }
}