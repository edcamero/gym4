@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row  justify-content-center">
        <div class="col-md-8">
            <div>
                
                       <cargar-empleado/>
                
                
                    <div>
                    @if (session('status'))
                            <div class="alert alert-success" role="alert">
                                {{ session('status') }}
                            </div>
                    @endif</div>
            </div>
        </div>
    </div>
</div>
@endsection