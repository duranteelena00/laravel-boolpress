<?php

namespace App\Http\Controllers;

use App\Models\Cathegory;
use App\Http\Controllers\Controller;
use Illuminate\Support\Str;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class CathegoryController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $cathegories = Cathegory::all();
        return view('admin.cathegories.index', compact('cathegories'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.cathegories.create', ['cathegory' => new Cathegory()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:cathegories'
        ]);

        $data = $request->all();

        $cathegory = new Cathegory();
        $data['slug'] = Str::slug($data['name'], '-');
        $cathegory->fill($data);

        $cathegory->save();

        return redirect()->route('admin.cathegories.show', $cathegory->id);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show(Cathegory $cathegory)
    {
        return view('admin.cathegories.show', compact('cathegory'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit(Cathegory $cathegory)
    {
        return view('admin.cathegories.edit', compact('cathegory'));

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Cathegory $cathegory)
    {
        $request->validate([
            'name' => ['required', Rule::unique('cathegories')->ignore($cathegory->id)]
        ]);

        $data = $request->all();

        $data['slug'] = Str::slug($data['name'], '-');

        $cathegory->update($data);

        return redirect()->route('admin.cathegories.show', $cathegory->id);
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Cathegory $cathegory)
    {
        $cathegory->delete();
        return redirect()->route('admin.cathegories.index')->with('msg', 'Post deleted successfully');
    }
}
