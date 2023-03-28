@extends('admin.layout.master')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <div class="card p-3 shadow position-relative">
                <a href="{{ route('companies.index') }}" class="fs-4 text-decoration-none position-absolute btn btn-sm top-3"
                    style="background: rgb(222, 223, 189)">
                    🔙
                </a>
                <div class=" my-3">
                    <h1 class="fs-2 text-center">Upadte {{ $company->name }}</h1>
                </div>
                <form method="POST" action="{{ route('companies.update' , $company->id) }}" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')
                    <div class="mb-3">
                        <label for="name" class="form-label">Name *</label>
                        <input type="text" name="name" class="form-control @error('name') is-invalid  @enderror"
                            id="name" value="{{ old('name', $company->name) }}" required>
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email </label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror"
                            value="{{ old('email', $company->email) }}" id="exampleInputEmail1">
                        @error('email')
                            <div class="text-danger mt-2">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Website</label>
                        <input type="text" name="website" value="{{ old('website', $company->website) }}"
                            class="form-control @error('website') is-invalid  @enderror" id="website"
                            placeholder="Ex:- https://example.com">
                        @error('website')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="logo" class="form-label">Logo</label>
                        <input type="file" name="logo" class="form-control @error('logo') is-invalid  @enderror"
                            id="logo">
                        @error('logo')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror

                        @if ($company->logo)
                            <img src="{{ asset('storage/' . $company->logo) }}" alt="" class="img-fluid mt-3" width="100" />


                        @endif
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>

    </div>
@endsection
