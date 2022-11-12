<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\ColorRequest;
use App\Models\Color;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ColorController extends Controller
{
    public function index()
    {
        $colors = Color::all();
        return view('admin.color.index', compact('colors'));
    }

    public function create()
    {
        return view('admin.color.create');
    }

    public function store(ColorRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $data['status'] = $request->status == true ? 1 : 0;
            $color = Color::firstOrCreate($data);
            DB::commit();
            return redirect()->route('admin.color.index')->with('message', 'Color Added Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function edit(Color $color)
    {
        return view('admin.color.edit', compact('color'));
    }

    public function update(ColorRequest $request, Color $color)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $data['status'] = $request->status == true ? 1 : 0;
            $color->update($data);
            DB::commit();
            return redirect()->route('admin.color.index')->with('message', 'Color Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function destroy(Color $color)
    {
        $color->delete();
        return redirect()->route('admin.color.index')->with('message', 'Color Deleted Successfully');
    }
}
