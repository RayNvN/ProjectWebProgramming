<!-- resources/views/payroll/index.blade.php -->

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Dashboard</title>
    <!-- Minimalist Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <!-- Font Awesome for icons -->
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css" rel="stylesheet">
    <!-- Tailwind CSS for custom styling -->
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-light">
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
                            <a class="nav-link" href="#">Payroll</a>
                        </li>
                    </ul>
                </div>
            </nav>

            <!-- Main Content -->
            <main role="main" class="col-md-9 ml-sm-auto col-lg-10 px-4">
                <!-- Header -->
                <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
                    <h1 class="h2">Payroll Dashboard</h1>
                    <div class="d-flex align-items-center">
                        <i class="fas fa-bell fa-lg me-3" style="cursor: pointer;"></i>
                        <i class="fas fa-user-circle fa-lg" style="cursor: pointer;"></i>
                    </div>
                </div>

                <!-- Payment Method -->
                <div class="card mb-4 shadow-sm rounded-lg">
                    <div class="card-header d-flex justify-content-between align-items-center">
                        <h5 class="mb-0">Payment Method</h5>
                    </div>
                    <div class="card-body">
                        <div class="d-flex flex-wrap justify-content-between">
                            <div class="d-flex flex-column me-4">
                                <div class="font-weight-bold text-gray-700">Cardholder Name:</div>
                                <div>ABC Company</div>
                            </div>
                            <div class="d-flex flex-column me-4">
                                <div class="font-weight-bold text-gray-700">Account Number:</div>
                                <div>1234 5678 9101 1121</div>
                            </div>
                            <div class="d-flex flex-column me-4">
                                <div class="font-weight-bold text-gray-700">Expiration:</div>
                                <div>12/25</div>
                            </div>
                            <div class="d-flex flex-column">
                                <div class="font-weight-bold text-gray-700">Payment Method:</div>
                                <div>Visa</div>
                            </div>
                        </div>
                    </div>
                </div>

                <!-- Payroll Table -->
                <table class="table table-striped">
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
                            <td>{{ $payroll->employee->name }} ({{ $payroll->employee->employee_id }})</td>
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
                                <!-- Hapus link ke show, karena kita nggak perlu itu lagi -->
                                <a href="{{ route('payroll.edit', $payroll->id) }}" class="btn btn-warning btn-sm">Edit</a>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>

            </main>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>
