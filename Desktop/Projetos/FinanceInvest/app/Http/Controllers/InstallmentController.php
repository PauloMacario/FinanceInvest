<?php

namespace App\Http\Controllers;

use App\Models\Shopper;
use App\FinanceRules\InstallmentSearch;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        $year = $request->year ?? $now->year;
        $month = $request->month ?? $now->month;

        $shopper = $request->shopper;

        $context['filters'] = [
            "year" => $year,
            "month" => $month,
            "shopper" => $shopper
        ];

        $context['shoppers'] = Shopper::all();
        
        $context['title'] = "Parcelas";

        $search = new InstallmentSearch();

        $context['installments'] = $search->getInstallmentsByDate($context['filters']);
        
        $context['total'] = 0.00;

        return view('installment.each-installment', $context);
    }
}
