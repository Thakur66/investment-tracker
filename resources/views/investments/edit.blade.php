@extends('layouts.app')
@section('title', 'Edit Investment')
@section('content')

    <div class="flex items-center justify-between mb-8">
    
        <h1 class="text-3xl font-bold text-gray-900">Edit Investment</h1>
        <a href="{{ route('investments.index') }}" class="bg-gray-600 text-white px-5 py-2 rounded-lg hover:bg-gray-700">← Back to Investments</a>

    </div>


    @if ($errors->any())
    <div class="bg-red-50 border border-red-200 text-red-700 rounded-md p-4 mb-6">
        <strong class="font-semibold">
            Please fix the following errors:
        </strong>

        <ul class="list-disc list-inside mt-2 text-sm">
            @foreach ($errors->all() as $error)
                <li>{{ $error }}</li>
            @endforeach
        </ul>
    </div>
    @endif

    <div class="bg-white rounded-lg shadow-sm p-6 mb-8">
        <form action="{{ route('investments.update', $investment->id) }}" method="POST">

            @csrf
            @method('PUT')

            <div class="mb-5">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Investment Name<span class="text-red-600">*</span></label>
                <input type="text" id="name" name="name" value="{{ old('name', $investment->name) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
            </div>

            <div class="mb-5">
                <label for="category_id" class="block text-sm font-medium text-gray-700 mb-1">Category<span class="text-red-600">*</span></label>
                <select id="category_id" name="category_id" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-gray-400" required>
                    <option value="">Select Category</option>
                        @foreach ($categories as $category)
                            <option value="{{ $category->id }}" {{ old('category_id', $investment->category_id) == $category->id ? 'selected' : '' }}>
                                {{ $category->name }}
                            </option>
                        @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="investment_type_id" class="block text-sm font-medium text-gray-700 mb-1">Investment Type<span class="text-red-600">*</span></label>
                <select id="investment_type_id" name="investment_type_id" class="w-full border border-gray-300 rounded-md px-3 py-2 bg-white focus:outline-none focus:ring-2 focus:ring-gray-400" required>
                    <option value="">Select Investment Type</option>
                        @foreach ($investmentTypes as $investmentType)
                            <option value="{{ $investmentType->id }}" data-category="{{ $investmentType->category_id }}" {{ old('investment_type_id', $investment->investment_type_id) == $investmentType->id ? 'selected' : '' }}>
                                {{ $investmentType->name }}
                            </option>
                        @endforeach
                </select>
            </div>

            <div class="mb-5">
                <label for="provider" class="block text-sm font-medium text-gray-700 mb-1">Provider<span class="text-red-600">*</span></label>
                <input type="text" id="provider" name="provider" value="{{ old('provider', $investment->provider) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
            </div>

            <div class="mb-5">
                <label for="invested_amount" class="block text-sm font-medium text-gray-700 mb-1">Invested Amount<span class="text-red-600">*</span></label>
                <input type="number" id="invested_amount" name="invested_amount" value="{{ old('invested_amount', $investment->invested_amount) }}" step="0.01" min="0" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
            </div>

            <div class="mb-5">
                <label for="current_value" class="block text-sm font-medium text-gray-700 mb-1">Current Value<span class="text-red-600">*</span></label>
                <input type="number" id="current_value" name="current_value" value="{{ old('current_value', $investment->current_value) }}" step="0.01"  min="0" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
            </div>

            <div class="mb-5">
                <label for="investment_date" class="block text-sm font-medium text-gray-700 mb-1">Investment Date<span class="text-red-600">*</span></label>
                <input type="date" id="investment_date" name="investment_date" value="{{ old('investment_date', $investment->investment_date->format('Y-m-d')) }}" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400" required>
            </div>

            <div class="mb-5">
                <label for="notes" class="block text-sm font-medium text-gray-700 mb-1">Notes</label>
                <textarea id="notes" name="notes" class="w-full border border-gray-300 rounded-md px-3 py-2 focus:outline-none focus:ring-2 focus:ring-gray-400">{{ old('notes', $investment->notes) }}</textarea>
            </div>

            <button type="submit" class="bg-gray-800 text-white px-5 py-2 rounded-lg hover:bg-gray-700">Update Investment</button>

        </form>
    </div>

    <p>
        <a href="/investments">Back to Investments</a>
    </p>



<script>
    const categorySelect = document.getElementById('category_id');
    const investmentTypeSelect = document.getElementById('investment_type_id');

    const allInvestmentTypes = Array.from(
        investmentTypeSelect.options
    ).slice(1);

    function filterInvestmentTypes() {

        const selectedCategoryId = categorySelect.value;
        const selectedInvestmentTypeId = investmentTypeSelect.value;

        investmentTypeSelect.innerHTML = '<option value="">Select Investment Type</option>';

        allInvestmentTypes.forEach(function (option) {

            if (option.dataset.category === selectedCategoryId) {

                const newOption = option.cloneNode(true);

                if (option.value === selectedInvestmentTypeId) {
                    newOption.selected = true;
                }

                investmentTypeSelect.appendChild(newOption);
            }
        });
    }

    categorySelect.addEventListener('change', function () {
        filterInvestmentTypes();
    });

    filterInvestmentTypes();
</script>
@endsection