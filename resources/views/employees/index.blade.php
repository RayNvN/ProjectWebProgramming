@extends('layouts.app')

@section('content')
<div class="container-fluid">
    <div class="row">
        <!-- Sidebar -->
        <nav class="col-md-2 d-none d-md-block bg-light sidebar">
            <div class="sidebar-sticky p-3">
                <h4>Menu</h4>
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active" href="{{ route('dashboard') }}">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="{{ route('payroll.index') }}">Payroll</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main role="main" class="col-md-10 px-4">
            <!-- Header -->
            <div class="d-flex justify-content-between align-items-center mb-4">
                <!-- Search & Notifications -->
                <div>
                    <form action="{{ route('employees.index') }}" method="GET" class="d-flex">
                        <input type="text" name="search" placeholder="Search..." class="form-control" value="{{ request()->get('search') }}">
                        <button type="submit" class="btn btn-primary ms-2">Search</button>
                    </form>
                </div>

                <div class="d-flex align-items-center">
                    <!-- Profile -->
                    <div class="me-3">
                        <a href="#" class="text-decoration-none">
                            <i class="fas fa-user-circle fa-lg"></i> Profile
                        </a>
                    </div>

                    <!-- Notifications -->
                    <div>
                        <button class="btn btn-warning">
                            <i class="fas fa-bell fa-lg"></i> Notifications
                        </button>
                    </div>
                </div>
            </div>

            <!-- Manage Employee Title -->
            <div class="d-flex justify-content-between align-items-center mb-3">
                <h2>Manage Employee</h2>
                <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
            </div>

            <!-- Employee Table -->
            <table class="table table-striped">
                <thead>
                    <tr>
                        <th>Employee Name</th>
                        <th>Phone Number</th>
                        <th>Department</th>
                        <th>Job Title</th>
                        <th>Contract Type</th>
                        <th>Attendance</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach($employees as $employee)
                    <tr>
                        <td>{{ $employee->employee_name }}</td>
                        <td>{{ $employee->phone_number }}</td>
                        <td>{{ $employee->department }}</td>
                        <td>{{ $employee->job_title }}</td>
                        <td>{{ $employee->contract_type }}</td>
                        <td>{{ $employee->attendance }}</td>
                        <td>
                            <!-- Toggle See Detail Button -->
                            <button class="btn btn-info" data-bs-toggle="modal" data-bs-target="#employeeDetailModal{{ $employee->id }}">See Detail</button>
                        </td>
                    </tr>

                    <!-- Modal for Employee Detail -->
                    <div class="modal fade" id="employeeDetailModal{{ $employee->id }}" tabindex="-1" aria-labelledby="employeeDetailLabel{{ $employee->id }}" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                                <div class="modal-header">
                                    <h5 class="modal-title" id="employeeDetailLabel{{ $employee->id }}">Employee Detail</h5>
                                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                </div>
                                <div class="modal-body">
                                    <p><strong>Name:</strong> {{ $employee->employee_name }}</p>
                                    <p><strong>Phone:</strong> {{ $employee->phone_number }}</p>
                                    <p><strong>Department:</strong> {{ $employee->department }}</p>
                                    <p><strong>Job Title:</strong> {{ $employee->job_title }}</p>
                                    <p><strong>Contract Type:</strong> {{ $employee->contract_type }}</p>
                                    <p><strong>Attendance:</strong> {{ $employee->attendance }}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </tbody>
            </table>

            <!-- Pagination -->
            {{ $employees->links() }}
        </main>
    </div>
</div>

<!-- Bootstrap JS -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
@endsection
