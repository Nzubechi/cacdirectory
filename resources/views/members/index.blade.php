@extends('layouts.app')

@section('content')
    <div class="mb-4 d-flex justify-content-between align-items-center">
        <h2 class="fw-bold text-white">Members</h2>
        <a href="{{ route('members.create') }}" class="btn btn-primary btn-sm">+ Add Member</a>
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
                        <label class="form-label">Department(s)</label>
                        <input type="text" name="department" class="form-control" value="{{ request('department') }}"
                            placeholder="Department">
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

                    <div class="col-md-4">
                        <label class="form-label">Gender</label>
                        <select name="gender" class="form-select">
                            <option value="">All Genders</option>
                            <option value="Male" {{ request('gender') === 'Male' ? 'selected' : '' }}>Male</option>
                            <option value="Female" {{ request('gender') === 'Female' ? 'selected' : '' }}>Female</option>
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
                        <th>GENDER </th>
                        <th>DOB</th>
                        <th>HOME ADDRESS</th>
                        <th>GROUP</th>
                        <th>AGE BRACKET</th>
                        <th>DEPARTMENT</th>
                        <th>CLASS</th>
                        <th>REMARKS</th>
                        <th>ACTIONS</th>
                    </tr>
                </thead>
                <tbody>
                    @forelse ($members as $index => $member)
                        <tr>
                            <td>{{ $members->firstItem() + $index }}</td>
                            <td>{{ $member->first_name . ' ' . $member->surname }}
                                {{-- @if ($member->gender === 'Male')
                                    <span class="badge bg-primary"><i class="fas fa-mars me-1"></i> Male</span>
                                @elseif ($member->gender === 'Female')
                                    <span class="badge bg-warning text-white"><i class="fas fa-venus me-1"></i> Female</span>
                                @else
                                    <span class="badge bg-secondary"><i class="fas fa-genderless me-1"></i> N/A</span>
                                @endif --}}
                            </td>
                            <td>{{ $member->phone }}</td>
                            <td>{{ $member->email }}</td>
                            <td>{{ $member->profession }}</td>
                            <td>{{ $member->gender }} </td>
                            <td>
                                @if (\Carbon\Carbon::parse($member->dob)->year != 1900)
                                    {{ \Carbon\Carbon::parse($member->dob)->format('jS F, Y') }}
                                @else
                                    {{ \Carbon\Carbon::parse($member->dob)->format('jS F') }}
                                @endif
                            </td>
                            <td>{{ $member->home_address }}</td>
                            <td>{{ $member->group }}</td>
                            <td>
                                @if (\Carbon\Carbon::parse($member->dob)->year != 1900)
                                    {{ $member->age . ' yrs' }} -
                                    {{ $member->age < 60 ? 'Under 60' : 'Over 60' }}
                                @else
                                    {{ 'Undefined Age' }}
                                @endif
                            </td>
                            <td>{{ $member->department }}</td>
                            <td>{{ $member->class ?? 'N/A' }}</td>
                            <td>{{ $member->remark ?? 'N/A' }}</td>
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
