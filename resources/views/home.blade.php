@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    Welcome {{Auth::user()->name}}
                    <img src="/storage/cover_img/1mb pic_1569519875.jpg" class="card-img-top" alt="...">
                    {!! Form::open(['action' => 'ProductsController@create', 'method' => 'GET'])!!}
                        {{Form::submit('Add Product',['class' => 'btn btn-primary'])}}
                    {!! Form::close()!!}

                </div>
            </div>

                @if (count($products)>0)
                    <div class="row">
                        @foreach ($products as $product)
                        <div class="col-sm-6">
                            <div class="card" style="width: 18rem;">
                                <img src="/storage/cover_img/1mb pic_1569519875.jpg" class="card-img-top" alt="...">
                                <div class="card-body">
                                    <h5 class="card-title">{{$product->p_name}}</h5>
                                    <p class="card-text">{{$product->price}}</p>
                                    
                                    

                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                @endif

                
                   
                

        </div>
    </div>
</div>
@endsection
