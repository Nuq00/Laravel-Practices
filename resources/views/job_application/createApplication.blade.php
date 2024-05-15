<x-layout>
    <x-breadcrumbs class="mb-4" :links="[
        'Jobs' => route('jobs.index'),
        $job->title => route('jobs.show', $job),
        'Apply' => '#',
    ]" />
    <x-job-card :$job />
    <x-card>
        <h2 class="mb-4 text-lg font-medium">
            Your Job Application
        </h2>
        <form action="{{ route('jobs.application.store', $job) }}" method="POST" enctype="multipart/form-data">

            @csrf
            <div class="mb-4">
                <x-label :required="true" for="expected_salary" class="mb-2 block text-sm font-medium text-slate-900">
                    Expected Salary
                </x-label>
                <x-text-input type="number" name="expected_salary"></x-text-input>
            </div>
            <div class="mb-4">
                <x-label for="cv" :required="true" class="mb-2 block text-sm font-medium text-slate-900">Upload CV</x-label>
                <x-text-input type="file" name="cv"></x-text-input>
            </div>
            <x-button class="w-full">Apply</x-button>
        </form>
    </x-card>
</x-layout>