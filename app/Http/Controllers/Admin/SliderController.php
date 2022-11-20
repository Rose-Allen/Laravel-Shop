<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\SliderRequest;
use App\Models\Slider;
use http\Env\Url;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class SliderController extends Controller
{
    public function index()
    {
        $sliders = Slider::all();
        return view('admin.slider.index', compact('sliders'));
    }

    public function create()
    {
        return view('admin.slider.create');
    }

    public function store(SliderRequest $request)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();
            $data['image'] = Storage::disk('public')->put('/slider', $data['image']);
            $data['status'] = $request->status == true ? '1' : '0';
            $category = Slider::firstOrCreate($data);
            DB::commit();
            return redirect()->route('admin.slider.index')->with('message', 'Slider Added Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function edit(Slider $slider)
    {
        return view('admin.slider.edit', compact('slider'));
    }

    public function update(SliderRequest $request, Slider $slider)
    {
        $data = $request->validated();
        try {
            DB::beginTransaction();

            if ($request->hasFile('image')) {
                if (Storage::disk('public')->exists($slider->image)) {
                    Storage::disk('public')->delete($slider->image);
                }
                $data['image'] = Storage::disk('public')->put('/slider', $data['image']);
            }
            $data['status'] = $request->status == true ? 1 : 0;
            $slider->update($data);
            DB::commit();
            return redirect()->route('admin.slider.index')->with('message', 'Slider Updated Successfully');
        } catch (\Exception $exception) {
            DB::rollBack();
            abort(500);
        }
    }

    public function destroy(Slider $slider)
    {
        if ($slider->count() > 0) {
            if (Storage::disk('public')->exists($slider->image)) {
                Storage::disk('public')->delete($slider->image);
            }
            $slider->delete();
            return redirect()->route('admin.slider.index')->with('message', 'Slider Deleted Successfully');

        }
    }
}
