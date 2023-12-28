<?php

namespace App\FinanceRules\Installment;

use App\Models\Installment;

class InstallmentUpdate
{     
    public function getDataEdit($id)
    {
        return Installment::where('id', $id)
            ->with('purchase')
            ->first();
    }

    public function update($id, $data)
    {
        $installment = Installment::find($id);

        $data['value'] = str_replace(',', '.', str_replace('.', '', $data['value']));
        
        return $installment->update($data);
    }
}