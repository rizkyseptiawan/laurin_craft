<?php

namespace App\Http\Controllers\User;

use App\Category;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

class CategoryController extends Controller
{
    /**
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::paginate(5);

        return view('user.category.index', compact('categories'));
    }

    /**
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('user.category.create');
    }

    /**
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
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        return view('user.category.edit', compact('category'));
    }

    /**
     * @param \Illuminate\Http\Request $request
     * @param \App\Category $category
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Category $category)
    {
        $request->validate([
            'name' => ['required', 'string', 'min:2', 'max:255'],
        ]);

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

        return redirect()->route('user.categories.edit', $category);
    }
}
