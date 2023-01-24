<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\Technology;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class TechnologyController extends Controller
{
    public function index()
    {
        $technologies = Technology::orderBy('id', 'desc')->get();
        return view('admin.technologies.index', compact('technologies'));
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
                'name' => 'required|unique:technologies|min:2|max:50',
                'thumb' => 'nullable|url|max:255',
                'logo' => 'nullable|url|max:255'
            ]
        );

        $form_val['slug'] = Str::slug($form_val['name'], '-');
        $form_name = $form_val['name'];
        Technology::create($form_val);

        return redirect()->back()->with('message', "Tecnologia <strong class=\"text-capitalize\">$form_name</strong> aggiunta correttamente");
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Technology $technology)
    {
        $form_val = $request->validate(
            [
                'name' => 'required|unique:technologies|min:2|max:50'
            ]
        );

        $form_val['slug'] = Str::slug($form_val['name'], '-');
        $form_name = $form_val['name'];
        $technology->update($form_val);

        return redirect()->back()->with('message', "Tecnologia <strong class=\"text-capitalize\">$form_name</strong> modificata correttamente");
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy(Technology $technology)
    {
        $technology->delete();
        return redirect()->back()->with('message', "La tecnologia <strong class=\"text-capitalize\">$technology->name</strong> è stata eliminata correttamente");
    }
}
