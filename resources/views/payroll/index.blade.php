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
            margin-top: 80px; /* Space below the top bar */
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
                    <a href="{{ route('dashboard') }}" class="nav-link text-light">Dashboard</a>
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
                    <a href="#" class="nav-link text-light">Recruitment Page</a>
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
            <div class="pt-5 pb-3 bg-dark">
                <h1 class="h2">Payroll Dashboard</h1>
            </div>

            <!-- Payment Method Card -->
            <div class="card mb-4 shadow-sm bg-dark text-light">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="mb-0">Payment Method</h5>
                </div>
                <div class="card-body">
                    <div class="d-flex flex-wrap justify-content-between">
                        <div class="d-flex flex-column me-4">
                            <div class="font-weight-bold">Cardholder Name:</div>
                            <div>ABC Company</div>
                        </div>
                        <div class="d-flex flex-column me-4">
                            <div class="font-weight-bold">Account Number:</div>
                            <div>1234 5678 9101 1121</div>
                        </div>
                        <div class="d-flex flex-column me-4">
                            <div class="font-weight-bold">Expiration:</div>
                            <div>12/25</div>
                        </div>
                        <div class="d-flex flex-column">
                            <div class="font-weight-bold">Payment Method:</div>
                            <div>Visa</div>
                        </div>
                    </div>
                </div>
            </div>

            <!-- Payroll Table -->
            <div class="table-responsive">
                <table class="table table-striped table-dark">
                    <thead>
                        <tr>
                            <th>Employee Name</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Total Days</th>
                            <th>Total Hours</th>
                            <th>Invoice Amount</th>
                            <th>Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($payrolls as $payroll)
                        <tr>
                            <td>{{ $payroll->employee->employee_name }} ({{ $payroll->employee->id }})</td>
                            <td>{{ $payroll->start_date }}</td>
                            <td>{{ $payroll->end_date }}</td>
                            <td>{{ $payroll->total_days ?? 'N/A' }}</td>
                            <td>{{ $payroll->total_hours ?? 'N/A' }}</td>
                            <td>${{ $payroll->invoice_amount ?? 'N/A' }}</td>
                            <td>
                                <span class="badge bg-{{ $payroll->status == 'Paid' ? 'success' : 'warning' }}">
                                    {{ $payroll->status }}
                                </span>
                            </td>
                            <td>
                                <a href="{{ route('payroll.edit', $payroll->id) }}" class="btn btn-warning btn-sm">Edit</a>
                                @if($payroll->status == 'Unpaid')
                                    <form method="POST" action="{{ route('payroll.pay', $payroll->id) }}" style="display: inline-block;">
                                        @csrf
                                        <button type="submit" class="btn btn-success btn-sm">Pay</button>
                                    </form>
                                @endif
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
