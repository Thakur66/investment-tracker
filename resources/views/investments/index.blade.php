@extends('layouts.app')
@section('title', 'My Investments')
@section('content')

    <div class="flex items-center justify-between mb-8">
        <h1 class="text-3xl font-bold text-gray-900">My Investments</h1>

        <a href="{{ route('investments.create') }}"
        class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-700">
            + Add Investment
        </a>
    </div>


    <!--  Portfolio Summary Table Start from Here  -->
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Portfolio Summary</h2>
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <table class="w-full border-collapse border border-gray-300">
            <tr>
                <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Total Invested</th>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($totalInvested, 2) }}</td>
            </tr>

            <tr>
                <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Total Current Value</th>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($totalCurrentValue, 2) }}</td>
            </tr>

            <tr>
                <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Total Gain/Loss</th>
                <td class="border border-gray-300 px-4 py-3">₹{{ number_format($totalGainLoss, 2) }}</td>
            </tr>

            <tr>
                <th class="border border-gray-300 px-4 py-3 text-left bg-gray-50">Overall Return</th>
                <td class="border border-gray-300 px-4 py-3">{{ number_format($overallReturnPercentage, 2) }}%</td>
            </tr>
        </table>
    </div>

    <!--  Category Allocation Table Start from Here  -->
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Category Allocation</h2>
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <table class="w-full border-collapse border border-gray-300">
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

     <!--  Investment Type Allocation Table Start from Here  -->
    <h2 class="text-xl font-semibold text-gray-800 mb-4">Investment Type Allocation</h2>
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <table class="w-full border-collapse border border-gray-300">
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

    <h2 class="text-xl font-semibold text-gray-800 mb-4">Investments</h2>
    <!--  Investment Details Table Start from Here  -->
    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <table class="w-full border-collapse border border-gray-300">

            <thead>
                <tr>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Investment</th>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Category</th>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Type</th>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Provider</th>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Invested Amount</th>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Current Value</th>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Gain/Loss</th>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Return %</th>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Investment Date</th>
                    <th class="border border-gray-300 px-4 py-3 text-left bg-gray-100 font-semibold text-gray-700">Actions</th>
                </tr>
            </thead>
            <tbody>

                @foreach ($investments as $investment)

                    <tr class="hover:bg-gray-50">
                        <td class="border border-gray-300 px-4 py-3">{{ $investment->name }}</td>

                        <td class="border border-gray-300 px-4 py-3">{{ $investment->category->name }}</td>

                        <td class="border border-gray-300 px-4 py-3">{{ $investment->investmentType->name }}</td>

                        <td class="border border-gray-300 px-4 py-3">{{ $investment->provider }}</td>

                        <td class="border border-gray-300 px-4 py-3 text-right">₹{{ number_format($investment->invested_amount, 2) }}</td>

                        @php
                            $gainLoss = $investment->current_value - $investment->invested_amount;

                            $returnPercentage = $investment->invested_amount > 0
                                ? ($gainLoss / $investment->invested_amount) * 100
                                : 0;
                        @endphp

                        <td class="border border-gray-300 px-4 py-3 text-right">₹{{ number_format($investment->current_value, 2) }}</td>

                       
                        <td class="border border-gray-300 px-4 py-3 font-semibold text-right {{ $gainLoss > 0 ? 'text-green-600' : ($gainLoss < 0 ? 'text-red-600' : 'text-gray-600') }}">₹{{ number_format($gainLoss, 2) }}</td>
                        <td class="border border-gray-300 px-4 py-3 font-semibold text-right {{ $returnPercentage > 0 ? 'text-green-600' : ($returnPercentage < 0 ? 'text-red-600' : 'text-gray-600') }}">{{ number_format($returnPercentage, 2) }}%</td>
                        <td class="border border-gray-300 px-4 py-3">{{ $investment->investment_date->format('d-m-Y') }}</td>
                        <td class="border border-gray-300 px-4 py-3">
                            <div class="flex items-center gap-2">
                                <a href="{{ route('investments.edit', $investment) }}" class="inline-block bg-blue-600 text-white px-3 py-1 rounded-md text-sm hover:bg-blue-700">Edit</a>
                                <form method="POST" action="{{ route('investments.destroy', $investment->id) }}" style="display: inline;">
                                @csrf
                                @method('DELETE')
                                <button type="submit" class="bg-red-600 text-white px-3 py-1 rounded-md text-sm hover:bg-red-700" onclick="return confirm('Are you sure you want to delete this investment?')">Delete</button>
                                </form>
                            </div>    
                        </td>
                    </tr>

                @endforeach
            </tbody>
        </table>
    </div>

@endsection