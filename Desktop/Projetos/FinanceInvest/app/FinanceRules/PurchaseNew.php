<?php

namespace App\FinanceRules;

use App\Models\Purchase;

class PurchaseNew
{   
    public function new($data)
    {
        $data['value'] = str_replace(',', '.', str_replace('.', '', $data['value']));

        try {
            $newPurchase = Purchase::create($data);

        } catch (\Exception $exception) {
            logger()->error("Erro ao criar nova compra ({$data['description']})");

            return false;
        }      
        
        if (!isset($data['number_installments'])) {
            return true;
        }
        
        if ($this->generateInstallment($newPurchase)) {
            return true;
        }

        return false;
    }

    private function generateInstallment($newPurchase)
    {
        $installments = new InstallmentNew($newPurchase);
        
        return $installments->new();
    }   
        
}