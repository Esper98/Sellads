<?php
/*
 * Project: Sellads
 * File: app/Http/Controllers/Back/CategoryController.php
 * Author: Adam el Hassan & Esper van den Heuvel
 */
namespace App\Http\Controllers\Back;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;

use App\Category;

class CategoryController extends Controller
{
    public function __construct()
    {
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $data['categories'] = Category::All();
        return view('back.category.index')->with('data',$data);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {   
        $data['categories'] = Category::where('parent', NULL)->get();
        return view('back.category.create')->with('data',$data);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(CategoryRequest $categoryRequest)
    {
        $category = new category();
        $category->name = $categoryRequest['name'];
        $category->parent = $categoryRequest['subCategory'];
        $category->save();

        return redirect('/admin/categorieën')->with('success', 'Nieuw categorie is met succes toegevoegd.');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $categoriesWithParent = Category::where('parent', $id)->get();
        $data['categories'] = Category::where('parent', NULL)->where('name', '!=', $id)->get();
        $data['category'] = Category::where('name', $id)->get()->first();

        if(count($categoriesWithParent) != 0){
            $data['categories'] = array();
        }

        return view('back.category.edit', compact('data', 'id'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(CategoryRequest $categoryRequest, $id)
    {
        $category = Category::where('name', $id)->get()->first();

        $category->name = $categoryRequest['name'];
        $category->parent = $categoryRequest['subCategory'];

        $category->update();

        return redirect('/admin/categorieën')->with('success', 'Categorie is met succes gewijziged.');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $category = Category::where('name', $id)->delete();
        return redirect('/admin/categorieën')->with('success', 'Categorie is met succes Verwijderd.');
    }
}
