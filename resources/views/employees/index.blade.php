<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Bootstrap Icons for search icon -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/bootstrap-icons/1.10.0/font/bootstrap-icons.min.css" rel="stylesheet">
    <!-- Tailwind CSS for custom styling -->
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        /* Fixing the sidebar */
        body {
            margin-top: 56px; /* For the navbar */
            padding-left: 200px; /* For content to avoid sidebar overlap */
            background-color: #121212; /* Dark background for body */
            color: white; /* Text color for readability */
        }

        .sidebar {
            position: fixed;
            top: 0;
            left: 0;
            bottom: 0;
            width: 200px;
            background-color: #1f1f1f; /* Darker sidebar background */
            color: white;
            padding-top: 20px;
        }

        .topbar {
            position: fixed;
            top: 0;
            left: 200px; /* Align the top bar with the main content area */
            right: 0;
            width: calc(100% - 200px);
            background-color: #1f1f1f; /* Dark background for topbar */
            color: white;
            padding: 10px 20px;
            z-index: 999;
        }

        .main-content {
            margin-top: 100px; /* Space below the top bar */
            padding-right: 15px;
            padding-left: 15px; /* Add some padding to the left to create space from the sidebar */
        }

        .container-fluid {
            padding-left: 0;
        }

        /* Card styles */
        .card {
            background-color: #2c2c2c; /* Dark background for cards */
            border: none; /* Remove card borders */
        }

        .table-dark {
            background-color: #2c2c2c; /* Dark background for tables */
            color: white; /* White text for tables */
        }

        .badge {
            color: white;
        }

        .btn-warning {
            background-color: #ffc107; /* Yellow for warning buttons */
            border-color: #ffc107;
        }

        .btn-success {
            background-color: #28a745; /* Green for success buttons */
            border-color: #28a745;
        }
    </style>
</head>

<body class="bg-dark">

    <!-- Sidebar -->
    <div class="sidebar">
        <div class="p-3">
            <ul class="nav flex-column">
                <h3 class="fw-bold text-center text-light mb-4 text-4xl">Nexa</h3>
                <li class="nav-item mb-2">
                    <a href="{{ route('admin.dashboard') }}" class="nav-link text-light">Dashboard</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('employees.index') }}" class="nav-link text-light">Employee Management</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('Homepage') }}" class="nav-link text-light">Homepage</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('payroll.index') }}" class="nav-link text-light">Payroll Page</a>
                </li>
                <li class="nav-item mb-2">
                    <a href="{{ route('jobs.index')}}" class="nav-link text-light">Recruitment Page</a>
                </li>
            </ul>
        </div>
    </div>

    <!-- Topbar -->
    <div class="topbar my-4 d-flex justify-content-between bg-dark">
        <div class="d-flex align-items-center">
            <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2">
            <div class="d-flex flex-column text-white">
                <span class="fw-bold">Aulia Yasmin</span>
                <span class="fs-6">HR Manager</span>
            </div>
        </div>

        <div class="d-flex align-items-center">
            <form class="d-flex me-2 position-relative">
                <!-- Search Input with Icon Inside -->
                <div class="position-relative">
                    <input class="form-control ps-5 pe-5" type="search" placeholder="Search for..." aria-label="Search">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-black"></i> <!-- Icon inside the input -->
                </div>

            </form>
        </div>
    </div>


    </div>

    <!-- Main Content -->
    <div class="main-content bg-dark">
        <!-- Header -->
        

        <!-- Manage Employee Title -->
        <div class="d-flex justify-content-between align-items-center mb-3">
            <h2>Manage Employee</h2>
            <a href="{{ route('employees.create') }}" class="btn btn-success">Add Employee</a>
        </div>

        <!-- Employee Table -->
        <div class="table-responsive">
            <table class="table table-striped table-dark">
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
        </div>
       

        <!-- Pagination -->
        {{ $employees->links() }}
    </div>
</div>
</div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
