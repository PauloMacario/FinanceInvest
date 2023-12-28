<?php

namespace App\FinanceRules\Purchase;

use App\Models\Purchase;

class PurchaseUpdate
{     
    public function getDataEdit($id)
    {
        return Purchase::where('id', $id)
            ->with('installments')
            ->first();
    }

    public function update($id, $data)
    {
        $purchase = Purchase::find($id);

        $data['value'] = str_replace(',', '.', str_replace('.', '', $data['value']));
        
        return $purchase->update($data);
    }
}