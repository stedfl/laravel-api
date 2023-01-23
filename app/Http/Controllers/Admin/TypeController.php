<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Type;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TypeController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $types = Type::orderBy('id', 'desc')->get();
        return view('admin.types.index', compact('types'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $form_val = $request->validate(
            [
                'name' => 'required|unique:types|min:3|max:50'
            ]
        );
        $form_val['slug'] = Str::slug($form_val['name'], '-');
        $form_name = $form_val['name'];
        Type::create($form_val);

        return redirect()->back()->with('message', "Tipo <strong class=\"text-capitalize\">$form_name</strong> aggiunto correttamente");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Type $type)
    {
        $form_val = $request->validate(
            [
                'name' => 'required|unique:types|max:50'
            ]
        );

        $form_val['slug'] = Str::slug($form_val['name'], '-');
        $form_name = $form_val['name'];
        $type->update($form_val);

        return redirect()->back()->with('message', "Tipo <strong class=\"text-capitalize\">$form_name</strong> modificato correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Type $type)
    {
        $type->delete();
        return redirect()->back()->with('message', "Il tipo <strong class=\"text-capitalize\">$type->name</strong> è stato eliminato correttamente");
    }
}
