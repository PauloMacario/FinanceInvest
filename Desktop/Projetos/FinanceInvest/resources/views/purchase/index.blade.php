@extends('layouts.base')

@section('content')
    <div class="row">
        {{-- <p>Pagina de compras {{ $purchases }}</p> --}}
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <h4>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>    
                            {{ $title }}
                        </h4>
                        <hr>
                    </div>
                    @if(!$purchases->count())
                        <div class="row">
                            <div class="col-12">
                                <h4><i>Nada para listar no momento...</i></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-5">
                                <a href="{{ route('purchase_get_create') }}" class="btn mb-1 btn-primary">Nova compra</a>
                            </div>
                        </div>
                    @else
                        <div class="">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Data</th>
                                        <th>Tipo</th>
                                        <th>Segmento</th>
                                        <th>Local</th>
                                        <th>Descrição</th>
                                        <th>Valor</th>
                                        <th>Parcela(S)</th>
                                        <th>Ações</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($purchases as $purchase)
                                        @php
                                            $total += $purchase->value;
                                        @endphp
                                        
                                        <tr>
                                            <td>{{ date_br($purchase->date) }}</td>
                                            <td>{{ $purchase->type->name }}</td>
                                            <td>{{ $purchase->segment->name }}</td>
                                            <td>{{ $purchase->trade_name }}</td>
                                            <td>{{ $purchase->description }}</td>
                                            <td>R$ {{ money_br($purchase->value) }}</td>
                                            <td>{{ $purchase->number_installments }}</td>
                                            <td>
                                                <a href="{{ route('purchase_get_edit', ['id' => $purchase->id]) }}">
                                                    <i class="fa fa-pencil-square-o fa-lg" aria-hidden="true"></i>
                                                </a>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5">
                                            <h5 class="text-right">
                                                Valor Total
                                            </h5>
                                        </td>
                                        <td colspan="2">
                                            <h5 class="text-left">
                                                {{ money_br($total) }}
                                            </h5>
                                        </td>
                                    </tr>
                                </tfoot>
                            </table>
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection
