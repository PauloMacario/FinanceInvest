@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <h4>
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>    
                            {{ $title }}
                        </h4>
                        <hr>
                    </div>
                    <div class="">
                        <h5 class="text-info mb-4">
                            <i>
                                Compra: 
                                {{ $installment->purchase->trade_name }}/{{ $installment->purchase->description}} 
                                - 
                                R$ {{ money_br($installment->purchase->value) }}
                                parcelado em {{ $installment->purchase->number_installments }} vezes.
                            </i>
                        </h5>
                       
                        <form action="{{ route('installment_put_update') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $installment->id }}">
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label>N° da parcela</label>
                                    <input type="number" name="installment" class="form-control" value="{{ $installment->installment }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Valor</label>
                                    <input type="text" id="value" name="value" class="form-control" value="{{ money_br($installment->value) }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Data de pgto</label>
                                    <input type="date" name="paydate" class="form-control" value="{{ $installment->paydate }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="PO" @if( $installment->status == 'PO') selected @endif>Pago</option>
                                        <option value="NP" @if( $installment->status == 'NP') selected @endif>Pendente</option>
                                        <option value="CN" @if( $installment->status == 'CN') selected @endif>Cancelado</option> 
                                    </select>
                                </div>

                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <button type="submit" class="btn btn-dark">Atualizar parcela</button>
                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>

@endsection