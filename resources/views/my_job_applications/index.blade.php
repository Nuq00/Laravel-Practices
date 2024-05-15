<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Job Applications' => '#']" />

    @forelse ($applications as $application)
        <x-job-card class="" :job="$application->job">
            <div class="flex items-center justify-between mt-6">
                <div class="">
                    <p class="text-sm text-slate-400">
                        Applied
                        {{ $application->created_at->diffForHumans() }}
                    </p>
                    <p class="text-sm text-slate-400">
                        Other {{ Str::plural('Applicant', $application->job->job_applications) }}
                        {{ $application->job->job_applications_count - 1 }}
                    </p>
                    <p class="text-sm text-slate-400">
                        {{-- Expected salary : RM {{number_format($application->expected_salary)}} --}}
                        Expected salary : RM {{ number_format($application->expected_salary) }}
                    </p>
                    <p class="text-sm text-slate-400">
                        {{-- Expected salary : RM {{number_format($application->expected_salary)}} --}}
                        Average asking salary : RM
                        {{ number_format($application->job->job_applications_avg_expected_salary) }}
                    </p>
                </div>
                <div>
                    <form action="{{ route('my-job-applications.destroy', $application) }}" method="post">
                        @csrf
                        @method('DELETE')
                        <x-button>Cancel</x-button>
                    </form>
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-400 p-8">
            <div class="text-center font-medium">No job application yet</div>
            <div class="text-center">
                Go find some jobs <a class="text-indigo-500 hover:underline" href="{{ route('jobs.index') }}">Here</a>
            </div>
        </div>
    @endforelse
</x-layout>
