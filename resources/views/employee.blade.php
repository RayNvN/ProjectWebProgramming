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
                        <a class="nav-link active" href="#">Dashboard</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">Employees</a>
                    </li>
                </ul>
            </div>
        </nav>

        <!-- Main Content -->
        <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
            <!-- Header -->
            <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                <h1 class="h2">Manage Employees</h1>
                <div class="d-flex align-items-center">
                    <button class="btn btn-outline-primary me-3">Profile</button>
                    <button class="btn btn-outline-danger">Notifications</button>
                </div>
            </div>

            <!-- Add Employee Button -->
            <div class="mb-4 d-flex justify-content-between">
                <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
            </div>

            <!-- Employee Table -->
            <div class="table-responsive">
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
                            <td>{{ $employee->attendance ? 'Present' : 'Absent' }}</td>
                            <td>
                                <a href="{{ route('employees.show', $employee->id) }}" class="btn btn-info btn-sm">See Details</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </main>
    </div>
</div>
@endsection
