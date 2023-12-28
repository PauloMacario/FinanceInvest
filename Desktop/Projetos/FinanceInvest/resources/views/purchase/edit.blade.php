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
                                {{ $purchase->trade_name }}/{{ $purchase->description}} 
                                - 
                                R$ {{ money_br($purchase->value) }}
                                parcelado em {{ $purchase->number_installments }} vezes.
                            </i>
                        </h5>                       
                        <form action="{{ route('purchase_put_update') }}" method="POST">
                            @method('PUT')
                            @csrf
                            <input type="hidden" name="id" value="{{ $purchase->id }}">
                            <div class="form-row">

                                <div class="form-group col-md-3">
                                    <label>Data da compra</label>
                                    <input type="date" name="paydate" class="form-control" value="{{ $purchase->date }}" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Descrição</label>
                                    <input type="text" name="description" class="form-control" value="{{ $purchase->description }}" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Local</label>
                                    <input type="text" name="trade_name" class="form-control" value="{{ $purchase->trade_name }}" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Valor</label>
                                    <input type="text" id="value" name="value" class="form-control" value="{{ money_br($purchase->value) }}" required>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Tipo</label>
                                    <select id="type_id" name="type_id" class="form-control" required>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" @if( $type->id == $purchase->type_id) selected @endif>{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Segmento</label>
                                    <select id="segment_id" name="segment_id" class="form-control" required>
                                        @foreach ($segments as $segment)
                                            <option value="{{ $segment->id }}" @if( $segment->id == $purchase->segment_id) selected @endif>{{ $segment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Comprador</label>
                                    <select id="shopper_id" name="shopper_id" class="form-control" required>                                        
                                        @foreach ($shoppers as $shopper)
                                            <option value="{{ $shopper->id }}" @if( $shopper->id == $purchase->shopper_id) selected @endif>{{ $shopper->name }}</option>
                                        @endforeach
                                    </select>
                                </div>

                                <div class="form-group col-md-3">
                                    <label>Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="PO" @if( $purchase->status == 'PO') selected @endif>Pago</option>
                                        <option value="NP" @if( $purchase->status == 'NP') selected @endif>Pendente</option>
                                        <option value="CN" @if( $purchase->status == 'CN') selected @endif>Cancelado</option> 
                                    </select>
                                </div>


                            {{--     "type_id" => 2
                                "segment_id" => 6
                                "shopper_id" => 1
                            
                                "value" => "339.08" --}}




                               {{--  <div class="form-group col-md-3">
                                    <label>Descrição</label>
                                    <input type="number" name="installment" class="form-control" value="{{ $purchase->installment }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Local</label>
                                    <input type="number" name="installment" class="form-control" value="{{ $purchase->installment }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Valor</label>
                                    <input type="text" id="value" name="value" class="form-control" value="{{ money_br($purchase->value) }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Data da compra</label>
                                    <input type="date" name="paydate" class="form-control" value="{{ $purchase->paydate }}" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Status</label>
                                    <select id="status" name="status" class="form-control" required>
                                        <option value="{{ $purchase->status }}" @if( $purchase->status == 'PO') selected @endif>Pago</option>
                                        <option value="{{ $purchase->status }}" @if( $purchase->status == 'NP') selected @endif>Pendente</option>
                                        <option value="{{ $purchase->status }}" @if( $purchase->status == 'CN') selected @endif>Cancelado</option> 
                                    </select>
                                </div>
 --}}
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