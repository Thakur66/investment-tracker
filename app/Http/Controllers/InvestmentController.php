<?php

namespace App\Http\Controllers;

use App\Models\Category;
use App\Models\Investment;
use App\Models\InvestmentType;
use Illuminate\Http\Request;
use App\Services\PortfolioService;

class InvestmentController extends Controller
{
    

    public function index(PortfolioService $portfolioService)
    {
        $data = $portfolioService->getPortfolioData();

        return view('investments.index', $data);
    }

    public function dashboard(PortfolioService $portfolioService)
    {
    $data = $portfolioService->getPortfolioData();

    return view('dashboard', $data);
    }

   public function create()
    {
    $categories = Category::where('status', true)
        ->orderBy('name')
        ->get();

    $investmentTypes = InvestmentType::where('status', true)
        ->orderBy('name')
        ->get();

    return view('investments.create', compact(
        'categories',
        'investmentTypes'
    ));
    }

    public function store(Request $request)
    {
    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'investment_type_id' => 'required|exists:investment_types,id',
        'name' => 'required|string|max:255',
        'provider' => 'required|string|max:255',
        'invested_amount' => 'required|numeric|min:0',
        'current_value' => 'required|numeric|min:0',
        'investment_date' => 'required|date',
        'notes' => 'nullable|string',
    ]);

    Investment::create($validated);

    return redirect('/investments');
    }

    public function edit(Investment $investment)
    {
    $categories = Category::where('status', true)
        ->orderBy('name')
        ->get();

    $investmentTypes = InvestmentType::where('status', true)
        ->orderBy('name')
        ->get();

    return view('investments.edit', compact(
        'investment',
        'categories',
        'investmentTypes'
    ));
    }

    public function update(Request $request, Investment $investment)
    {
    $validated = $request->validate([
        'category_id' => 'required|exists:categories,id',
        'investment_type_id' => 'required|exists:investment_types,id',
        'name' => 'required|string|max:255',
        'provider' => 'required|string|max:255',
        'invested_amount' => 'required|numeric|min:0',
        'current_value' => 'required|numeric|min:0',
        'investment_date' => 'required|date',
        'notes' => 'nullable|string',
    ]);

    $investment->update($validated);

    return redirect('/investments');
    }

    public function destroy(Investment $investment)
    {
    $investment->delete();

    return redirect('/investments');
    }
}