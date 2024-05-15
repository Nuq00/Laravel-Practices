<x-layout>
    <div class="flex justify-between">
        <div>
            <x-bread-crumbs class="mb-5" :links="['Jobs' => route('jobs.index')]" />
        </div>
        @auth
        @else
            <div>
                <a href="{{ route('auth.create') }}" class="hover:text-indigo-900 hover:underline">Sign in</a>
            </div>
        @endauth
    </div>

    <x-card class="mb-4 text-sm" x-data="">
        <form x-ref="filters" action="{{ route('jobs.index') }}" id="filtering-form" method="GET">
            <div class="mb-4 grid grid-cols-2 gap-4">
                <div>
                    <div class="mb-1 font-semibold">
                        Search
                    </div>
                    <x-text-input name="search" placeholder="Search for any text" value="{{ request('search') }}"
                        form-ref="filters" />
                </div>
                <div>
                    <div class="mb-1 font-semibold">
                        Salary
                    </div>
                    <div class="flex space-x-2 ">
                        <x-text-input name="min_salary" value="{{ request('min_salary') }}" placeholder="From"
                            form-ref="filters" />
                        <x-text-input name="max_salary" value="{{ request('max_salary') }}" placeholder="To"
                            form-ref="filters" />
                    </div>
                </div>
                <div>
                    <div class="mb-2 font-semibold">Experience</div>
                    <div class="">
                        <x-radio-group name="experience" :options="array_combine(
                            array_map('ucfirst', \App\Models\Job::$experience),
                            \App\Models\Job::$experience,
                        )" />
                        {{-- <label for="experience" class="mb-1 flex items-center">
                            <input type="radio" name="experience" id="experience" value=""
                                @checked(!request('experience')) />
                            <span class="ml-2">All</span>
                        </label>
                        <label for="experience" class="mb-1 flex items-center">
                            <input type="radio" name="experience" id="experience" value="entry"
                                @checked('entry' === request('experience')) />
                            <span class="ml-2">Entry</span>
                        </label>
                        <label for="experience" class="mb-1 flex items-center">
                            <input type="radio" name="experience" id="experience" value="intermediate"
                                @checked('intermediate' === request('experience')) />
                            <span class="ml-2">Intermediate</span>
                        </label>
                        <label for="experience" class="mb-1 flex items-center">
                            <input type="radio" name="experience" id="experience" value="senior"
                                @checked('senior' === request('experience')) />
                            <span class="ml-2">Senior</span>
                        </label> --}}
                    </div>
                </div>
                <div>

                    <div class="mb-2 font-semibold">Category</div>
                    <div class="">
                        <x-radio-group name="category" :options="\App\Models\Job::$category" />
                        {{-- 
                        <label for="category" class="mb-1 flex items-center">
                            <input type="radio" name="category" id="category" value=""
                                @checked(!request('category')) />
                            <span class="ml-2">All</span>
                        </label>
                        <label for="category" class="mb-1 flex items-center">
                            <input type="radio" name="category" id="category" value="IT"
                                @checked('IT' === request('category')) />
                            <span class="ml-2">IT</span>
                        </label>
                        <label for="category" class="mb-1 flex items-center">
                            <input type="radio" name="category" id="category" value="Finance"
                                @checked('Finance' === request('category')) />
                            <span class="ml-2">Finance</span>
                        </label>
                        <label for="category" class="mb-1 flex items-center">
                            <input type="radio" name="category" id="category" value="Sales"
                                @checked('Sales' === request('category')) />
                            <span class="ml-2">Sales</span>
                        </label>
                        <label for="category" class="mb-1 flex items-center">
                            <input type="radio" name="category" id="category" value="Marketing"
                                @checked('Marketing' === request('category')) />
                            <span class="ml-2">Marketing</span>
                        </label> --}}
                    </div>
                </div>
            </div>
            <x-button type="submit" class="w-full">Filter</x-button>

        </form>

    </x-card>
    @foreach ($jobs as $job)
        <x-job-card class="mb-4" :$job>
            {{-- <div class="flex justify-between mb-2">
                <h2 class="text-lg font-medium">
                    {{ $job->title }}
                </h2>
                <div class="text-slate-500">RM {{ number_format($job->salary) }}</div>
            </div>
            <div class="mb-4 flex justify-between text-sm text-slate-500 items-center">
                <div class="flex space-x-4">
                    <div>Company Name</div>
                    <div>{{ $job->location }}</div>
                </div>
                <div class="flex space-x-2 text-xs">
                    <x-tag>{{ Str::ucfirst($job->experience) }}</x-tag>
                    <x-tag>{{ $job->category }}</x-tag>
                </div>
            </div>

            <p class="text-sm text-slate-500 mb-4">{{ $job->description }}</p> --}}
            <div>
                <x-link-button :href="route('jobs.show', $job)">
                    See More
                </x-link-button>
            </div>
        </x-job-card>
    @endforeach
</x-layout>
