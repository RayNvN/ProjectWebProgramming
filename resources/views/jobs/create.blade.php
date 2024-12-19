<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add New Job</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script defer src="https://cdn.jsdelivr.net/npm/alpinejs@3.x.x/dist/cdn.min.js"></script>
</head>
<body class="bg-gray-100">
    @include('jobs.header')

    <div class="container mx-auto px-4 py-8">
        <div class="max-w-2xl mx-auto">
            <div class="bg-white rounded-lg shadow-md p-6">
                <h2 class="text-2xl font-semibold mb-6">Add New Job</h2>
                
                <form action="{{ route('jobs.store') }}" method="POST">
                    @csrf
                    
                    <div class="space-y-6">
                        <!-- Title -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Job Title
                            </label>
                            <input type="text" 
                                   name="title" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            </input>
                        </div>

                        <!-- Description -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Description
                            </label>
                            <textarea name="description" 
                                      rows="4" 
                                      class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            </textarea>
                        </div>

                        <!-- Job Type -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Job Type
                            </label>
                            <select name="type" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                <option value="Full Time">Full Time</option>
                                <option value="Part Time">Part Time</option>
                                <option value="Contract">Contract</option>
                                <option value="Freelance">Freelance</option>
                            </select>
                        </div>

                        <!-- Active Until -->
                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                Active Until
                            </label>
                            <input type="date" 
                                   name="active_until" 
                                   class="w-full px-3 py-2 border border-gray-300 rounded-md">
                            </input>
                        </div>


                        <div>
                            <label class="block text-sm font-medium text-gray-700 mb-1">
                                is  active
                            </label>
                            <select name="is_active" 
                                    class="w-full px-3 py-2 border border-gray-300 rounded-md">
                                    <option value="1">True</option>
                                    <option value="0">False</option>
                            </select>
                        </div>

                        <!-- Submit Button -->
                        <div class="flex justify-end">
                            <button type="submit" 
                                    class="bg-blue-600 text-white px-4 py-2 rounded-lg hover:bg-blue-700">
                                Post Job
                            </button>
                            <a href="{{ route('jobs.index')}}" class="ms-3 bg-red-600 text-white px-4 py-2 rounded-lg hover:bg-red-700"> cancel </a>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</body>
</html>