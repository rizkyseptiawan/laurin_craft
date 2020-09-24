<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::all();
        // return view
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.create_category');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'slug' => ['required', 'alpha_dash', 'min:2', 'max:50', 'unique:categories,slug'],
            'name' => ['required', 'string', 'min:2', 'max:255'],
        ]);
        $category = Category::create([
            'slug' => $request->slug,
            'name' => $request->name,
        ]);

        if ($category) {
            $request->session()->flash('alert', [
                'message' => 'Kategori berhasil ditambahkan',
                'type' => 'success',
            ]);
        } else {
            $request->session()->flash('alert', [
                'message' => 'Kategori gagal ditambahkan',
                'type' => 'danger',
            ]);
        }

        return redirect()->route('category.create');
    }

    /**
     * Display the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $category = Category::findOrFail($id);

        return view('admin.edit_category', compact('category'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param \Illuminate\Http\Request $request
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
        ]);
        $category = Category::findOrFail($id);
        $category->slug = $request->slug;
        $category->name = $request->name;

        if ($category->save()) {
            $request->session()->flash('alert', [
                'message' => 'Kategori berhasil diperbarui',
                'type' => 'success',
            ]);
        } else {
            $request->session()->flash('alert', [
                'message' => 'Kategori gagal diperbarui',
                'type' => 'danger',
            ]);
        }

        return redirect()->route('category.edit', ['id' =>$id]);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param int $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        // disable delete
    }
}
