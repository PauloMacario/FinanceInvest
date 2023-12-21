<?php

namespace App\FinanceRules;

use App\Models\Installment;

class InstallmentSearch
{     
    public function getInstallmentsByDate($filters)
    {
        $month = $filters['month'];
        $year = $filters['year'];
        $shopper = $filters['shopper'];

        $installments = Installment::join('purchases', 'purchases.id', '=', 'installments.purchase_id')
            ->whereYear('installments.paydate', $year)
            ->whereMonth('installments.paydate', $month);
                        
        if ($shopper == 0) {
            $installments->where('purchases.shopper_id', '>', 0);
        }

        if ($shopper > 0) {
            $installments->where('purchases.shopper_id', '=', $shopper);
        }

        return $installments->get();
    }
}