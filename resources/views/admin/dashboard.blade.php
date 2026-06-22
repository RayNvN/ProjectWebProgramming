@extends('layouts.app')

@section('title', 'Nexa - HR Dashboard')

@section('content')
<!-- Include Chart.js via CDN -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="space-y-8 animate-fade-in">
    <!-- Top Stats Cards -->
    <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
        <!-- Card Attendance -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm flex items-center justify-between transition-all hover:shadow-md">
            <div>
                <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">Today Attendance</p>
                <h3 class="text-3xl font-extrabold text-indigo-600 dark:text-indigo-400 mt-2">482</h3>
                <p class="text-xs text-emerald-500 font-medium mt-1">Active on duty</p>
            </div>
            <div class="p-4 bg-indigo-50 dark:bg-indigo-950/40 text-indigo-600 dark:text-indigo-400 rounded-2xl text-2xl">👥</div>
        </div>

        <!-- Card Absent -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm flex items-center justify-between transition-all hover:shadow-md">
            <div>
                <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">Absent Employees</p>
                <h3 class="text-3xl font-extrabold text-rose-500 dark:text-rose-400 mt-2">30</h3>
                <p class="text-xs text-rose-400 font-medium mt-1">Excused / Unexcused</p>
            </div>
            <div class="p-4 bg-rose-50 dark:bg-rose-950/40 text-rose-500 dark:text-rose-400 rounded-2xl text-2xl">⚠️</div>
        </div>

        <!-- Card Late -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm flex items-center justify-between transition-all hover:shadow-md">
            <div>
                <p class="text-sm font-semibold text-slate-500 dark:text-slate-400">Late Check-ins</p>
                <h3 class="text-3xl font-extrabold text-amber-500 dark:text-amber-400 mt-2">51</h3>
                <p class="text-xs text-amber-500 font-medium mt-1">Requires follow-up</p>
            </div>
            <div class="p-4 bg-amber-50 dark:bg-amber-950/40 text-amber-500 dark:text-amber-400 rounded-2xl text-2xl">⏱️</div>
        </div>
    </div>

    <!-- Main Chart Section -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm">
        <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center mb-6 gap-4">
            <div>
                <h3 class="text-lg font-bold text-slate-900 dark:text-white">Applications Received</h3>
                <p class="text-xs text-slate-500 dark:text-slate-400">Monthly overview of candidate profiles</p>
            </div>
            <select id="timeRangeSelector" class="px-4 py-2 bg-slate-50 dark:bg-slate-950 text-slate-900 dark:text-slate-100 border border-slate-200 dark:border-slate-800 rounded-xl text-sm focus:outline-none">
                <option value="1month">Last Month</option>
                <option value="6months">6 Months</option>
                <option value="1year" selected>1 Year</option>
                <option value="all">All Time</option>
            </select>
        </div>
        <div class="relative h-[320px]">
            <canvas id="applicationsChart"></canvas>
        </div>
    </div>

    <!-- Sub Stats & Pie Charts -->
    <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-6">
        <!-- Card 1 -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm flex flex-col justify-between items-center text-center">
            <div>
                <h4 class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Total Employee</h4>
                <p class="text-2xl font-extrabold text-slate-900 dark:text-white mt-2">563</p>
                <p class="text-xs text-emerald-500 mt-1">↑ 10% Increase</p>
            </div>
            <div class="w-32 h-32 mt-4 flex items-center justify-center relative">
                <canvas id="totalEmployeeChart"></canvas>
            </div>
        </div>

        <!-- Card 2 -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm flex flex-col justify-between items-center text-center">
            <div>
                <h4 class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Total Applications</h4>
                <p class="text-2xl font-extrabold text-slate-900 dark:text-white mt-2">112</p>
                <p class="text-xs text-emerald-500 mt-1">↑ 27% Increase</p>
            </div>
            <div class="w-32 h-32 mt-4 flex items-center justify-center relative">
                <canvas id="totalApplicationsChart"></canvas>
            </div>
        </div>

        <!-- Card 3 -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm flex flex-col justify-between items-center text-center">
            <div>
                <h4 class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Hired Candidates</h4>
                <p class="text-2xl font-extrabold text-slate-900 dark:text-white mt-2">70</p>
                <p class="text-xs text-emerald-500 mt-1">↑ 4% Increase</p>
            </div>
            <div class="w-32 h-32 mt-4 flex items-center justify-center relative">
                <canvas id="hiredCandidatesChart"></canvas>
            </div>
        </div>

        <!-- Card 4 -->
        <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-6 rounded-2xl shadow-sm flex flex-col justify-between items-center text-center">
            <div>
                <h4 class="text-xs font-semibold text-slate-500 dark:text-slate-400 uppercase tracking-wider">Rejected Candidates</h4>
                <p class="text-2xl font-extrabold text-slate-900 dark:text-white mt-2">42</p>
                <p class="text-xs text-rose-500 mt-1">↓ 13% Decrease</p>
            </div>
            <div class="w-32 h-32 mt-4 flex items-center justify-center relative">
                <canvas id="rejectedCandidatesChart"></canvas>
            </div>
        </div>
    </div>

    <!-- Employee Performances Table -->
    <div class="bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-sm overflow-hidden">
        <div class="px-6 py-5 border-b border-slate-200 dark:border-slate-800">
            <h3 class="text-lg font-bold text-slate-900 dark:text-white">Employee Performances</h3>
            <p class="text-xs text-slate-500 dark:text-slate-400">Quarterly performance metrics</p>
        </div>
        <div class="overflow-x-auto">
            <table class="w-full text-left border-collapse">
                <thead>
                    <tr class="bg-slate-50 dark:bg-slate-950 text-slate-600 dark:text-slate-400 text-xs font-bold uppercase tracking-wider">
                        <th class="px-6 py-4">ID</th>
                        <th class="px-6 py-4">Name</th>
                        <th class="px-6 py-4">Designation</th>
                        <th class="px-6 py-4">Performance</th>
                        <th class="px-6 py-4">Status</th>
                    </tr>
                </thead>
                <tbody class="divide-y divide-slate-200 dark:divide-slate-800/80 text-sm">
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4 font-semibold">1</td>
                        <td class="px-6 py-4 font-medium text-slate-900 dark:text-white">John Doe</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">UI/UX Designer</td>
                        <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 dark:bg-emerald-950/50 text-emerald-800 dark:text-emerald-400">Good</span></td>
                        <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-100 dark:bg-indigo-950/50 text-indigo-800 dark:text-indigo-400">Active</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4 font-semibold">2</td>
                        <td class="px-6 py-4 font-medium text-slate-900 dark:text-white">Jane Smith</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">UI/UX Designer</td>
                        <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 dark:bg-emerald-950/50 text-emerald-800 dark:text-emerald-400">Good</span></td>
                        <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-100 dark:bg-indigo-950/50 text-indigo-800 dark:text-indigo-400">Active</span></td>
                    </tr>
                    <tr class="hover:bg-slate-50/50 dark:hover:bg-slate-800/30 transition-colors">
                        <td class="px-6 py-4 font-semibold">3</td>
                        <td class="px-6 py-4 font-medium text-slate-900 dark:text-white">Bob Johnson</td>
                        <td class="px-6 py-4 text-slate-600 dark:text-slate-400">UI/UX Designer</td>
                        <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-emerald-100 dark:bg-emerald-950/50 text-emerald-800 dark:text-emerald-400">Good</span></td>
                        <td class="px-6 py-4"><span class="inline-flex items-center px-2.5 py-0.5 rounded-full text-xs font-semibold bg-indigo-100 dark:bg-indigo-950/50 text-indigo-800 dark:text-indigo-400">Active</span></td>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
</div>

<script>
    const allData = {
        labels: ['January', 'February', 'March', 'April', 'May', 'June', 'July', 'August', 'September', 'October', 'November', 'December'],
        datasets: [{
            label: 'Applications Received',
            data: [50, 75, 100, 125, 150, 200, 180, 220, 210, 230, 250, 300],
            borderColor: '#6366f1',
            backgroundColor: 'rgba(99, 102, 241, 0.1)',
            fill: true,
            tension: 0.4
        }]
    };

    function getFilteredData(range) {
        let filteredLabels = [];
        let filteredData = [];

        switch (range) {
            case '1month':
                filteredLabels = [allData.labels[allData.labels.length - 1]];
                filteredData = [allData.datasets[0].data[allData.datasets[0].data.length - 1]];
                break;
            case '6months':
                filteredLabels = allData.labels.slice(-6);
                filteredData = allData.datasets[0].data.slice(-6);
                break;
            case '1year':
            case 'all':
                filteredLabels = allData.labels;
                filteredData = allData.datasets[0].data;
                break;
        }

        return {
            labels: filteredLabels,
            datasets: [{
                label: 'Applications Received',
                data: filteredData,
                borderColor: '#6366f1',
                backgroundColor: 'rgba(99, 102, 241, 0.1)',
                fill: true,
                tension: 0.4
            }]
        };
    }

    // Initialize Chart
    document.addEventListener("DOMContentLoaded", function() {
        const ctx = document.getElementById('applicationsChart').getContext('2d');
        let applicationsChart = new Chart(ctx, {
            type: 'line',
            data: getFilteredData('1year'),
            options: {
                responsive: true,
                maintainAspectRatio: false,
                plugins: {
                    legend: { display: false }
                },
                scales: {
                    x: { grid: { display: false } },
                    y: { beginAtZero: true }
                }
            }
        });

        document.getElementById('timeRangeSelector').addEventListener('change', function() {
            applicationsChart.data = getFilteredData(this.value);
            applicationsChart.update();
        });

        // PIE CHARTS
        new Chart(document.getElementById('totalEmployeeChart'), {
            type: 'doughnut',
            data: {
                labels: ['Present', 'Absent'],
                datasets: [{
                    data: [90, 10],
                    backgroundColor: ['#10b981', '#f43f5e'],
                    borderWidth: 0
                }]
            },
            options: { plugins: { legend: { display: false } } }
        });

        new Chart(document.getElementById('totalApplicationsChart'), {
            type: 'doughnut',
            data: {
                labels: ['Accepted', 'Rejected'],
                datasets: [{
                    data: [80, 20],
                    backgroundColor: ['#6366f1', '#f59e0b'],
                    borderWidth: 0
                }]
            },
            options: { plugins: { legend: { display: false } } }
        });

        new Chart(document.getElementById('hiredCandidatesChart'), {
            type: 'doughnut',
            data: {
                labels: ['Hired', 'Not Hired'],
                datasets: [{
                    data: [70, 30],
                    backgroundColor: ['#10b981', '#94a3b8'],
                    borderWidth: 0
                }]
            },
            options: { plugins: { legend: { display: false } } }
        });

        new Chart(document.getElementById('rejectedCandidatesChart'), {
            type: 'doughnut',
            data: {
                labels: ['Accepted', 'Rejected'],
                datasets: [{
                    data: [58, 42],
                    backgroundColor: ['#f43f5e', '#94a3b8'],
                    borderWidth: 0
                }]
            },
            options: { plugins: { legend: { display: false } } }
        });
    });
</script>
@endsection
