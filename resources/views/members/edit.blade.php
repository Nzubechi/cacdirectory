@extends('layouts.app')

@section('content')
<div class="card shadow-sm p-4">
    <div class="d-flex justify-content-between align-items-center mb-4">
        <h2 class="mb-0">Edit Member</h2>
        <a href="{{ route('members.index') }}" class="btn btn-outline-secondary">Cancel</a>
    </div>

    <form id="member-edit-form" method="POST" action="{{ route('members.update', $member) }}">
        @csrf
        @method('PUT')
        @include('members.partials.form', ['member' => $member])
        <button type="submit" class="btn btn-custom mt-3">Update Member</button>
    </form>
</div>
@endsection
