@extends('main')

@section('content')
<div class="container">
    <div class="row justify-content-center form-spacing-top">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    You are logged in!
                </div>
            </div>
        </div>
         
    </div>
    <div class="row">
            <div class="col-md-6">
             <a href="/logout" class="btn btn-primary btn-block offset-6 form-spacing-top">logout</a>
         </div>
         </div>
</div>
@endsection
