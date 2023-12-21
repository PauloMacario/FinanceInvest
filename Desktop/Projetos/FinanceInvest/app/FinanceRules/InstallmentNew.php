<?php

namespace App\FinanceRules;

use App\Models\Installment;
use App\Models\Purchase;
use Carbon\Carbon;

class InstallmentNew
{   

    private $purchase;

    private $installmentValue;

    private $firstInstallmentDate;

    private $installments = [];

    public function __construct(Purchase $purchase)
    {
        $this->purchase = $purchase;
        $this->divideValue();
        $this->generateFirstInstallment();
    }

    public function new()
    {        
        $this->generateDataInstallments();

        foreach ($this->installments as $installment) {
            Installment::create($installment);
            logger()->info('new');
        }

        return true;
    }

    private function divideValue(): void
    {
        $this->installmentValue = $this->purchase->value / $this->purchase->number_installments;
    }   

    private function generateFirstInstallment()
    {
        $purchaseDate = Carbon::parse($this->purchase->date);

        $purchaseDay = $purchaseDate->day;

        if ($purchaseDay > $this->purchase->processing_day) {
            $nextMonth = $purchaseDate->addMonth()->format("Y-m-");
            
            $this->firstInstallmentDate = $nextMonth.$this->purchase->payday;

        } else {
            $currentMonth = $purchaseDate->format("Y-m-");

            $this->firstInstallmentDate = $currentMonth.$this->purchase->payday;

        }

    }

    private function generateDataInstallments()
    {
        $date = Carbon::parse($this->firstInstallmentDate);

        for ( $instalment = 1; $instalment <= $this->purchase->number_installments ; $instalment++) { 
            
            $this->installments[$instalment] = [
                'purchase_id' => $this->purchase->id,
                'installment' => $instalment,
	            'value'  => $this->installmentValue,	
	            'paydate' => ($instalment == 1) ? $date->format("Y-m-d") : $date->addMonth()->format("Y-m-d")
            ];
        }
    }
        
}