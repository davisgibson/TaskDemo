<?php

namespace App\Http\Controllers;

use App\Models\Label;
use Illuminate\Http\Request;

class LabelController extends Controller
{

    public function index()
    {
        return view('labels.index')->with([
            'labels' => Label::all(),
        ]);
    }


    public function create()
    {
        return view('labels.create');
    }


    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
        ]);

        Label::create([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return redirect('/labels');
    }

    public function edit(Label $label)
    {
        return view('labels.edit')->with([
            'label' => $label,
        ]);
    }


    public function update(Request $request, Label $label)
    {
        $request->validate([
            'name' => 'required',
            'color' => 'required',
        ]);

        $label->update([
            'name' => $request->name,
            'color' => $request->color,
        ]);

        return redirect('/labels');
    }

    public function destroy(Label $label)
    {
        $label->delete();

        return redirect('/labels');
    }
}
