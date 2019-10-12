@extends('layouts/app')

@section('content')

<div class="container">

    <h1>Products</h1>



    {!! Form::open(['action' => 'ProductsController@categorical_item', 'method' => 'GET'])!!}
        {{Form::select('category', ['Mobile' => 'Mobile','Laptop' => 'Laptop'], null, ['placeholder' => 'Pick a category...'])}}
        {{Form::submit('Update Category', ['class' => 'btn btn-secondary'])}}
    {!! Form::close()!!}


    @if (count($products)>0)
    <div class="row"> 
        @foreach ($products as $product)
            <div class="col-sm-6">
            
                <div class="card" style="width: 18rem;">
                    <img src="{{$product->image}}" class="card-img-top" alt="...">
                    <div class="card-body">
                        <h5 class="card-title">{{$product->p_name}}</h5>
                        <p class="card-text">{{$product->price}}</p>
                        <a href="{{url('add_to_cart/'.$product->id)}}" class="btn btn-primary">Add to Cart</a>
                    </div>
                </div>
            
            </div>
        @endforeach
        
        
    </div>
    @endif
    <br>
    {{-- <div class="d-flex justify-content-center">
        {{$products->links()}}
    </div> --}}


</div>
    
@endsection