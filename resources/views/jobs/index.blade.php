<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Job Listings</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="container mx-auto px-4 py-8">
        <!-- Header -->
        <div class="flex justify-between items-center mb-6">
            <div class="relative">
                <input type="text" 
                       placeholder="Search jobs..." 
                       class="w-64 px-4 py-2 border rounded-lg">
            </div>
            <a href="{{ route('jobs.create')}}" class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">Add Jobs</a>
        </div>

        <!-- Job Grid -->
        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6">
            @foreach($jobs as $job)
            <div class="bg-white rounded-lg shadow-md p-6">
                <div class="mb-4">
                    <p class="text-sm text-gray-600">
                        Active until {{ $job->active_until }}
                    </p>
                </div>
                
                <h3 class="text-xl font-semibold mb-3">{{ $job->title }}</h3>
                
                <p class="text-gray-600 mb-4">
                    {{ Str::limit($job->description, 100) }}
                </p>
                
                <div class="flex gap-2">
                    <span class="px-3 py-1 bg-gray-200 rounded-full text-sm">
                        Design
                    </span>
                    <span class="px-3 py-1 bg-gray-200 rounded-full text-sm">
                        {{ $job->type }}
                    </span>
                    <span class="px-3 py-1 bg-gray-200 rounded-full text-sm">
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
</body>
</html>