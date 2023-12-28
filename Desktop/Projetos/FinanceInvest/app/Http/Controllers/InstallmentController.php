<?php

namespace App\Http\Controllers;

use App\Models\Shopper;
use App\FinanceRules\Installment\InstallmentSearch;
use App\FinanceRules\Installment\InstallmentUpdate;
use App\Models\Segment;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Http\Request;

class InstallmentController extends Controller
{
    public function index(Request $request)
    {
        $now = Carbon::now();
        $year = $request->year ?? $now->year;
        $month = $request->month ?? $now->month;

        $context['filters'] = [
            "year" => $year,
            "month" => $month,
            "shopper" => $request->shopper,
            "type" => $request->type,
            "segment" => $request->segment
        ];

        $context['shoppers'] = Shopper::all();
        $context['types'] = Type::all();
        $context['segments'] = Segment::all();
        
        $context['title'] = "Parcelas";

        $search = new InstallmentSearch();

        $context['installments'] = $search->getInstallmentsByDate($context['filters']);
        
        $context['total'] = 0.00;

        return view('installment.each-installment', $context);
    }

    public function edit($id)
    {
        $context['title'] = "Editar parcela";

        $installment = new InstallmentUpdate();

        $context['installment'] = $installment->getDataEdit($id);

        return view('installment.edit', $context);

    }


    public function update(Request $request)
    {
        $installment = new InstallmentUpdate();
        
        if (!$installment->update($request->id, $request->except('_token', '_method', 'id'))) {
            $request->session()->flash('error', 'Ocorreu um erro ao atualizar :(');
            return redirect()->back();
        }

        $request->session()->flash('success', 'Parcela editada!');

        return redirect()->route('installment_get_index');
    }
}
