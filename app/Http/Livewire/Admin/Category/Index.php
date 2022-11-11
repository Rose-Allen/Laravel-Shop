<?php

namespace App\Http\Livewire\Admin\Category;

use App\Models\Category;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;
use Livewire\Component;
use Livewire\WithPagination;

class Index extends Component
{
    use WithPagination;

    protected $paginationTheme = 'bootstrap';
    public $category_id;

    public function deleteCategory($category_id)
    {
        $this->category_id = $category_id;
    }

    public function destroyCategory()
    {
        $category = Category::find($this->category_id);
        $path = Storage::disk('public')->put('/images', $category->image);
        if (File::exists($path)) {
            File::delete($path);

        }
        $category->delete();
        session()->flash('message', "Category Deleted");
        $this->dispatchBrowserEvent('close-modal');
    }


    public function render()
    {
        $categories = Category::paginate(10);
        return view('livewire.admin.category.index', compact('categories'));
    }




}
