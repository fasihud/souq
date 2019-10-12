@extends('layouts/app')

@section('content')
    <h1>Add Product</h1>

    {!! Form::open(['action' => 'ProductsController@store', 'method' => 'POST', 'enctype' => 'multipart/form-data'])!!}

    <div class="form-group">
        {{Form::label('product_name', 'Product Name', ['class' => 'awesome'])}}
        {{Form::text('p_name', '', ['class' => 'form-control', 'placeholder' => 'Enter Product Name'])}}
    </div>

    <div class="form-group">
        {{Form::label('product_category', 'Select Category', ['class' => 'awesome'])}}
        {{Form::select('category', ['Mobile' => 'Mobile', 'Laptop' => 'Laptop'], null, ['placeholder' => 'Pick a category...'])}}
    </div>

    <div class="form-group">
        {{Form::label('product_price', 'Product Price', ['class' => 'awesome'])}}
        {{Form::number('price', '', ['class' => 'form-control'])}}
    </div>

    <div class="form-group">
        {{Form::file('image')}}
    </div>

    {{Form::submit('Submit',['class' => 'btn btn-primary'])}}
    {!! Form::close()!!}

@endsection