<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Payroll Dashboard</title>
    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
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
        <div class="container mx-auto px-4 py-8">
            <!-- Header -->
            <div class="flex justify-between items-center mb-6">
                <h1 class="text-2xl font-semibold">Recruitment Dashboard</h1>
                <a href="{{ route('jobs.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Add Jobs</a>
            </div>
    
            <!-- Job Grid -->
            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
                @foreach($jobs as $job)
                <div class="bg-secondary rounded-lg shadow-md p-6">
                    <div class="mb-4">
                        <p class="text-sm text-white-600">
                            Active until {{ $job->active_until }}
                        </p>
                    </div>
                    
                    <h3 class="text-xl font-semibold mb-3">{{ $job->title }}</h3>
                    
                    <p class="text-white-600 mb-4">
                        {{ Str::limit($job->description, 100) }}
                    </p>
                    
                    <div class="flex gap-2">
                        <span class="px-3 py-1 bg-gray-200 rounded-full text-black">
                            Design
                        </span>
                        <span class="px-3 py-1 bg-gray-200 rounded-full text-black">
                            {{ $job->type }}
                        </span>
                        <span class="px-3 py-1 bg-gray-200 rounded-full text-black">
                            Onsite
                        </span>
                    </div>
                </div>
                @endforeach
            </div>
    
            <!-- Pagination -->
            <div class="mt-8">
            </div>
        </div>
        </div>
    </div>

    <!-- Bootstrap JS -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
</body>

</html>
