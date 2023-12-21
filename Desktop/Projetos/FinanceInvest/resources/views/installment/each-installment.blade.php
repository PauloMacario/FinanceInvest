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
                    <div class="">
                        <form action="{{ route('installment_get_index') }}" method="GET">
                            <div class="row">
                                <div class="form-group col-md-2">
                                    Filtrar
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="shopper" name="shopper" class="form-control">
                                        
                                        <option value="0" @if($filters['shopper'] == null) selected @endif >Todos</option>
                                        
                                        @foreach ($shoppers as $shopper)
                                            <option value="{{ $shopper->id }}" @if($filters['shopper'] == $shopper->id) selected @endif>{{ $shopper->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="month" name="month" class="form-control">
                                        <option value=""></option>
                                        <option value="01" @if($filters['month'] == "01") selected @endif>JAN</option>
                                        <option value="02" @if($filters['month'] == "02") selected @endif>FEV</option>
                                        <option value="03" @if($filters['month'] == "03") selected @endif>MAR</option>
                                        <option value="04" @if($filters['month'] == "04") selected @endif>ABR</option>
                                        <option value="05" @if($filters['month'] == "05") selected @endif>MAI</option>
                                        <option value="06" @if($filters['month'] == "06") selected @endif>JUN</option>
                                        <option value="07" @if($filters['month'] == "07") selected @endif>JUL</option>
                                        <option value="08" @if($filters['month'] == "08") selected @endif>AGO</option>
                                        <option value="09" @if($filters['month'] == "09") selected @endif>SET</option>
                                        <option value="10" @if($filters['month'] == "10") selected @endif>OUT</option>
                                        <option value="11" @if($filters['month'] == "11") selected @endif>NOV</option>
                                        <option value="12" @if($filters['month'] == "12") selected @endif>DEZ</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <select id="year" name="year" class="form-control">
                                        <option value=""></option>
                                        <option value="2020" @if($filters['year'] == "2020") selected @endif>2020</option>
                                        <option value="2021" @if($filters['year'] == "2021") selected @endif>2021</option>
                                        <option value="2022" @if($filters['year'] == "2022") selected @endif>2022</option>
                                        <option value="2023" @if($filters['year'] == "2023") selected @endif>2023</option>
                                        <option value="2024" @if($filters['year'] == "2024") selected @endif>2024</option>
                                        <option value="2025" @if($filters['year'] == "2025") selected @endif>2025</option>
                                        <option value="2026" @if($filters['year'] == "2026") selected @endif>2026</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <button type="submit" class="btn btn-dark">Buscar</button>
                                </div>
                            </div>
                        </form>
                    </div>
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
                                        <td>
                                            <ul class="">
                                                <li class="">
                                                    <div class="row">
                                                        <div class="col-12 col-md-3 text-right">
                                                            <p class="text-dark">
                                                                <i>
                                                                    Data de pagamento 
                                                                </i>
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-md-3 text-center">
                                                            <p class="text-dark">
                                                                <i>
                                                                    Parcela
                                                                </i>
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <p class="text-dark">
                                                                <i>
                                                                    Valor
                                                                </i>
                                                            </p>
                                                        </div>
                                                        <div class="col-12 col-md-3">
                                                            <p class="text-dark">
                                                                <i>
                                                                    Status
                                                                </i>
                                                            </p>
                                                        </div>
                                                    </div>                                                          
                                                </li>
                                            </ul>
                                        </td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($installments as $installment)

                                        @php
                                            $total += $installment->value;
                                        @endphp

                                        <tr>
                                            <td>
                                                <ul class="">                                       
                                                    <li class="">
                                                        <div class="row">
                                                            <div class="col-12 col-md-3 text-right">
                                                                <p>
                                                                    <i>
                                                                        {{ date_br($installment->paydate) }}
                                                                    </i>
                                                                </p>
                                                            </div>
                                                            <div class="col-12 col-md-3 text-left">
                                                                <p>
                                                                    <i>
                                                                        {{ $installment->purchase->trade_name }} - {{ $installment->purchase->description }}
                                                                        ({{ $installment->installment }}/{{ $installment->purchase->number_installments }})
                                                                    </i>
                                                                </p>
                                                            </div>
                                                            <div class="col-12 col-md-3">
                                                                R$ {{ money_br($installment->value) }}
                                                            </div>
                                                            <div class="col-12 col-md-3">
                                                                {!! text_status($installment->status) !!}
                                                            </div>
                                                        </div>                                                          
                                                    </li>
                                                </ul>
                                            </td>
                                        </tr>
                                    @endforeach 
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td>
                                            <i>
                                                <h4 class="text-center">
                                                    Total: R$ {{ money_br($total) }}
                                                </h4>
                                            </i>
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