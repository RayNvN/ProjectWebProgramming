<!-- resources/views/timeoffs/edit.blade.php -->
@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Edit Time Off</h1>

    <form action="{{ route('timeoffs.update', $timeoff->id) }}" method="POST">
        @csrf
        @method('PUT')

        <div class="form-group">
            <label for="employee_id">Employee</label>
            <select class="form-control" id="employee_id" name="employee_id">
                @foreach($employees as $employee)
                    <option value="{{ $employee->id }}" {{ $employee->id == $timeoff->employee_id ? 'selected' : '' }}>
                        {{ $employee->employee_name }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="leave_form">Leave From</label>
            <input type="date" class="form-control" id="leave_form" name="leave_form" value="{{ $timeoff->leave_form }}">
        </div>

        <div class="form-group">
            <label for="leave_to">Leave To</label>
            <input type="date" class="form-control" id="leave_to" name="leave_to" value="{{ $timeoff->leave_to }}">
        </div>

        <div class="form-group">
            <label for="days">Total Days</label>
            <input type="number" class="form-control" id="days" name="days" value="{{ $timeoff->days }}">
        </div>

        <div class="form-group">
            <label for="leave_type">Leave Type</label>
            <input type="text" class="form-control" id="leave_type" name="leave_type" value="{{ $timeoff->leave_type }}">
        </div>

        <div class="form-group">
            <label for="status">Status</label>
            <select class="form-control" id="status" name="status">
                <option value="approved" {{ $timeoff->status == 'approved' ? 'selected' : '' }}>Approved</option>
                <option value="pending" {{ $timeoff->status == 'pending' ? 'selected' : '' }}>Pending</option>
                <option value="rejected" {{ $timeoff->status == 'rejected' ? 'selected' : '' }}>Rejected</option>
            </select>
        </div>

        <button type="submit" class="btn btn-primary">Update</button>
    </form>
</div>
@endsection
