@extends('layouts.app')

@section('content')
<div class="container">
    <h1 class="my-4">Time Off Dashboard</h1>

    <a href="{{ route('timeoffs.create') }}" class="btn btn-primary mb-3">Create Time Off</a>

    <table class="table table-bordered">
        <thead>
            <tr>
                <th>Employee Name</th>
                <th>Start Date</th>
                <th>End Date</th>
                <th>Total Days</th>
                <th>Leave Type</th>
                <th>Status</th>
                <th>Actions</th>
            </tr>
        </thead>
        <tbody>
            @foreach($timeoffs as $timeoff)
            <tr>
                <td>{{ $timeoff->employee->employee_name ?? 'N/A' }}</td>
                <td>{{ $timeoff->leave_form }}</td>
                <td>{{ $timeoff->leave_to }}</td>
                <td>{{ $timeoff->days }}</td>
                <td>{{ $timeoff->leave_type }}</td>
                <td>{{ $timeoff->status }}</td>
                <td>
                    @if($timeoff->status == 'Pending') <!-- Jika statusnya Pending -->
                        <form action="{{ route('timeoffs.approve', $timeoff->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-success btn-sm">Approve</button>
                        </form>
                        <form action="{{ route('timeoffs.reject', $timeoff->id) }}" method="POST" style="display:inline;">
                            @csrf
                            @method('PUT')
                            <button type="submit" class="btn btn-danger btn-sm">Reject</button>
                        </form>
                    @else
                        {{ ucfirst($timeoff->status) }} <!-- Menampilkan status: Approved atau Rejected -->
                    @endif
                </td>

            </tr>
            @endforeach
        </tbody>
    </table>
</div>
@endsection
