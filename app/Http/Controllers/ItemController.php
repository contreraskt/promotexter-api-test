<?php

namespace App\Http\Controllers;

use App\Models\Item;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;

class ItemController extends Controller
{
    public function index()
    {
        return Item::all();
    }

    public function show($id)
    {
        $item = Item::findOrFail($id);
        return $item;
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|unique:items|max:255',
        ]);

        $item = Item::create($request->all());
        return response()->json($item, 201);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'name' => ['required', Rule::unique('items')->ignore($id), 'max:255'],
        ]);

        $item = Item::findOrFail($id);
        $item->update($request->all());
        return response()->json($item, 200);
    }

    public function destroy($id)
    {
        $item = Item::findOrFail($id);
        $item->delete();
        return response()->json(null, 204);
    }
}