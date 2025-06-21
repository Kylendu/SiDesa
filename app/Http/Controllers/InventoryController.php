<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class InventoryController extends Controller
{
    public function index()
    {
        $inventory = \App\Models\Inventory::all();
        return view('all.pages.inventory', compact('inventory'));
    }
}
