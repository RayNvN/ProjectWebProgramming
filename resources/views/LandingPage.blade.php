@extends('layouts.landing')

@section('title', 'Nexa - Optimize Your HR Workflow Today')

@section('content')
<!-- Hero Section -->
<section class="relative overflow-hidden pt-20 pb-28 md:pt-28 md:pb-36 bg-gradient-to-b from-indigo-50/50 via-transparent to-transparent dark:from-slate-900/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="grid grid-cols-1 lg:grid-cols-12 gap-12 items-center">
            <!-- Left Info -->
            <div class="lg:col-span-7 text-center lg:text-left">
                <span class="inline-flex items-center px-3 py-1 rounded-full text-xs font-semibold bg-indigo-50 text-indigo-700 dark:bg-indigo-950/30 dark:text-indigo-400 border border-indigo-200/50 dark:border-indigo-800/30 mb-6">
                    🎉 New: Advanced Payroll Automation
                </span>
                <h1 class="text-4xl sm:text-6xl font-extrabold tracking-tight text-slate-900 dark:text-white leading-[1.1] mb-6">
                    Optimize Your <span class="bg-clip-text text-transparent bg-gradient-to-r from-indigo-600 to-indigo-400 dark:from-indigo-400 dark:to-indigo-300">HR Workflow</span> Today
                </h1>
                <p class="text-lg text-slate-600 dark:text-slate-400 mb-8 max-w-xl mx-auto lg:mx-0">
                    Automate attendance, payroll, and performance reviews with ease. Focus on what truly matters—your people.
                </p>
                <div class="flex flex-col sm:flex-row items-center justify-center lg:justify-start gap-4">
                    <a href="{{ route('register') }}" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-lg shadow-indigo-200 dark:shadow-none transition-all duration-200">
                        Start your free trial today
                    </a>
                    <a href="#what-you-get" class="w-full sm:w-auto inline-flex items-center justify-center px-8 py-4 text-base font-semibold text-slate-700 dark:text-slate-300 bg-white dark:bg-slate-900 hover:bg-slate-50 dark:hover:bg-slate-800 border border-slate-200 dark:border-slate-800 rounded-xl transition-all duration-200">
                        Learn More
                    </a>
                </div>
            </div>
            <!-- Right Mockup / Graphic -->
            <div class="lg:col-span-5 relative hidden lg:block">
                <div class="absolute -inset-4 bg-indigo-500/10 rounded-[2.5rem] blur-xl"></div>
                <div class="relative bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 rounded-2xl shadow-2xl p-6 overflow-hidden">
                    <!-- Fake HRIS Interface Card -->
                    <div class="flex items-center justify-between border-b border-slate-100 dark:border-slate-800 pb-4 mb-4">
                        <div class="flex items-center space-x-3">
                            <div class="w-3 h-3 rounded-full bg-red-400"></div>
                            <div class="w-3 h-3 rounded-full bg-yellow-400"></div>
                            <div class="w-3 h-3 rounded-full bg-green-400"></div>
                        </div>
                        <span class="text-xs font-semibold text-indigo-600 dark:text-indigo-400">Nexa HR Portal</span>
                    </div>
                    <div class="space-y-4">
                        <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-850 rounded-xl">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-indigo-100 dark:bg-indigo-950/50 flex items-center justify-center text-indigo-600">👤</div>
                                <div>
                                    <p class="text-xs font-bold">Active Employees</p>
                                    <p class="text-xxs text-slate-500">Real-time count</p>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-indigo-600">142 Active</span>
                        </div>
                        <div class="flex items-center justify-between p-3 bg-slate-50 dark:bg-slate-850 rounded-xl">
                            <div class="flex items-center space-x-3">
                                <div class="w-10 h-10 rounded-full bg-emerald-100 dark:bg-emerald-950/50 flex items-center justify-center text-emerald-600">💰</div>
                                <div>
                                    <p class="text-xs font-bold">Payroll Processed</p>
                                    <p class="text-xxs text-slate-500">Current Month</p>
                                </div>
                            </div>
                            <span class="text-sm font-bold text-emerald-600">100% Tax Compliant</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- What You Get Section -->
<section id="what-you-get" class="py-24 border-t border-slate-200/50 dark:border-slate-800/30">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mb-4">What You Get</h2>
            <p class="text-lg text-slate-600 dark:text-slate-400">
                Discover how our HR system transforms your workflow with powerful automation and user-friendly tools designed to boost efficiency.
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-8">
            <x-feature-card title="Automated Attendance" description="Track clock-ins and outs with real-time reporting.">
                <!-- Clock Icon -->
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8v4l3 3m6-3a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-feature-card>

            <x-feature-card title="Payroll Automation" description="Effortless payroll processing with tax compliance.">
                <!-- Cash Icon -->
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 8c-1.657 0-3 .895-3 2s1.343 2 3 2 3 .895 3 2-1.343 2-3 2m0-8c1.11 0 2.08.402 2.599 1M12 8V7m0 1v8m0 0v1m0-1c-1.11 0-2.08-.402-2.599-1M21 12a9 9 0 11-18 0 9 9 0 0118 0z" />
                </svg>
            </x-feature-card>

            <x-feature-card title="Performance Result" description="Evaluate employee performance with built-in tools.">
                <!-- ChartBar Icon -->
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 002 2h2a2 2 0 002-2z" />
                </svg>
            </x-feature-card>

            <x-feature-card title="Reporting Analytics" description="Generate actionable HR insights with detailed reports.">
                <!-- TrendingUp Icon -->
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M13 7h8m0 0v8m0-8l-8 8-4-4-6 6" />
                </svg>
            </x-feature-card>

            <x-feature-card title="Leave Management" description="Simplify leave requests with automated approvals.">
                <!-- Calendar Icon -->
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M8 7V3m8 4V3m-9 8h10M5 21h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v12a2 2 0 002 2z" />
                </svg>
            </x-feature-card>

            <x-feature-card title="Employee Self-Services" description="Let employees manage requests, payslips, and profiles.">
                <!-- UserGroup Icon -->
                <svg class="w-6 h-6" fill="none" viewBox="0 0 24 24" stroke="currentColor">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 20h5v-2a3 3 0 00-5.356-1.857M17 20H7m10 0v-2c0-.656-.126-1.283-.356-1.857M7 20H2v-2a3 3 0 015.356-1.857M7 20v-2c0-.656.126-1.283.356-1.857m0 0a5.002 5.002 0 019.288 0M15 7a3 3 0 11-6 0 3 3 0 016 0zm6 3a2 2 0 11-4 0 2 2 0 014 0zM7 10a2 2 0 11-4 0 2 2 0 014 0z" />
                </svg>
            </x-feature-card>
        </div>
    </div>
</section>

<!-- Benefits Section -->
<section id="benefits" class="py-24 bg-slate-50 dark:bg-slate-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mb-4">Benefits</h2>
            <p class="text-lg text-slate-600 dark:text-slate-400">
                Our platform simplifies employee management with automated attendance tracking, payroll, and recruitment tools. Centralized data and performance reviews help boost efficiency and support employee growth, all in one system.
            </p>
        </div>

        <div class="space-y-6 max-w-4xl mx-auto">
            <!-- Benefit Item -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-start space-x-4">
                <div class="p-3 bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 rounded-xl">✨</div>
                <div>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Seamless Scheduling and Shift Management</h4>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Efficiently manage employee schedules, shifts, and time-off requests, ensuring smooth operations and improved team coordination.</p>
                </div>
            </div>

            <!-- Benefit Item -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-start space-x-4">
                <div class="p-3 bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 rounded-xl">⚡</div>
                <div>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Effortless Employee Attendance Management</h4>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Both HR and employees can easily track attendance in real-time, ensuring accurate records and reducing manual errors.</p>
                </div>
            </div>

            <!-- Benefit Item -->
            <div class="bg-white dark:bg-slate-900 p-6 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex items-start space-x-4">
                <div class="p-3 bg-indigo-50 dark:bg-indigo-950/50 text-indigo-600 dark:text-indigo-400 rounded-xl">📈</div>
                <div>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-1">Comprehensive Performance Evaluation and Scheduling</h4>
                    <p class="text-sm text-slate-600 dark:text-slate-400">Easily manage employee schedules and conduct insightful performance reviews to foster growth and ensure operational efficiency.</p>
                </div>
            </div>
        </div>
    </div>
</section>

<!-- Membership Levels (Pricing) -->
<section id="pricing" class="py-24">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mb-4">Membership Levels</h2>
            <p class="text-lg text-slate-600 dark:text-slate-400">
                Join our community and enjoy exclusive benefits tailored to enhance your experience. Choose the level that suits you best and start reaping the rewards today!
            </p>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-8 items-stretch max-w-5xl mx-auto">
            <!-- Starter Plan -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col justify-between">
                <div>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Starter Plan</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-6">For small businesses and startups</p>
                    <div class="flex items-baseline mb-6">
                        <span class="text-4xl font-extrabold text-slate-900 dark:text-white">$29</span>
                        <span class="text-sm text-slate-500 dark:text-slate-400 ml-1">/month</span>
                    </div>
                    <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-400 mb-8">
                        <li class="flex items-center">✓ Employee Attendance</li>
                        <li class="flex items-center">✓ Employee Data Management</li>
                        <li class="flex items-center">✓ Automated Payroll</li>
                        <li class="flex items-center">✓ Performance Review System</li>
                    </ul>
                </div>
                <a href="{{ route('register') }}" class="w-full inline-flex items-center justify-center px-4 py-3 text-sm font-semibold text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-xl transition-colors">
                    Try now
                </a>
            </div>

            <!-- Professional Plan (Highlighted) -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-2xl border-2 border-indigo-600 shadow-xl flex flex-col justify-between relative transform scale-105">
                <span class="absolute top-0 right-8 transform -translate-y-1/2 px-3 py-1 rounded-full text-xs font-semibold bg-indigo-600 text-white">
                    Most Popular
                </span>
                <div>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Professional Plan</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-6">For growing and mid-sized companies</p>
                    <div class="flex items-baseline mb-6">
                        <span class="text-4xl font-extrabold text-slate-900 dark:text-white">$79</span>
                        <span class="text-sm text-slate-500 dark:text-slate-400 ml-1">/month</span>
                    </div>
                    <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-400 mb-8">
                        <li class="flex items-center font-semibold text-indigo-600 dark:text-indigo-400">✓ All Starter Plan features</li>
                        <li class="flex items-center">✓ Basic Recruitment</li>
                        <li class="flex items-center">✓ Custom User Roles</li>
                    </ul>
                </div>
                <a href="{{ route('register') }}" class="w-full inline-flex items-center justify-center px-4 py-3 text-sm font-semibold text-white bg-indigo-600 hover:bg-indigo-700 rounded-xl shadow-md transition-colors">
                    Try now
                </a>
            </div>

            <!-- Enterprise Plan -->
            <div class="bg-white dark:bg-slate-900 p-8 rounded-2xl border border-slate-200 dark:border-slate-800 shadow-sm flex flex-col justify-between">
                <div>
                    <h4 class="text-lg font-bold text-slate-900 dark:text-white mb-2">Enterprise Plan</h4>
                    <p class="text-xs text-slate-500 dark:text-slate-400 mb-6">For large enterprises</p>
                    <div class="flex items-baseline mb-6">
                        <span class="text-4xl font-extrabold text-slate-900 dark:text-white">$139</span>
                        <span class="text-sm text-slate-500 dark:text-slate-400 ml-1">/month</span>
                    </div>
                    <ul class="space-y-3 text-sm text-slate-600 dark:text-slate-400 mb-8">
                        <li class="flex items-center font-semibold text-indigo-600 dark:text-indigo-400">✓ All Professional features</li>
                        <li class="flex items-center">✓ Employee Feedback System</li>
                        <li class="flex items-center">✓ Dedicated Account Manager</li>
                    </ul>
                </div>
                <a href="{{ route('register') }}" class="w-full inline-flex items-center justify-center px-4 py-3 text-sm font-semibold text-slate-700 dark:text-slate-300 bg-slate-50 dark:bg-slate-800 hover:bg-slate-100 dark:hover:bg-slate-700 rounded-xl transition-colors">
                    Try now
                </a>
            </div>
        </div>
    </div>
</section>

<!-- Testimonials -->
<section class="py-24 bg-slate-50 dark:bg-slate-900/50">
    <div class="max-w-7xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center max-w-3xl mx-auto mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mb-4">Testimonials</h2>
        </div>

        <div class="max-w-3xl mx-auto bg-white dark:bg-slate-900 border border-slate-200 dark:border-slate-800 p-8 rounded-2xl shadow-sm text-center">
            <p class="text-lg italic text-slate-700 dark:text-slate-300 leading-relaxed mb-6">
                "Incredible experience! The website is not only visually stunning but also user-friendly. Navigating through the pages was a breeze, and I found all the information I needed quickly. The attention to detail in both design and functionality is impressive."
            </p>
            <div class="font-bold text-slate-950 dark:text-white">Sarah M.</div>
            <div class="text-xs text-slate-500 dark:text-slate-400">Human Resources Specialist</div>
        </div>
    </div>
</section>

<!-- FAQ Section -->
<section id="faq" class="py-24">
    <div class="max-w-4xl mx-auto px-4 sm:px-6 lg:px-8">
        <div class="text-center mb-16">
            <h2 class="text-3xl sm:text-4xl font-extrabold text-slate-900 dark:text-white mb-4">Frequently Asked Questions</h2>
        </div>

        <div class="space-y-4">
            <x-faq-item question="1. How can employees check in and out using this website?">
                Employees can easily clock in and clock out directly from their personal dashboard using their desktop or mobile browser.
            </x-faq-item>

            <x-faq-item question="2. Can HR monitor employee attendance in real-time?">
                Yes, the admin dashboard displays real-time attendance status, showing who is currently checked in, on break, or absent.
            </x-faq-item>

            <x-faq-item question="3. Does Nexa support integration with payroll systems?">
                Absolutely! Our automated payroll system directly calculates salaries based on attendance logs and automatically adjusts deductions and taxes.
            </x-faq-item>

            <x-faq-item question="4. How can HR evaluate employee performance?">
                HR can schedule and run performance review cycles, setting custom KPIs and collecting feedback through the built-in review forms.
            </x-faq-item>

            <x-faq-item question="5. Can employees access their attendance history and pay slips?">
                Yes, employees have access to their self-service portal where they can view their attendance logs, request leaves, and download monthly payslips in PDF format.
            </x-faq-item>
        </div>
    </div>
</section>
@endsection
