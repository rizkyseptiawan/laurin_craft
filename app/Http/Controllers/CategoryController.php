<?php

namespace App\Http\Controllers;

use App\Category;
use Illuminate\Http\Request;

class CategoryController extends Controller
{
    /**
    * @return \Illuminate\Http\Response
    */
    public function index()
    {
        $categories = Category::paginate(5);

        return view('admin.category', compact('categories'));
    }

    /**
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
            'name' => ['required', 'string', 'min:2', 'max:255'],
        ]);
        $category = Category::create([
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

        return redirect()->route('user.categories.create');
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

        return redirect()->route('user.categories.edit', ['id' => $id]);
    }
}
