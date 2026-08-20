<?php

namespace App\Services;

use App\Models\Investment;

class PortfolioService
{
    public function getPortfolioData()
    {
        $investments = Investment::with(['category', 'investmentType'])
            ->orderBy('investment_date', 'desc')
            ->get();

        $totalInvested = $investments->sum('invested_amount');

        $totalCurrentValue = $investments->sum('current_value');

        $totalGainLoss = $totalCurrentValue - $totalInvested;

        $overallReturnPercentage = $totalInvested > 0
            ? ($totalGainLoss / $totalInvested) * 100
            : 0;

        $categoryAllocations = $investments
            ->groupBy('category_id')
            ->map(function ($categoryInvestments) {
                return $categoryInvestments->sum('current_value');
            });

        $investmentTypeAllocations = $investments
            ->groupBy('investment_type_id')
            ->map(function ($typeInvestments) {
                return $typeInvestments->sum('current_value');
            });

        $categoryPerformance = $investments
            ->groupBy('category_id')
            ->map(function ($categoryInvestments) {

                $invested = $categoryInvestments->sum('invested_amount');

                $currentValue = $categoryInvestments->sum('current_value');

                $gainLoss = $currentValue - $invested;

                $returnPercentage = $invested > 0
                    ? ($gainLoss / $invested) * 100
                    : 0;

                return [
                    'invested' => $invested,
                    'current_value' => $currentValue,
                    'gain_loss' => $gainLoss,
                    'return_percentage' => $returnPercentage,
                ];
            });    

        $investmentTypePerformance = $investments
            ->groupBy('investment_type_id')
            ->map(function ($typeInvestments) {

                $invested = $typeInvestments->sum('invested_amount');

                $currentValue = $typeInvestments->sum('current_value');

                $gainLoss = $currentValue - $invested;

                $returnPercentage = $invested > 0
                    ? ($gainLoss / $invested) * 100
                    : 0;

                return [
                    'invested' => $invested,
                    'current_value' => $currentValue,
                    'gain_loss' => $gainLoss,
                    'return_percentage' => $returnPercentage,
                ];
            });    
            
        return [
            'investments' => $investments,
            'totalInvested' => $totalInvested,
            'totalCurrentValue' => $totalCurrentValue,
            'totalGainLoss' => $totalGainLoss,
            'overallReturnPercentage' => $overallReturnPercentage,
            'categoryAllocations' => $categoryAllocations,
            'investmentTypeAllocations' => $investmentTypeAllocations,
            'categoryPerformance' => $categoryPerformance,
            'investmentTypePerformance' => $investmentTypePerformance
        ];
    }
}