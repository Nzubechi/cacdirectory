@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Add New Member</h2>
        <a href="{{ route('members.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>

    <form method="POST" action="{{ route('members.store') }}">
        @csrf
        @include('members.partials.form', ['member' => null])
        <button type="submit" class="btn btn-primary mt-3">Save Member</button>
    </form>
</div>
@endsection
