@extends('admin.layout.master')

@section('content')
    <div class="card px-4 pt-2 mt-3 shadow">
        <div class="d-flex align-items-center my-3">
            <h1 class="fs-3">Companies</h1>
            <a href="{{ route('companies.create') }}" class="btn btn-sm btn-success ms-auto"
                style="max-width: fit-content">Create new company</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-2 ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Logo</th>
                        <th scope="col">Webiste</th>
                        <th scope="col">Employees count</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($companies as $company)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $company->name }}</td>
                            <td>{{ $company->email }}</td>
                            <td>
                                @if ($company->logo)
                                    <img src="{{ asset('storage/' . $company->logo) }}" alt="logo" width="50px"
                                        height="50px">
                                @else
                                    -
                                @endif
                            </td>
                            <td>{{ $company->website }}</td>
                            <td>{{ $company->employees_count }}</td>
                            <td>
                                <a href="{{ route('companies.edit', $company->id) }}"
                                    class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('companies.destroy', $company->id) }}" method="POST"
                                    class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No data found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        {{ $companies->links() }}
    </div>
@endsection
