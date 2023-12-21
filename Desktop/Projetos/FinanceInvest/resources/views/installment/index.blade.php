@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <h2>
                            <i class="fa fa-credit-card-alt" aria-hidden="true"></i>    
                            {{ $title }}
                        </h2>
                        <hr>
                    </div>
                    @if(!$installments->count())
                        <div class="row">
                            <div class="col-12">
                                <h4><i>Nada para listar no momento...</i></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-5">
                                {{-- <a href="{{ route('installment_get_create') }}" class="btn mb-1 btn-primary">Nova compra</a> --}}
                            </div>
                        </div>
                    @else
                        <div class="">
                            @foreach ($installments as $installment)
                                <table class="table table-bordered">
                                    <thead>
                                        <tr>
                                            <th>
                                                <h2>
                                                Data da compra: {{ date_br($installment->purchase->date) }}
                                                -
                                                {{ $installment->purchase->trade_name }} / {{ $installment->purchase->description }}
                                                </h2>
                                            </th>
                                            {{-- <th>DATA</th>
                                            <th>LOCAL</th>
                                            <th>DESCRIÇÃO</th>
                                            <th>VALOR</th>
                                            <th>PARCELA(S)</th>
                                            <th>AÇÕES</th> --}}
                                        </tr>
                                    </thead>
                                    <tbody>
                                        
                                            <tr>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            <td></td>
                                            </tr>
                                    </tbody>
                                </table>
                            @endforeach
                        </div>
                    @endif
                </div>
            </div>
        </div>
    </div>
@endsection