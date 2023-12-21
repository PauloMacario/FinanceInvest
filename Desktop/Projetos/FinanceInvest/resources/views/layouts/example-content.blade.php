@extends('layouts.base')

@section('content')
    <div class="row">
        <div class="col-lg-12">
            <div class="card">
                <div class="card-body">
                    <div class="card-title mb-4">
                        <h2>
                            <i class="fa fa-shopping-cart" aria-hidden="true"></i>    
                            TITLE
                        </h2>
                        <hr>
                    </div>
                    {{-- @if(!$collection->count())
                        <div class="row">
                            <div class="col-12">
                                <h4><i>Nada para listar no momento...</i></h4>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-12 mt-5">
                                <a href="{{ route('route') }}" class="btn mb-1 btn-primary">New recurse</a>
                            </div>
                        </div>
                    @else
                        <div class="">
                            loren
                        </div>
                    @endif --}}
                </div>
            </div>
        </div>
    </div>
@endsection