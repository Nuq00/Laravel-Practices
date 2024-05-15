<x-layout>
    <x-breadcrumbs class="mb-4" :links="['My Jobs' => '#']" />
    <div class="mb-8 text-right">
        <x-link-button href="{{ route('my-jobs.create') }}">
            Add New
        </x-link-button>
    </div>
    @forelse ($jobs as $job)
        <x-job-card :job="$job">
            <div class="text-xs text-slate-500">
                @forelse ($job->jobApplications as $application)
                    <div class="mb-4 flex justify-between items-center">
                        <div>
                            <div>{{ $application->user->name }}</div>
                            <div>Applied {{ $application->created_at->diffForHumans() }}</div>
                        </div>
                        <div>
                            <div>RM {{ number_format($application->expected_salary) }}</div>
                            <x-button class="mt-2"><a {{-- href="{{ route('jobs.application.download', $application->id) }}" --}}>Download
                                    CV</a></x-button>
                            {{-- <x-button class="mt-2"><a href="{{ route('jobs.application.delete', $application->id) }}">Download
                                    CV</a></x-button> --}}
                        </div>
                    </div>
                @empty
                    <div class="mb-4">No Applications yet</div>
                @endforelse

                <div class="flex space-x-2">
                    @if ($job->deleted_at == null)
                        <x-link-button href="{{ route('my-jobs.edit', $job) }}">Edit</x-link-button>
                    @endif
                    @if ($job->deleted_at == null)
                        <form action="{{ route('my-jobs.destroy', $job) }}" method="POST">
                            @csrf
                            @method('DELETE')
                            <x-button class="bg-red-600 text-white border-red-400">Delete</x-button>
                        </form>
                    @else
                        <form action="{{ route('my-jobs.update', $job) }}" method="POST">
                            @csrf
                            @method('PUT')
                            <input type="hidden" name="deleted_at" value="{{ $job->deleted_at }}">
                            <x-button
                                class="bg-green-600
                                text-white border-green-400">Restore</x-button>
                        </form>
                    @endif
                </div>
            </div>
        </x-job-card>
    @empty
        <div class="rounded-md border border-dashed border-slate-300 p-8">
            <div class="text-center font-medium">No Jobs yet</div>
            <div class="text-center">Post your first job <a class="text-indigo-700 hover:underline"
                    href="{{ route('my-jobs.create') }}">here!</a></div>
        </div>
    @endforelse
</x-layout>
