<?php

namespace App\Http\Controllers;

use App\Models\Quote;
use App\Models\MainQuote;
use Illuminate\Http\Request;

class QuoteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
{
    // Fetch all quotes from the database
    $quotes = Quote::all();
    $mainquotes = MainQuote::first(); // Get the first row only

    return view('admin.quote', compact('quotes', 'mainquotes'));
}
    /**
     * Show the form for editing a specific quote.
     */
    public function edit($id)
    {
        // Fetch the specific quote by its ID
        $quote = Quote::findOrFail($id);

        // Pass the quote data to the view for editing
        return view('admin.quote', compact('quote'));
    }
    public function update(Request $request, $id)
    {
        // Validate the request data
        $request->validate([
            'title' => 'required|string|max:255',
            'subtitle' => 'required|string|max:255',
        ]);

        // Find the quote by ID
        $quote = Quote::findOrFail($id);

        // Update the quote with the validated data
        $quote->title = $request->input('title');
        $quote->subtitle = $request->input('subtitle');

        // Save the updated quote
        $quote->save();

        // Redirect back with a success message
        return redirect()->route('quote.index')->with('success', 'Quote updated successfully!');
    }

    public function updateQuoteDetail(Request $request)
    {
        // Validate input data
        $validated = $request->validate([
            'main' => 'required|string|max:255',
        ]);

        // Find the first QuoteDetail record
        $quoteDetail = MainQuote::first();

        // Update the text field
        $quoteDetail->text = $request->input('main');
        
        // Save the changes to the database
        $quoteDetail->save();

        // Redirect with success message
        return redirect()->route('quote.index')->with('success', 'QuoteDetail updated successfully!');
    }

}
