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

                    <form action="{{ route('purchase_get_purchaseAndInstallmentsByDate') }}" method="GET">
                        <div class="row">
                                <div class="form-group col-md-2">
                                    Busca por data
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="month" name="month" class="form-control">
                                        <option value="01">JAN</option>
                                        <option value="02">FEV</option>
                                        <option value="03">MAR</option>
                                        <option value="04">ABR</option>
                                        <option value="05">MAI</option>
                                        <option value="06">JUN</option>
                                        <option value="07">JUL</option>
                                        <option value="08">AGO</option>
                                        <option value="09">SET</option>
                                        <option value="10">OUT</option>
                                        <option value="01">NOV</option>
                                        <option value="12">DEZ</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="year" name="year" class="form-control">
                                        <option value="2023">2023</option>
                                        <option value="2024">2024</option>
                                        <option value="2025">2025</option>
                                        <option value="2026">2026</option>
                                        <option value="2020">2027</option>
                                        <option value="2021">2028</option>
                                        <option value="2022">2029</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-dark btn-lg">Buscar</button>
                                </div>
                            </div>
                        </form>

                    @if(! $installments->count())
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
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <td>Data pagamento</td>
                                        <td>Descrição</td>
                                        <td>Valor</td>
                                        <td>Situação</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($installments as $installment)

                                        @php
                                            $total += $installment->value;
                                        @endphp

                                        <tr>
                                            <td>{{ date_br($installment->paydate) }}</td>
                                            <td>
                                                {{ $installment->purchase->trade_name}}
                                                 - 
                                                {{ $installment->purchase->description}}
                                                ({{ $installment->installment }} / {{ $installment->purchase->number_installments }})
                                            </td>
                                            <td>R$ {{ money_br($installment->value) }}</td>
                                            <td>{!! text_status($installment->status) !!}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <th colspan="4" class="text-center">
                                            Total:
                                            R$ {{ $total }}
                                        </th>
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