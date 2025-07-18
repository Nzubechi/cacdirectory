@extends('layouts.app')

@section('content')
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h2 class="fw-bold">Members</h2>
        <a href="{{ route('members.create') }}" class="btn btn-custom btn-sm">+ Add Member</a>
    </div>

    @if (session('success'))
        <div class="alert alert-success">{{ session('success') }}</div>
    @endif

    <!-- Filter + Search Form -->
    <div class="card mb-4 shadow-sm">
        <div class="card-body">
            <form method="GET">
                <div class="row g-3 mb-3">
                    <div class="col-md-4">
                        <label class="form-label">Search</label>
                        <input type="text" name="search" class="form-control" value="{{ request('search') }}"
                            placeholder="Name, Email, Phone, Profession, etc">
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Group</label>
                        <select name="group" class="form-select">
                            <option value="">All Groups</option>
                            @foreach ($groups as $group)
                                <option value="{{ $group }}" {{ request('group') == $group ? 'selected' : '' }}>
                                    {{ $group }}
                                </option>
                            @endforeach
                        </select>
                    </div>

                    <div class="col-md-4">
                        <label class="form-label">Age Category</label>
                        <select name="age" class="form-select">
                            <option value="">All Ages</option>
                            <option value="below60" {{ request('age') == 'below60' ? 'selected' : '' }}>Under 60</option>
                            <option value="above60" {{ request('age') == 'above60' ? 'selected' : '' }}>60 and Above
                            </option>
                        </select>
                    </div>
                </div>

                <div class="row g-3">
                    <div class="col-md-2">
                        <button type="submit" class="btn btn-primary w-100">
                            <i class="fas fa-search me-1"></i> Search
                        </button>
                    </div>

                    <div class="col-md-2">
                        <a href="{{ route('members.index') }}" class="btn btn-outline-secondary w-100">
                            <i class="fas fa-undo me-1"></i> Reset
                        </a>
                    </div>
                </div>
            </form>
        </div>
    </div>


    <!-- Table -->
    <div class="card shadow-sm p-3">
        <div class="table-responsive">
            <table class="table table-bordered table-hover align-middle text-center">
                <thead class="table-light">
                    <tr>
                        <th>S/N</th>
                        <th>FULL NAME</th>
                        <th>PHONE NO</th>
                        <th>EMAIL</th>
                        <th>PROFESSION/BUSINESS</th>
                        {{-- <th>AGE < 60</th>
                        <th>AGE ≥ 60</th> --}}
                        <th>GROUP</th>
                        <th>AGE BRACKET</th>
                        <th>DEPARTMENT</th>
                        <th>CLASS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $index => $member)
                        <tr>
                            <td>{{ $members->firstItem() + $index }}</td>
                            <td>{{ $member->first_name . ' ' . $member->surname }}</td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->profession }}</td>
                            {{-- <td>{{ $member->age < 60 ? '✔️' : '' }}</td>
                            <td>{{ $member->age >= 60 ? '✔️' : '' }}</td> --}}
                            <td>{{ $member->group }}</td>
                            <td>{{ $member->age . " yrs" }} - {{ $member->age < 60 ? 'Under 60' : 'Over 60' }}</td>
                            <td>{{ $member->department }}</td>
                            <td>{{ $member->class ?? 'N/A' }}</td>
                            <td class="text-nowrap">
                                <a href="{{ route('members.edit', $member) }}" class="btn btn-sm btn-outline-primary"
                                    title="Edit">
                                    <i class="fas fa-edit"></i>
                                </a>

                                <form action="{{ route('members.destroy', $member) }}" method="POST" class="d-inline"
                                    onsubmit="return confirm('Are you sure?');">
                                    @csrf
                                    @method('DELETE')
                                    <button type="submit" class="btn btn-sm btn-outline-danger" title="Delete">
                                        <i class="fas fa-trash-alt"></i>
                                    </button>
                                </form>
                            </td>

                        </tr>
                    @empty
                        <tr>
                            <td colspan="12">No members found.</td>
                        </tr>
                    @endforelse
                </tbody>
            </table>
        </div>

        <!-- Pagination Links -->
        <div class="mt-3">
            {{ $members->links() }}
        </div>
    </div>
@endsection
