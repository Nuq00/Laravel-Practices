<x-layout>
    <div class="mb-4">

        <div class="flex justify-between">
            <a href="{{ route('jobs.index') }}"
                class="bg-white py-2 px-4 rounded-lg hover:bg-slate-400 border border-slate-300">Back</a>
            {{-- <a href="{{ route('jobs.application.create', ['job' => $job->id]) }}"
                class="bg-white py-2 px-4 rounded-lg hover:bg-slate-400 border border-slate-300">Apply</a> --}}
        </div>
    </div>
    <x-bread-crumbs class="mb-5" :links="['Jobs' => route('jobs.index'), $job->title => '#']" />
    <x-job-card :$job>
        <p class="text-sm text-slate-500 mb-4">{{ $job->description }}</p>
        @auth

            @can('apply', $job)
                <x-link-button :href="route('jobs.application.create', $job)">Apply</x-link-button>
            @else
                <div class="text-center text-sm font-medium text-slate-500 mt-10">You already applied for this job!</div>
            @endcan
        @else
            <div class="text-center text-sm font-medium text-slate-500 mt-10"><a href="{{ route('auth.create') }}" class="hover:underline text-indigo-600">Sign in</a>
                required to apply!
            </div>
        @endauth
    </x-job-card>
    <x-card class="mb-4">
        <h2 class="mb-4 text-lg font-medium">More {{ $job->employer->company_name }} Jobs</h2>
        <div class="text-sm text-slate-500 ">
            @foreach ($job->employer->jobs as $otherJob)
                @if ($otherJob->id !== $job->id)
                    <div class="mb-4 flex justify-between">
                        <div>
                            <div class="text-slate-700 flex justify-between">
                                <div>
                                    <a href="{{ route('jobs.show', $otherJob) }}">
                                        {{ $otherJob->title }}
                                    </a>
                                </div>
                                {{-- <div class="flex justify-between ml-5 gap-2">
                                <x-tag>
                                    {{ $otherJob->experience }}
                                </x-tag>
                                <x-tag>
                                    {{ $otherJob->category }}
                                </x-tag>
                            </div> --}}

                            </div>
                            <div class="text-xs">
                                {{ $otherJob->created_at->diffForHumans() }}
                            </div>
                        </div>

                        <div class="text-xs">RM {{ number_format($otherJob->salary) }}</div>

                    </div>
                @endif
            @endforeach
        </div>
        </div>


    </x-card>
</x-layout>
