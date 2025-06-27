@extends('layouts.app')

@section('content')
<div class="mb-4 d-flex justify-content-between align-items-center">
    <h2 class="fw-bold">Members</h2>
    <a href="{{ route('members.create') }}" class="btn btn-custom btn-sm">+ Add Member</a>
</div>

@if (session('success'))
    <div class="alert alert-success">{{ session('success') }}</div>
@endif

<div class="card shadow-sm p-3">
    <div class="table-responsive">
        <table class="table table-bordered table-hover align-middle text-center">
            <thead class="table-light">
                <tr>
                    <th>S/N</th>
                    <th>FIRST NAME</th>
                    <th>SURNAME</th>
                    <th>PHONE NO</th>
                    <th>EMAIL</th>
                    <th>ADDRESS</th>
                    <th>HOME ADDRESS</th>
                    <th>PROFESSION/BUSINESS</th>
                    <th>AGE < 60</th>
                    <th>AGE ≥ 60</th>
                    <th>GROUP</th>
                    <th>ACTIONS</th>
                </tr>
            </thead>
            <tbody>
                @forelse ($members as $index => $member)
                    <tr>
                        <td>{{ $index + 1 }}</td>
                        <td>{{ $member->first_name }}</td>
                        <td>{{ $member->surname }}</td>
                        <td>{{ $member->phone }}</td>
                        <td>{{ $member->email }}</td>
                        <td>{{ $member->address }}</td>
                        <td>{{ $member->home_address }}</td>
                        <td>{{ $member->profession }}</td>
                        <td>{{ $member->age < 60 ? '✔️' : '' }}</td>
                        <td>{{ $member->age >= 60 ? '✔️' : '' }}</td>
                        <td>{{ $member->group }}</td>
                        <td>
                            <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-outline-primary">Edit</a>
                            <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline">
                                @csrf @method('DELETE')
                                <button onclick="return confirm('Are you sure?')" class="btn btn-sm btn-outline-danger">Delete</button>
                            </form>
                        </td>
                    </tr>
                @empty
                    <tr><td colspan="12">No members found.</td></tr>
                @endforelse
            </tbody>
        </table>
    </div>
</div>
@endsection
