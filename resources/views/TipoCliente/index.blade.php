@extends('layouts.app')

@section('content')

    <div class="row justify-content-center">
        <div class="col-md-10">
            <div>
                
                         <tipo-cliente></tipo-cliente>
                
                    
                
                    <div>
                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif</div>
            </div>
        </div>
    </div>

@endsection