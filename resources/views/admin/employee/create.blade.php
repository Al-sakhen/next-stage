@extends('admin.layout.master')

@section('content')
    <div class="row justify-content-center mt-3">
        <div class="col-lg-6">
            <div class="card p-3 shadow position-relative">
                <a href="{{ route('employees.index') }}" class="fs-4 text-decoration-none position-absolute btn btn-sm top-3"
                    style="background: rgb(222, 223, 189)">
                    🔙
                </a>
                <div class=" my-3">
                    <h1 class="fs-2 text-center">Create new employee</h1>
                </div>
                <form method="POST" action="{{ route('employees.store') }}">
                    @csrf
                    <div class="mb-3">
                        <label for="first_name" class="form-label">First Name *</label>
                        <input type="text" name="first_name"
                            class="form-control @error('first_name') is-invalid  @enderror" id="first_name"
                            value="{{ old('first_name') }}" required>
                        @error('first_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="last_name" class="form-label">Last Name *</label>
                        <input type="text" name="last_name"
                            class="form-control @error('last_name') is-invalid  @enderror" id="last_name"
                            value="{{ old('last_name') }}" required>
                        @error('last_name')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="exampleInputEmail1" class="form-label">Email </label>
                        <input type="email" name="email" class="form-control @error('email') is-invalid  @enderror"
                            value="{{ old('email') }}" id="exampleInputEmail1">
                        @error('email')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="phone" class="form-label">Phone </label>
                        <input type="text" name="phone" class="form-control @error('phone') is-invalid  @enderror"
                            value="{{ old('phone') }}" id="phone">
                        @error('phone')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <div class="mb-3">
                        <label for="website" class="form-label">Company</label>
                        <select name="company_id" class="form-select @error('company_id') is-invalid  @enderror"
                            aria-label="Default select example">
                            <option selected>Select company</option>
                            @foreach ($companies as $company)
                                <option value="{{ $company->id }}" @selected($company->id == old('company_id'))>{{ $company->name }}</option>
                            @endforeach
                        </select>

                        @error('company_id')
                            <div class="invalid-feedback">{{ $message }}</div>
                        @enderror
                    </div>
                    <button type="submit" class="btn btn-primary">Create</button>
                </form>
            </div>
        </div>

    </div>
@endsection
