<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Item;
use Illuminate\Support\Carbon;

class ItemController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        return Item::orderBy('created_at', 'DESC')->get();
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $newItem = new Item;
        $newItem->task = $request->item['task'];
        $newItem->description = $request->item['description'];
        $newItem->completed = $request->item['completed'];
        $newItem->save();

        return $newItem;
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $existingItem = Item::find($id);

        if ($existingItem) {
            $task = isset($request->item['task']) ? $request->item['task'] : null;
            $description = isset($request->item['description']) ? $request->item['description'] : null;
            $completed = isset($request->item['completed']) ? $request->item['completed'] : null;

            if ($task !== null) {
                $existingItem->task = $task;
            }
            if ($description !== null) {
                $existingItem->description = $description;
            }
            if ($completed !== null) {
                $existingItem->completed = $completed ? true : false;
            }

            if (isset($request->completed)) {
                $existingItem->completed_at = $request->completed ? Carbon::now() : null;
            }

            $existingItem->save();

            return $existingItem;
        }

        return response()->json(['error' => 'Item not found.'], 404);
    }



    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $existingItem = Item::find($id);

        if ($existingItem) {
            $existingItem->delete();

            return "Item foi deletado";
        }

        return "Item não encontrado";
    }
}
