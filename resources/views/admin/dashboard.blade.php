<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>HR Dashboard</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons/font/bootstrap-icons.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body class="bg-dark text-light">
    <!-- Sidebar -->
    <div class="border-end position-fixed border-light" style="width: 180px; height: 100vh; left: 0; top: 0; z-index: 1; background-color: #343a40; color: #fff;">
        <div class="p-3">
            <h3 class="fw-bold mt-3 text-center text-light">Nexa</h3>
            <ul class="list-unstyled">
                <li class="mb-2 mt-5"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-light">Dashboard</a></li>
                <li class="mb-2"><a href="{{ route('employees.index') }}" class="text-decoration-none text-light">Employee Management</a></li>
                <li class="mb-2"><a href="{{ route('admin.dashboard') }}" class="text-decoration-none text-light">Homepage</a></li>
                <li class="mb-2"><a href="{{ route('payroll.index') }}" class="text-decoration-none text-light">Payroll Page</a></li>
                <li class="mb-2"><a href="{{ route('jobs.index') }}" class="text-decoration-none text-light">Recruitment Page</a></li>
            </ul>
        </div>
    </div>

    <!-- topbar -->
    <nav class="navbar navbar-dark border-bottom border-dark fixed-top" style="z-index: 100; background-color: #343a40; color: #fff;">
        <div class="container-fluid d-flex justify-content-between">
            <div class="d-flex align-items-center" style="margin-left: 185px;">
                <img src="https://via.placeholder.com/40" alt="Profile" class="rounded-circle me-2">
                <div class="d-flex flex-column">
                    <span class="fw-bold">Aulia Yasmin</span>
                    <span class="text-light fs-6">HR Manager</span>
                </div>
            </div>

            <div class="d-flex align-items-center">
                <form class="d-flex me-2 position-relative">
                    <input class="form-control ps-5" type="search" placeholder="Search for..." aria-label="Search">
                    <i class="bi bi-search position-absolute top-50 start-0 translate-middle-y ms-3 text-dark"></i>
                </form>

                <!-- logout -->
                <form method="POST" action="{{ route('logout') }}">
                    @csrf

                    <button class="btn">
                        <i class="bi bi-box-arrow-right text-white"></i>
                    </button>
                </form>
                

            </div>
        </div>
    </nav>

    <div class="container mt-5" style="position:relative; margin-left: 250px; margin-top: 100px; z-index: 0;">
        <!-- keterangan info -->
        <div class="d-flex justify-content-center align-items-center" style="margin-top: 20px; margin-bottom: 20px;">
            <div class="card mt-4" style="width: 260px; height: 70px; background-color: #343a40; color: #fff;">
                <div class="card-body p-2">
                    <div class="row text-center h-100">
                        <div class="col border-end d-flex flex-column align-items-center justify-content-center">
                            <span class="fw-semibold">30</span>
                            <span class="fw-bold">Absent</span>
                        </div>
                        <div class="col border-end d-flex flex-column align-items-center justify-content-center">
                            <span class="fw-semibold">482</span>
                            <span class="fw-bold">Attendance</span>
                        </div>
                        <div class="col d-flex flex-column align-items-center justify-content-center">
                            <span class="fw-semibold">51</span>
                            <span class="fw-bold">Late</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- dashboard content -->
        <div class="row mb-3">
            <div class="row mb-3">
                <div class="col-12 d-flex justify-content-between align-items-center mb-3">
                    <h6 class="mb-0 text-light">Applications Received</h6>
                    <select id="timeRangeSelector" class="form-select w-auto bg-dark text-light">
                        <option value="1month">1 Month</option>
                        <option value="6months">6 Months</option>
                        <option value="1year" selected>1 Year</option>
                        <option value="all">All Time</option>
                    </select>
                </div>

                <!-- chart -->
                <div class="col-12">
                    <div class="card shadow-sm bg-dark text-light border-light">
                        <div class="card-body">
                            <canvas id="applicationsChart" style="height: 300px;"></canvas>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <div class="row">
            <!-- Card 1 -->
            <div class="col-12 col-md-3 mb-3">
                <div class="card shadow-sm bg-dark text-light">
                    <div class="card-body">
                        <h6 class="card-title mb-3">Total Employee</h6>
                        <h4 class="mb-5">563</h4>
                        <h6 class="mt-5">10% Increase</h6>
                        <canvas id="totalEmployeeChart" width="100" height="100"></canvas>
                    </div>
                </div>
            </div>

            <!-- Card 2 -->
            <div class="col-12 col-md-3 mb-3">
                <div class="card shadow-sm bg-dark text-light">
                    <div class="card-body">
                        <h6 class="card-title mb-3">Total Applications</h6>
                        <h4 class="mb-5">112</h4>
                        <h6 class="mt-5">27% Increase</h6>
                        <canvas id="totalApplicationsChart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Card 3 -->
            <div class="col-12 col-md-3 mb-3">
                <div class="card shadow-sm bg-dark text-light">
                    <div class="card-body">
                        <h6 class="card-title mb-3">Hired Candidates</h6>
                        <h4 class="mb-5">70</h4>
                        <h6 class="mt-5">4% Increase</h6>
                        <canvas id="hiredCandidatesChart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>

            <!-- Card 4 -->
            <div class="col-12 col-md-3 mb-3">
                <div class="card shadow-sm bg-dark text-light">
                    <div class="card-body">
                        <h6 class="card-title mb-3">Rejected Candidates</h6>
                        <h4 class="mb-5">42</h4>
                        <h6 class="mt-5">13% Increase</h6>
                        <canvas id="rejectedCandidatesChart" width="200" height="200"></canvas>
                    </div>
                </div>
            </div>
        </div>

        <script>
            const allData = {
                labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
                datasets: [{
                    label: 'Applications Received',
                    data: [50, 75, 100, 125, 150, 200, 180, 220, 210, 230, 250, 300],
                    borderColor: '#007BFF',
                    backgroundColor: 'rgba(0, 123, 255, 0.2)',
                    fill: true,
                    tension: 0.4
                }]
            };

            // filter data berdasarkan rentang waktu
            function getFilteredData(range) {
                let filteredLabels = [];
                let filteredData = [];

                switch (range) {
                    case '1month': // nampilin data bulan terakhir
                        filteredLabels = [allData.labels[allData.labels.length - 1]];
                        filteredData = [allData.datasets[0].data[allData.datasets[0].data.length - 1]];
                        break;
                    case '6months': // nampilin data 6 bulan terakhir
                        filteredLabels = allData.labels.slice(-6);
                        filteredData = allData.datasets[0].data.slice(-6);
                        break;
                    case '1year': // nampilin data 1 tahun terakhir
                        filteredLabels = allData.labels;
                        filteredData = allData.datasets[0].data;
                        break;
                    case 'all': //nampilin data keseluruhan
                        filteredLabels = allData.labels;
                        filteredData = allData.datasets[0].data;
                        break;
                }

                return {
                    labels: filteredLabels,
                    datasets: [{
                        label: 'Applications Received',
                        data: filteredData,
                        borderColor: '#007BFF',
                        backgroundColor: 'rgba(0, 123, 255, 0.2)',
                        fill: true,
                        tension: 0.4
                    }]
                };
            }

            // buat inisialisasi chart.js
            const ctx = document.getElementById('applicationsChart').getContext('2d');
            let applicationsChart = new Chart(ctx, {
                type: 'line',
                data: getFilteredData('1year'), // Default: 1 Tahun
                options: {
                    responsive: true,
                    plugins: {
                        legend: {
                            display: true,
                            position: 'top'
                        },
                        tooltip: {
                            enabled: true
                        }
                    },
                    scales: {
                        x: {
                            title: {
                                display: true,
                                text: 'Month'
                            }
                        },
                        y: {
                            title: {
                                display: true,
                                text: 'Number of Applications'
                            },
                            beginAtZero: true
                        }
                    }
                }
            });

            document.getElementById('timeRangeSelector').addEventListener('change', function() {
                const range = this.value;
                applicationsChart.data = getFilteredData(range);
                applicationsChart.update();
            });
            // total employee
            const totalEmployeeChart = new Chart(document.getElementById('totalEmployeeChart'), {
                type: 'pie',
                data: {
                    labels: ['Present', 'Absent'],
                    datasets: [{
                        data: [90, 10], // tar disini ganti pake data yang diambil dari $dataFromPHP['totalEmployees']
                        backgroundColor: ['#4caf50', '#f44336'],
                        borderColor: ['#ffffff', '#ffffff'],
                        borderWidth: 2
                    }]
                }
            });

            // total applications
            const totalApplicationsChart = new Chart(document.getElementById('totalApplicationsChart'), {
                type: 'pie',
                data: {
                    labels: ['Accepted', 'Rejected'],
                    datasets: [{
                        data: [80, 20],
                        backgroundColor: ['#2196f3', '#ff9800'],
                        borderColor: ['#ffffff', '#ffffff'],
                        borderWidth: 2
                    }]
                }
            });

            // hired candidates
            const hiredCandidatesChart = new Chart(document.getElementById('hiredCandidatesChart'), {
                type: 'pie',
                data: {
                    labels: ['Hired', 'Not Hired'],
                    datasets: [{
                        data: [70, 30],
                        backgroundColor: ['#8bc34a', '#9e9e9e'],
                        borderColor: ['#ffffff', '#ffffff'],
                        borderWidth: 2
                    }]
                }
            });

            // rejected candidates
            const rejectedCandidatesChart = new Chart(document.getElementById('rejectedCandidatesChart'), {
                type: 'pie',
                data: {
                    labels: ['Accepted', 'Rejected'],
                    datasets: [{
                        data: [58, 42], // contoh data doang
                        backgroundColor: ['#ff5722', '#9e9e9e'],
                        borderColor: ['#ffffff', '#ffffff'],
                        borderWidth: 2
                    }]
                },
            });
        </script>

        <!-- tabel employee performance -->
        <div class="row mt-4">
            <div class="col-12">
                <h4 class="text-light">Employee Performances</h4>
                <table class="table table-dark">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Name</th>
                            <th>Designation</th>
                            <th>Performances</th>
                            <th>Status</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>
                            <td>1</td>
                            <td>John Doe</td>
                            <td>UI/UX Designer</td>
                            <td>Good</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-primary btn-sm me-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>2</td>
                            <td>Jane Smith</td>
                            <td>UI/UX Designer</td>
                            <td>Good</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-primary btn-sm me-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                        <tr>
                            <td>3</td>
                            <td>Bob Johnson</td>
                            <td>UI/UX Designer</td>
                            <td>Good</td>
                            <td>Active</td>
                            <td>
                                <button class="btn btn-primary btn-sm me-2" title="Edit">
                                    <i class="fas fa-edit"></i>
                                </button>
                                <button class="btn btn-danger btn-sm" title="Delete">
                                    <i class="fas fa-trash-alt"></i>
                                </button>
                            </td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>

    </div>

    <!-- Bootstrap JS and dependencies -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
