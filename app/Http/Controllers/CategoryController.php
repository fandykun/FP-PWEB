<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Category;
use Illuminate\Support\Facades\Storage;

class CategoryController extends Controller
{
    // Only admin can edit
    public function __construct()
    {
        $this->middleware('auth')->except(['index', 'show']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $category = Category::all();
        // dd(Auth::user()->id);

        return view('category.index')->with('categories', $category);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('category.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        // Validate form (backend)
        $request->validate([
            "name" => "required|max:50",
            "coverCategory" => "image|nullable|max:2999"
        ]);

        // Handle file upload
        if ($request->hasFile('coverCategory')) {
            // Get filename w/ ext
            $filenameWithExt = $request->file('coverCategory')->getClientOriginalName();
            // Filename wo/ ext
            $filename = \pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Ext
            $ext = $request->file('coverCategory')->extension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'_'.$ext;
            // Upload
            $path = $request->file('coverCategory')->storeAs('public/coverCategories', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        Category::create([
            "name" => $request->name,
            "coverCategory" => $filenameToStore
        ]);

        return redirect('/category');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $categories = Category::findOrFail($id);
        $products = $categories->product()->get();

        return view('category.show')->with(['categories'=>$categories,'products'=>$products]);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);
        return view('category.edit')->with('category', $category);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        // Validate form (backend)
        $request->validate([
            "name" => "required|max:50",
            "coverCategory" => "image|nullable|max:2999"
        ]);

        // Handle file upload
        if ($request->hasFile('coverCategory')) {
            // Get filename w/ ext
            $filenameWithExt = $request->file('coverCategory')->getClientOriginalName();
            // Filename wo/ ext
            $filename = \pathinfo($filenameWithExt, PATHINFO_FILENAME);
            // Ext
            $ext = $request->file('coverCategory')->extension();
            // Filename to store
            $filenameToStore = $filename.'_'.time().'_'.$ext;
            // Upload
            $path = $request->file('coverCategory')->storeAs('public/coverCategories', $filenameToStore);
        } else {
            $filenameToStore = 'noimage.jpg';
        }

        $category = Category::findOrFail($id);
        $category->name = $request->name;
        if ($request->hasFile('coverCategory')) {
            $category->coverCategory = $filenameToStore;
        }

        $category->save();
        return redirect('/category');
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
