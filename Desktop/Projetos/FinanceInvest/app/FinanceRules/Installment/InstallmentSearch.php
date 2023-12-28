<?php

namespace App\FinanceRules\Installment;

use App\Models\Installment;

class InstallmentSearch
{     
    public function getInstallmentsByDate($filters)
    {
        $month = $filters['month'];
        $year = $filters['year'];
        $shopper = $filters['shopper'];
        $type = $filters['type'];
        $segment = $filters['segment'];

        $installments = Installment::join('purchases', 'purchases.id', '=', 'installments.purchase_id')
            ->join('types', 'types.id', '=', 'purchases.type_id')
            ->join('segments', 'segments.id', '=', 'purchases.segment_id')
            ->join('shoppers', 'shoppers.id', '=', 'purchases.shopper_id')
            ->whereYear('installments.paydate', $year)
            ->whereMonth('installments.paydate', $month)
            ->select(
                'installments.id',
                'installments.installment',
                'installments.value',
                'installments.paydate',
                'installments.status',
                'purchases.date',
                'purchases.description',
                'purchases.trade_name',
                'purchases.number_installments',
                'purchases.processing_day',
                'purchases.payday',
                'purchases.status AS purchase_status',
                'types.name AS type_name',
                'segments.name AS segment_name',
                'shoppers.name AS shopper_name'
            );               
        
        if ($shopper > 0) {
            $installments->where('purchases.shopper_id', '=', $shopper);
        }

        if ($type > 0) {
            $installments->where('purchases.type_id', '=', $type);
        }

        if ($segment > 0) {
            $installments->where('purchases.segment_id', '=', $segment);
        }

        return $installments->get();
    }
}