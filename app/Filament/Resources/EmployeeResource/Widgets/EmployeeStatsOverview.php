<?php

namespace App\Filament\Resources\EmployeeResource\Widgets;

use App\Models\Employee;
use App\Models\Country;
use Filament\Widgets\StatsOverviewWidget as BaseWidget;
use Filament\Widgets\StatsOverviewWidget\Card;

class EmployeeStatsOverview extends BaseWidget
{
    protected function getCards(): array
    {
        $us = Country::where('country_code', 'US')->withCount('employees')->first();
        $uK = Country::where('country_code', 'UK')->withCount('employees')->first();
        return [
            card::make('All Employees', Employee::all()->count()),
            card::make($uK->name . ' Employees', $uK->employees_count),
            card::make($us->name . ' Employees', $us->employees_count),
        ];
    }
}
