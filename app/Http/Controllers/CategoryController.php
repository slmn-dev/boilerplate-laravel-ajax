<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
         //ambil semua data category
        $categories = Category::latest()->paginate(10);
   
        //return view dengan data
        return view('pages.cms.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validator = Validator::make($request->all(), [
            'name'     => 'required|unique:categories,name|max:255',
        ]);

        //check if validation fails
        if ($validator->fails()) {
            return response()->json([
                'errors' => $validator->errors()], 422
            );
        }

        //create post
        $category= Category::create([
            'name'     => $request->name, 
        ]);

        //return response
        return response()->json([
            'success' => true,
            'message' => 'Data Berhasil Disimpan!',
            'data'    => [
                            'id'         => $category->id,
                            'name'       => $category->name,
                            'created_at' => $category->created_at->diffForHumans()
                        ] 
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Category $category)
    {
        return response()->json([
        'success' => 'true',
        'message' => 'detail data category',
        'data' => $category
         ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    
public function update(Request $request, Category $category)
{
    $validator = Validator::make($request->all(), [
        'name' => [
            'required',
            'max:255',
            Rule::unique('categories', 'name')->ignore($category->id),
        ]
    ]);

    if ($validator->fails()) {
        return response()->json([
            'errors' => $validator->errors()
        ], 422);
    }

    $category->update([
        'name' => $request->name
    ]);

    return response()->json([
        'success' => true,
        'message' => 'Data berhasil diupdate!',
        'data' => $category
    ]);
}

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
