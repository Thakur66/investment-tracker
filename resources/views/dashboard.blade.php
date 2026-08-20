@extends('layouts.app')

@section('title', 'Dashboard')

@section('content')

    <h1 class="text-3xl font-bold text-gray-900 mb-8">Investment Dashboard</h1>

    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Portfolio Summary</h2>
    <table class="w-full border-collapse border border-gray-300 bg-white shadow-sm">
        <tr>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Total Invested</th>
            <td class="border border-gray-300 px-4 py-3 font-semibold text-right">₹{{ number_format($totalInvested, 2) }}</td>
        </tr>

        <tr>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Total Current Value</th>
            <td class="border border-gray-300 px-4 py-3 font-semibold text-right">₹{{ number_format($totalCurrentValue, 2) }}</td>
        </tr>

        <tr>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Total Gain/Loss</th>
            <td class="border border-gray-300 px-4 py-3 font-semibold text-right">₹{{ number_format($totalGainLoss, 2) }}</td>
        </tr>

        <tr>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Overall Return</th>
            <td class="border border-gray-300 px-4 py-3 font-semibold text-right">{{ number_format($overallReturnPercentage, 2) }}%</td>
        </tr>
    </table>
    </div>

    <br>

    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Category Allocation</h2>
    <table class="w-full border-collapse border border-gray-300 bg-white shadow-sm">
        <tr>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Category</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Current Value</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Allocation %</th>
        </tr>

        @foreach ($categoryAllocations as $categoryId => $categoryValue)

            @php
                $category = $investments
                    ->firstWhere('category_id', $categoryId)
                    ->category;

                $allocationPercentage = $totalCurrentValue > 0
                    ? ($categoryValue / $totalCurrentValue) * 100
                    : 0;
            @endphp

            <tr>
                <td class="border border-gray-300 px-4 py-3">{{ $category->name }}</td>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($categoryValue, 2) }}</td>
                <td class="border border-gray-300 px-4 py-3">{{ number_format($allocationPercentage, 2) }}%</td>
            </tr>

        @endforeach
    </table>
    </div>

    <br>

    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Investment Type Allocation</h2>
    <table class="w-full border-collapse border border-gray-300 bg-white shadow-sm">
        <tr>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Investment Type</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Current Value</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Allocation %</th>
        </tr>

        @foreach ($investmentTypeAllocations as $investmentTypeId => $typeValue)

            @php
                $investmentType = $investments
                    ->firstWhere('investment_type_id', $investmentTypeId)
                    ->investmentType;

                $allocationPercentage = $totalCurrentValue > 0
                    ? ($typeValue / $totalCurrentValue) * 100
                    : 0;
            @endphp

            <tr>
                <td class="border border-gray-300 px-4 py-3">{{ $investmentType->name }}</td>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($typeValue, 2) }}</td>
                <td class="border border-gray-300 px-4 py-3">{{ number_format($allocationPercentage, 2) }}%</td>
            </tr>

        @endforeach
    </table>
    </div>

    <br>

    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Category Performance</h2>
    <table class="w-full border-collapse border border-gray-300 bg-white shadow-sm">
        <tr>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Category</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Invested Amount</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Current Value</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Gain/Loss</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Return %</th>
        </tr>

        @foreach ($categoryPerformance as $categoryId => $performance)

            @php
                $category = $investments
                    ->firstWhere('category_id', $categoryId)
                    ->category;
            @endphp

            <tr>
                <td class="border border-gray-300 px-4 py-3">{{ $category->name }}</td>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($performance['invested'], 2) }}</td>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($performance['current_value'], 2) }}</td>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($performance['gain_loss'], 2) }}</td>
                <td class="border border-gray-300 px-4 py-3">{{ number_format($performance['return_percentage'], 2) }}%</td>
            </tr>

        @endforeach
    </table>
    </div>

    <br>

    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Investment Type Performance</h2>
    <table class="w-full border-collapse border border-gray-300 bg-white shadow-sm">
        <tr>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Investment Type</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Invested Amount</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Current Value</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Gain/Loss</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Return %</th>
        </tr>

        @foreach ($investmentTypePerformance as $investmentTypeId => $performance)

            @php
                $investmentType = $investments
                    ->firstWhere('investment_type_id', $investmentTypeId)
                    ->investmentType;
            @endphp

            <tr>
                <td class="border border-gray-300 px-4 py-3">{{ $investmentType->name }}</td>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($performance['invested'], 2) }}</td>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($performance['current_value'], 2) }}</td>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($performance['gain_loss'], 2) }}</td>
                <td class="border border-gray-300 px-4 py-3">{{ number_format($performance['return_percentage'], 2) }}%</td>
            </tr>

        @endforeach
    </table>
    </div>

    <br>

    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Recent Investments</h2>
    <table class="w-full border-collapse border border-gray-300 bg-white shadow-sm">
        <tr>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Investment</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Category</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Type</th>
            <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Current Value</th>
        </tr>

        @foreach ($investments->take(5) as $investment)

            <tr>
                <td class="border border-gray-300 px-4 py-3">{{ $investment->name }}</td>
                <td class="border border-gray-300 px-4 py-3">{{ $investment->category->name }}</td>
                <td class="border border-gray-300 px-4 py-3">{{ $investment->investmentType->name }}</td>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($investment->current_value, 2) }}</td>
            </tr>

        @endforeach

    </table>
    </div>
    
@endsection