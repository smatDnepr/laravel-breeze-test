<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use App\Models\ExtraData;
use Illuminate\Http\Request;

class ExtraDataController extends Controller
{
	
    public function index()
    {
		$exrtaData = ExtraData::all();
        return view('admin.extraData.index', compact('exrtaData'));
    }
	

    public function create()
    {
        return view('admin.extraData.create');
    }
	
	
    public function store(Request $request)
    {
        $request->validate([
			'param' => 'required',
			'value' => 'required'
		]);
		
		ExtraData::create($request->all());
		return redirect()->route('extra-data.index');
    }
	
	
    public function edit($id)
    {
		$extraData = ExtraData::find($id);
        return view('admin.extraData.edit', compact('extraData'));
    }
	
	
    public function update(Request $request, $id)
    {
        $request->validate([
			'param' => 'required',
			'value' => 'required',
		]);
		$extraData = ExtraData::find($id);
		$extraData->update($request->all());
		$request->session()->flash('success', 'Изменения сохранены');
		return redirect()->route('extra-data.index');
    }
	

    public function destroy($id)
    {
        ExtraData::find($id)->delete();
		return redirect()->route('extra-data.index')->with('success', 'Параметр удален');
    }
}
