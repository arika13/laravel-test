<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Sale;

// app/Http/Controllers/SellingPriceController.php





class SellingPriceController extends Controller
{
    public function index()
    {
    	// Fetch previous sales data
        $previousSales = Sale::latest()->get();
        $sellingPrice = Sale::latest()->take(1)->select('unit_cost')->first();
        //return $sellingPrice;
        return view('coffee_sales', ['previousSales' => $previousSales, 'sellingPrice' => $sellingPrice]);
    }

    public function calculate(Request $request)
    {
        $quantity = $request->input('quantity');
        $unitCost = $request->input('unit_cost');

        // Calculation logic
        $profitMargin = 0.25;
        $shippingCost = 10.00;
        $cost = $quantity * $unitCost;
        $sellingPrice = ($cost / (1 - $profitMargin)) + $shippingCost;

        $sale = new Sale();
        $sale->quantity = $quantity;
        $sale->unit_cost = $unitCost;
        $sale->selling_price = $sellingPrice;
        $sale->save();
        // Redirect back with success message or show the form again
        return redirect()->back()->with('success', 'Selling price calculated and saved successfully.');
    }
}

