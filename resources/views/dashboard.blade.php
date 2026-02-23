@extends('layouts.app')

@section('title', 'Panel de Control')

@section('content')
    <div class="row">
        <div class="col-md-4">
            <div class="card bg-danger text-white p-3">
                <h5>Alertas de Stock</h5>
                <h3>{{ $totalAlertas }}</h3>
            </div>
        </div>
        <div class="col-md-4">
            <div class="card bg-primary text-white p-3">
                <h5>Total Productos</h5>
                <h3>{{ $totalProductos }}</h3>
            </div>
        </div>
    </div>
@endsection