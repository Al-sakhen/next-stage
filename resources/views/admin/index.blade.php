@extends('admin.layout.master')

@push('css')
    <style>
        .card{
            background-color: #f5f5f5;
            padding: 20px;
            text-align: center;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0,0,0,0.1);
            transition: all 0.3s ease;
        }
        .card a{
            text-decoration: none;
            color: #000;
        }
        .card:hover{
            box-shadow: 0 0 10px rgba(0,0,0,0.3);
            transform: translateY(-5px)
        }
        .card span{
            font-weight: bold;
            color: rgb(194, 180, 180);
            font-size: 16px;
        }
    </style>
@endpush

@section('content')
<div class="container">
    <div class="row justify-content-center pt-5">
        <div class="col-md-3">
            <div class="card">
                <a href="{{ route('companies.index') }}">
                    <h2>Companies</h2>
                    <span>{{ $companies_count }}</span>
                </a>
            </div>
        </div>
        <div class="col-md-3">
            <div class="card">
                <a href="{{ route('employees.index') }}">
                    <h2>Employees</h2>
                    <span>{{ $employees_count }}</span>
                </a>
            </div>
        </div>
    </div>
</div>
@endsection
