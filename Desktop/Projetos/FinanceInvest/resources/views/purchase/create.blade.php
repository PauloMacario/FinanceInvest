@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <h2>
                            <i class="fa fa-plus-circle" aria-hidden="true"></i>
                            {{ $title }}
                        </h2>
                        <hr>
                    </div>
                    <div class="basic-form">
                        <form action="{{ route('purchase_post_store') }}" method="POST">
                            @csrf
                            <div class="form-row">
                                <div class="form-group col-md-2">
                                    <label>Tipo de pagamento</label>
                                    <select id="type" name="type_id" class="form-control" required>
                                        <option selected="selected" value="0">Selecione...</option>
                                        @foreach ($types as $type)
                                            <option value="{{ $type->id }}" data-active-installment="{{ $type->active_installment }}">{{ $type->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Segmento</label>
                                    <select id="segment" name="segment_id" class="form-control" required>
                                        <option selected="selected" value="0">Selecione...</option>
                                        @foreach ($segments as $segment)
                                            <option value="{{ $segment->id }}">{{ $segment->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Compradora(a)</label>
                                    <select id="shopper" name="shopper_id" class="form-control" required>
                                        <option selected="selected" value="0">Selecione...</option>
                                        @foreach ($shoppers as $shopper)
                                            <option value="{{ $shopper->id }}">{{ $shopper->name }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Data</label>
                                    <input type="date" name="date" class="form-control" required>
                                </div>                                
                            </div>

                            <div class="form-row">
                                <div class="form-group col-md-3">
                                    <label>Descrição</label>
                                    <input type="text" name="description" class="form-control" placeholder="Ex: Calça jeans" required>
                                </div>
                                <div class="form-group col-md-3">
                                    <label>Loja ou local</label>
                                    <input type="text" name="trade_name" class="form-control" placeholder="Ex: Loja Roupas X" required>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Valor</label>
                                    <input type="text" id="value" name="value" class="form-control">
                                </div>
                            </div>
                            <div class="form-row">
                                <div class="form-group col-md-4">
                                    <label>Parcelado</label>
                                    <select id="number_installment" name="number_installments" class="form-control" disabled>
                                        <option value="" selected="selected">Selecione...</option>
                                        <option value="1">1X</option>
                                        @for ($i = 2; $i < 25; $i++)
                                            <option value="{{ $i }}">{{ $i }}X</option>
                                        @endfor      
                                        <option value="36">36X</option>
                                        <option value="48">48X</option>
                                        <option value="60">60X</option>
                                        <option value="72">72X</option>
                                        <option value="84">84X</option>
                                        <option value="96">96X</option>
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Dia fechamento</label>
                                    <select id="processing_day" name="processing_day" class="form-control" disabled>
                                        <option value="1" selected>Dia 1</option>
                                        @for ($i = 2; $i < 28; $i++)
                                            <option value="{{ $i }}">Dia {{ $i }}</option>
                                        @endfor        
                                    </select>
                                </div>
                                <div class="form-group col-md-2">
                                    <label>Dia pagamento</label>
                                    <select id="payday" name="payday" class="form-control" disabled>
                                        <option value="1" selected>Dia 1</option>
                                        @for ($i = 2; $i < 28; $i++)
                                            <option value="{{ $i }}">Dia {{ $i }}</option>
                                        @endfor      
                                    </select>
                                </div>        
                            </div>
                            <button type="submit" class="btn btn-dark">Cadastrar compra</button>
                        </form>
                    </div>                    
                </div>
            </div>
        </div>
    </div>
@endsection

@section('script')
    <script>
        $(document).ready( function () {

            $('#value').mask("#.###.###,##", {reverse: true});
            $('#type').change( function (e) {
                let active_installment = $('#type option:selected').attr('data-active-installment')

                if (active_installment == 0) {
                    $('#number_installment').attr('disabled', 'disabled').removeAttr("required", "req")
                    $('#processing_day').attr('disabled', 'disabled').removeAttr("required", "req")
                    $('#payday').attr('disabled', 'disabled').removeAttr("required", "req")
                }

                if (active_installment == 1) {
                    $('#number_installment').removeAttr('disabled').attr("required", "req")
                    $('#processing_day').removeAttr('disabled').attr("required", "req")
                    $('#payday').removeAttr('disabled').attr("required", "req")
                }
            })
        });    
    </script>    

@endsection



