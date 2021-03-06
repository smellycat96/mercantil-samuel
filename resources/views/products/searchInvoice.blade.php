@extends('layouts.app')

@section('content')
<div class="container"> 

    @if(!empty(session('codeDontTyped')))
        <div class="align-errors">
            {{session('codeDontTyped')}}
        </div>
    @endif

    @if(!empty(session('invoiceDontExist')))
        <div class="align-errors">
            {{session('invoiceDontExist')}}
        </div>
    @endif

    <p class="d-flex justify-content-center">Busque por comprovantes através de seu código.</p>

    <form method="POST">
        @csrf
        <div class="d-flex justify-content-center">       
            <div class="row">
                <div class="col-lg-9 inputBox">
                    <input type="text" class="input" name="invoice" maxlength="32" required autocomplete="off">
                    <label class="labelInput">Código do comprovante</label>
                </div>
                <div class="col-lg-3">
                    <button type="submit" class="btn btn-primary">Buscar</button>
                </div>  
            </div>
        </div>
    </form>

    <hr class="mt-5" size="4px" style="color:black">
     
</div>
@endsection
