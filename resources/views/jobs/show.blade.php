<!DOCTYPE html>
<html lang="en" >
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
         <!-- icon -->
   <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}">

    <title>{{ $job->title }} | Job Details</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <script>tailwind.config = { darkMode: 'class' }</script>
</head>
<body class="bg-gray-100 dark:bg-gray-900 text-gray-900 dark:text-gray-100">
    
    @if (session('success'))
    <div class="max-w-4xl mx-auto mt-6 px-4">
        <div class="bg-green-100 border border-green-400 text-green-800 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Success!</strong>
            <span class="block sm:inline">{{ session('success') }}</span>
        </div>
    </div>
@endif

@if (session('error'))
    <div class="max-w-4xl mx-auto mt-6 px-4">
        <div class="bg-red-100 border border-red-400 text-red-800 px-4 py-3 rounded relative" role="alert">
            <strong class="font-bold">Oops!</strong>
            <span class="block sm:inline">{{ session('error') }}</span>
        </div>
    </div>
@endif


    <!-- Header -->
    <header class="bg-white dark:bg-gray-800 shadow p-5 flex justify-between items-center">
         <a href="{{ route('jobs.index') }}" class="text-indigo-900 dark:text-indigo-400 font-bold text-lg">← Back to Jobs</a>
        <button onclick="document.documentElement.classList.toggle('dark')" class="text-sm hover:text-indigo-600 text-gray-700 dark:text-gray-300">
            🌗 Theme
        </button>
    </header>

    <!-- Job Card -->
    <main class="py-10 px-4 flex justify-center">
        <div class="bg-white dark:bg-gray-800 w-full max-w-4xl rounded-2xl shadow-lg p-10 space-y-10 border border-gray-200 dark:border-gray-700 animate-fade-in">

            <!-- Top Section -->
            <div class="flex flex-col sm:flex-row justify-between items-start sm:items-center gap-6">
                <div>
                    <p class="text-sm text-green-600 font-semibold uppercase mb-1">
                        {{ ucfirst(str_replace('_', ' ', $job->employment_type)) }}
                    </p>
                    <h2 class="text-3xl font-bold text-gray-800 dark:text-white">
                        {{ $job->title }}
                    </h2>
                    <p class="text-sm mt-1 text-gray-600 dark:text-gray-300">
                        <span class="font-semibold">Location:</span>
                        {{ $job->country ?? 'N/A' }}, {{ $job->location ?? 'N/A' }}
                    </p>
                </div>
                <div class="flex flex-col items-end gap-2">
<a href="{{ auth()->check() ? route('jobs.apply', $job->slug) : route('register') }}"
   class="bg-green-600 hover:bg-green-700 text-white text-sm px-6 py-2 rounded-lg font-semibold shadow transition">
   Apply Now
</a>

                    <img src="{{ asset('/public/uploads/pics/' . $logo->picture) }}" style="margin-right: 30px; margin-top: 20px;" class="w-12 h-12" alt="Company logo">
                </div>
            </div>

            <hr class="border-t border-gray-300 dark:border-gray-600">

            <!-- Description -->
            <section>
                <h3 class="text-lg font-semibold mb-2">Job Description</h3>
                <div class="text-sm leading-relaxed text-gray-700 dark:text-gray-300">
                    {!! nl2br(e($job->description)) !!}
                </div>
            </section>

            <!-- Responsibilities -->
            @if ($job->responsibilities)
            <section>
                <h3 class="text-lg font-semibold mb-2">Responsibilities</h3>
                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    @foreach (explode(';', $job->responsibilities) as $item)
                        @if (trim($item))
                            <li class="flex items-start gap-2">
                                <span class="text-green-500">✔</span>
                                <span>{{ trim($item) }}</span>
                            </li>
                        @endif
                    @endforeach
                </ul>
            </section>
            @endif

            <!-- Qualifications -->
            @if ($job->qualifications->count())
            <section>
                <h3 class="text-lg font-semibold mb-2">Qualifications</h3>
                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    @foreach ($job->qualifications as $q)
                        <li class="flex items-start gap-2">
                            <span class="text-green-500">✔</span>
                            <span>{{ $q->title }} &mdash; {{ ucfirst($q->level) }}{{ $q->is_required ? ' (Required)' : '' }}</span>
                        </li>
                    @endforeach
                </ul>
            </section>
            @endif

            <!-- Experience -->
            @if ($job->experiences->count())
            <section>
                <h3 class="text-lg font-semibold mb-2">Experience</h3>
                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    @foreach ($job->experiences as $exp)
                        <li class="flex items-start gap-2">
                            <span class="text-green-500">✔</span>
                            <span>{{ $exp->title }}{{ $exp->is_required ? ' (Required)' : '' }}</span>
                        </li>
                    @endforeach
                </ul>
            </section>
            @endif

            <!-- Skills -->
            @if ($job->skills->count())
            <section>
                <h3 class="text-lg font-semibold mb-2">Skills</h3>
                <ul class="space-y-2 text-sm text-gray-700 dark:text-gray-300">
                    @foreach ($job->skills as $skill)
                        <li class="flex items-start gap-2">
                            <span class="text-green-500">✔</span>
                            <span>{{ $skill->name }} ({{ ucfirst($skill->type) }}){{ $skill->is_required ? ' *' : '' }}</span>
                        </li>
                    @endforeach
                </ul>
            </section>
            @endif

        </div>
    </main>

    <style>
        .animate-fade-in {
            animation: fadeIn 0.4s ease-out both;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(20px); }
            to { opacity: 1; transform: translateY(0); }
        }
    </style>
</body>
</html>
