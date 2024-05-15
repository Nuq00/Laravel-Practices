@if (auth()->check() && $job->employer_id === auth()->user()->id)

    <x-layout>
        <x-breadcrumbs class="mb-4" :links="[
            'Jobs' => route('jobs.index'),
            $job->title => route('jobs.show', $job),
            'Applied' => '#',
        ]" />
        @foreach ($jobApplications as $jobApp)
            <x-card class="mb-4">
                <div class="flex justify-between ">
                    <div class="font-bold text-lg">
                        {{ $jobApp->user->name }}
                    </div>
                    <div class="font-medium text-sm text-slate-600">
                        RM {{ $jobApp->expected_salary }}
                    </div>
                </div>
                <div class="flex justify-between ">
                    <div class="text-sm text-slate-500">
                        {{ $jobApp->user->email }}
                    </div>
                    <div class=" text-slate-500 text-sm">
                        {{ $jobApp->created_at }}
                    </div>
                </div>

            </x-card>
        @endforeach
    </x-layout>
@else
<x-layout>
    <x-card>
        You're not the employer
    </x-card>
</x-layout>
@endif
