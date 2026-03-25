@extends('layout.app')
@section('title', 'Home')

@section('content')
            <div class="card-body">
                <div class="d-flex flex-wrap">
                    @foreach($products as $product)
                    <div class="card m-2" style="width: 18rem;">
                        <img class="card-img-top"
                         src="{{ $product->image ? asset('storage/'.$product->image)  : asset('default.jpg')}}" 
                         alt="{{ $product->name }}">
                        <div class="card-body">
                            <h5 class="card-title">{{ $product->name }}</h5>
                            <p class="card-text"> {{ $product->description }}</p>
                            <a href="#" class="btn btn-primary">Go somewhere</a>
                        </div>
                    </div>
                      @endforeach
                </div>
             </div>   
@endsection