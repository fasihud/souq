@extends('layouts.app')

@section('content')

<?php $total = 0 ?>

<h1>Cart Items</h1>

<div class="container">

    <ul class="list-group">
        <li class="list-group-item list-group-item-primary">Dapibus ac facilisis in</li>
      
        @if (session('cart'))

            @foreach (session('cart') as $id => $details)

                


                <li class="list-group-item d-flex justify-content-between align-items-center"><span class="float-left"> {{$details['p_name']}}</span>
                    
                    {!! Form::open(['action' => ['ProductsController@update_cart', $id], 'method' => 'POST', 'class' => 'float-sm-right'])!!}
                        {{Form::submit('Update Cart', ['class' => 'btn btn-secondary'])}}
                        {{Form::number('qty', $details['quantity'], ['class' => 'form-control quantity'])}}
                        {{Form::hidden('_method', 'PUT')}}

                    {!! Form::close()!!}

                    {!! Form::open(['action' => ['ProductsController@delete_item', $id], 'method' => 'POST', 'class' => 'float-sm-right'])!!}
                        {{Form::hidden('_method', 'DELETE')}}
                        {{Form::submit('Delete', ['class' => 'btn btn-danger'])}}
                    {!! Form::close()!!}
        
                    <span class="badge badge-primary badge-pill float-right">Rs.{{$details['price'] * $details['quantity']}}</span>
                    
                </li>
                
                <?php $total += $details['price'] * $details['quantity'] ?>
                
                
            @endforeach
            
        @endif

        <li class="list-group-item list-group-item-primary">Total Price: {{$total}}</li>

    </ul>

</div>
    
@endsection