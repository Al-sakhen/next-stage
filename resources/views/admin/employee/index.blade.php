@extends('admin.layout.master')

@section('content')
    <div class="card px-4 pt-2 mt-3 shadow">
        <div class="d-flex align-items-center my-3">
            <h1 class="fs-3">Employees</h1>
            <a href="{{ route('employees.create') }}" class="btn btn-sm btn-success ms-auto"
                style="max-width: fit-content">Create new employee</a>
        </div>
        <div class="table-responsive">
            <table class="table table-hover mb-2 ">
                <thead>
                    <tr>
                        <th scope="col">#</th>
                        <th scope="col">First Name</th>
                        <th scope="col">Last Name</th>
                        <th scope="col">Email</th>
                        <th scope="col">Phone</th>
                        <th scope="col">Company</th>
                        <th scope="col">Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($employees as $employee)
                        <tr>
                            <th scope="row">{{ $loop->iteration }}</th>
                            <td>{{ $employee->first_name }}</td>
                            <td>{{ $employee->last_name }}</td>
                            <td> {{ $employee->email }} </td>
                            <td>{{ $employee->phone }}</td>
                            <td>{{ $employee->company->name }}</td>
                            <td>
                                <a href="{{ route('employees.edit', $employee->id) }}" class="btn btn-sm btn-primary">Edit</a>
                                <form action="{{ route('employees.destroy', $employee->id) }}" method="POST" class="d-inline">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-danger">Delete</button>
                                </form>
                            </td>
                        </tr>

                    @empty
                        <tr>
                            <td colspan="7" class="text-center">No employees found</td>
                        </tr>
                    @endforelse

                </tbody>
            </table>
        </div>
        {{ $employees->links() }}
    </div>
@endsection
