<?php

namespace Pos\Category\Controllers;

use App\Http\Controllers\Controller;
use Pos\Category\Models\Category;
use Pos\Category\Requests\StoreCategoriesRequest;
use function redirect;
use function session;
use function trans;
use function view;

class CategoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $categories = Category::get();
        return view('backend.categories.index',compact('categories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreCategoriesRequest $request)
    {
        // return $request;
        // die();

        try {

            Category::create([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'notes'=>$request->notes,
            ]);
            session()->flash('Add', trans('backend/categories.Section Added Successfully') );
            return redirect('categories');

        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }

    }

    /**
     * Display the specified resource.
     *
     * @param  \Pos\Category\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function show(Category $category)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \Pos\Category\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function edit(Category $category)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Pos\Category\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function update(StoreCategoriesRequest $request, $id)
    {
        // dd($request);
        $category = Category::findorFail($request->id);

        try {

            $category->update([
                'name'=> ['ar' => $request->name, 'en' => $request->name_en],
                'notes'=>$request->notes,
            ]);
            session()->flash('Edit', trans('backend/categories.Section has been successfully modified')   );
            return redirect('categories');


        }

        catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \Pos\Category\Models\Category  $category
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {

         try {
        Category::destroy($id);
            session()->flash('Deleted', trans('backend/categories.Section has been deleted successfully'));
            return redirect('categories');
        } catch (\Exception $e) {
            return redirect()->back()->withErrors(['error' => $e->getMessage()]);
        }
    }
}
