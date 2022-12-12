@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Products') }}</div>

                <div class="card-body">
                    @if($product && $product['id'])
                    <table class="table table-striped" id="products">
                        <tbody>
                            <tr>
                                <th>Name</th>
                                <td>{{ $product['name'] }}</td>
                            </tr>
                            <tr>
                                <th>Description</th>
                                <td>{{ $product['description'] }}</td>
                            </tr>
                            <tr>
                                <th>Price</th>
                                <td>{{ $product['price'] }}</td>
                            </tr>
                        </tbody>
                    </table>
                    @else
                    <p>No product found</p>
                    @endif
                </div>
                <div class="card-footer">
                    <a href="{{ route('index') }}" class="btn btn-primary" style="float: right">Back</a>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
