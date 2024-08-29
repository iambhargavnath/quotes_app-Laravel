<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    public function index()
    {
        return Quote::all();
    }

    public function store(Request $request)
    {
        $request->validate([
            'quote' => 'required|string',
            'author' => 'required|string',
            'language' => 'required|string',
        ]);

        $quote = Quote::create($request->all());

        return response()->json($quote, 201);
    }

    public function show($id)
    {
        return Quote::findOrFail($id);
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'quote' => 'string',
            'author' => 'string',
            'language' => 'string',
        ]);

        $quote = Quote::findOrFail($id);
        $quote->update($request->all());

        return response()->json($quote, 200);
    }

    public function destroy($id)
    {
        $quote = Quote::findOrFail($id);
        $quote->delete();

        return response()->json(null, 204);
    }
}
