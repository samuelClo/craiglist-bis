<?php

namespace App\Http\Controllers;

use App\Models\Article;
use App\Models\City;
use App\Models\Category;
use App\Models\SubCategory;

use Illuminate\Http\Request;


class ArticleController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {
        $city = City::where('slug', $request->city)->first();
        $category = Category::where('slug', $request->category)->first();
        if (!isset($request->subcategory))
        {
            return response()->json(
                Article::isPublished()
                ->where('city_id', $city->id)
                ->where('category_id', $category->id)
                ->with('images')
                ->get()
            );
        }

        $subcategory = SubCategory::where('slug', $request->subcategory)->first();

        return response()->json(
            Article::isPublished()
            ->where('city_id', $city->id)
            ->where('category_id', $category->id)
            ->where('sub_category_id', $subcategory->id)
            ->with('images')
            ->get()
        );
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function show($slug)
    {
        return response()->json(Article::isPublished()->where('slug', $slug)->with('images')->first());
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function edit(Article $article)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Article $article)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Article  $article
     * @return \Illuminate\Http\Response
     */
    public function destroy(Article $article)
    {
        //
    }
}
