<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Purchase;
use App\Models\Shopper;
use App\Models\Type;
use App\FinanceRules\Purchase\PurchaseNew;
use App\FinanceRules\Purchase\PurchaseUpdate;
use App\Models\Segment;

class PurchaseController extends Controller
{
    public function index()
    {
        $context['title'] = "Compras";
        $context['purchases'] = Purchase::orderBy('date', 'DESC')->get();
        $context['total'] = 0.00;
        
        return view('purchase.index', $context);
    }

    public function create()
    {
        $context['title'] = "Nova compra";

        $context['types'] = Type::all();
        $context['segments'] = Segment::all();
        $context['shoppers'] = Shopper::all();

        return view('purchase.create', $context);
    }

    public function edit($id)
    {
        $context['title'] = "Editar compra";

        $context['types'] = Type::all();
        $context['segments'] = Segment::all();
        $context['shoppers'] = Shopper::all();

        $purchase = new PurchaseUpdate();

        $context['purchase'] = $purchase->getDataEdit($id);

        return view('purchase.edit', $context);

    }


    public function update(Request $request)
    {
        $purchase = new PurchaseUpdate();
        
        if (!$purchase->update($request->id, $request->except('_token', '_method', 'id'))) {
            $request->session()->flash('error', 'Ocorreu um erro ao atualizar :(');
            return redirect()->back();
        }

        $request->session()->flash('success', 'Parcela editada!');

        return redirect()->route('purchase_get_index');
    }

    public function store(Request $request)
    {
        $purchase = new PurchaseNew();
        
        if (!$purchase->new($request->all())) {
            $request->session()->flash('error', 'Ocorreu um erro ao cadastrar :(');
            return redirect()->back();
        }

        $request->session()->flash('success', 'Compra cadastrada :)');
        return redirect()->route('purchase_get_index');
    }

    public function purchaseAndInstallments()
    {
        $context['title'] = "Parcelas";

        $context['purchases'] = Purchase::orderBy('date', 'DESC')
            ->has('installments')
            ->get();
        
        return view('purchase.each-installment', $context);
    }
}
