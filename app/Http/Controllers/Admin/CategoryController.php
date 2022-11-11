<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\CategoryRequest;
use App\Models\Category;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use PHPUnit\Exception;

class CategoryController extends Controller
{
    public function index()
    {
        return view('admin.category.index');

    }

    public function create()
    {

        return view('admin.category.create');
    }

    public function store(CategoryRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $data['image'] = Storage::disk('public')->put('/images', $data['image']);
            $data['status'] = $request->status == true ? '1' : '0';
            $category = Category::firstOrCreate($data);
            DB::commit();
            return redirect()->route('admin.category.index')->with('message', 'Category Added Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function edit(Category $category)
    {
        return view('admin.category.edit', compact('category'));
    }

    public function update(CategoryRequest $request, Category $category)
    {
        $data = $request->validated();


        try {
            DB::beginTransaction();
            if ($request->hasFile('image')) {
                $path = Storage::disk('public')->put('/images', $data['image']);
                if (File::exists($path)) {
                    File::delete($path);

                }
                $data['image'] = Storage::disk('public')->put('/images', $data['image']);
                $data['status'] = $request->status == true ? '1' : '0';
            }
            $category->update($data);
            DB::commit();
            return redirect()->route('admin.category.index')->with('message', 'Category Updated Successfully');

        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }
}
