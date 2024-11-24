<x-guest-layout>
    <div class="font-manrope">
        {{-- Hero Section --}}
        <div class="mx-4 md:mx-24 overflow-hidden">

            <div class="container mx-auto mt-8">
                <!-- Breadcrumb Navigation -->
                <nav class="text-sm text-gray-500 mb-4">
                    <a href="#" class="hover:underline">Home</a> >
                    <a href="#" class="hover:underline">Job</a> >
                    <a href="#" class="hover:underline">{{ $jobList?->jobCategory?->title }}</a> >
                </nav>

                <div class="grid grid-cols-1 md:grid-cols-3 gap-6">
                    <!-- Main Article -->
                    <div class="md:col-span-2">
                        <div class="bg-white shadow-md rounded-lg p-6 mb-6">
                            <img src="{{ $jobList->image }}" alt="Job Image" class="w-full h-auto rounded-md mb-4">
                            <h1 class="text-3xl font-bold text-purple-700 mt-2 mb-2">
                                {{ $jobList->job_name }}
                            </h1>

                            <div class="flex flex-col sm:flex-row items-center mb-4 space-y-4 sm:space-y-0">
                                <div class="bg-gray-200 rounded-full w-12 h-12 flex items-center justify-center">
                                    <img
                                        src="https://www.qatarliving.com/sites/all/themes/qatarliving_v3/images/avatar.jpeg"
                                        alt="Author Avatar" class="rounded-full w-full h-full">
                                </div>
                                <div class="ml-0 sm:ml-3 text-center sm:text-left">
                                    <p class="text-gray-500 text-sm">By {{ $jobList->registeredUser->username }}
                                        • {{ $jobList->updated_at->diffForHumans() }}</p>
                                </div>
                            </div>

                            <div class="space-y-2 mb-4">
                                <p class="text-sm font-semibold  text-neutral-800">Job Type:<span class="text-neutral-700 ml-24"> {{ $jobList->job_type }}</span>
                                </p>
                                <p class="text-sm font-semibold text-neutral-800">Address:<span class=" text-neutral-700 ml-[6.5rem]">{{ $jobList->address }}</span>
                                </p>
                                <p class="text-sm font-semibold text-neutral-800">Years of experience:<span class=" text-neutral-700 ml-7">{{ $jobList->years_of_experience }}</span>
                                </p>
                                <p class="text-sm font-semibold text-neutral-800">Salary Range:<span class=" text-neutral-700 ml-[4.5rem]">{{ $jobList->salary_range }}</span>
                                </p>
                                <p class="text-sm font-semibold text-neutral-800">Vacancy Publish Date:<span class=" text-neutral-700 ml-4">{{ $jobList->publish_date }}</span>
                                </p>
                                <p class="text-sm font-semibold text-neutral-800">Vacancy Deadline:<span class=" text-neutral-700 ml-10">{{ $jobList->deadline_date }}</span>
                                </p>

                                <p class="text-sm font-semibold text-neutral-800 ">Our Website Url:<a
                                        class="hover:text-blue-700"
                                        href="{{$jobList->website_url}}"> <span class=" text-neutral-700 ml-[3.25rem]"> {{ $jobList?->website_url }}</span></a></p>
                                <p class="text-sm font-semibold ">{{ $jobList->gender }} can apply</p>
                            </div>

                            <h1 class="text-xl font-bold text-purple-700 mt-2 mb-2">
                                Job Description
                            </h1>
                            <div class="text-gray-700 space-y-4 tracking-wide mb-4">
                                {!! $jobList->details !!}
                            </div>
                            <h1 class="text-xl font-bold text-purple-700 mt-2 mb-2">
                                Desired Skills Experience
                            </h1>
                            <div class="text-gray-700 space-y-4 tracking-wide mb-4">
                                {{ $jobList->desired_skills_experience }}
                            </div>

                            <div class="border-t border-gray-300 pt-4">
                                <p class="text-gray-700 mb-4">Make sure to check out our social media to keep track of
                                    the latest content.</p>
                            </div>

                            <!-- Share Buttons -->
                            <div class="flex flex-col sm:flex-row space-y-4 sm:space-y-0 sm:space-x-2 mt-4">
                                <a href="{{$jobList->facebook_url}}" target="_blank">
                                    <button
                                        class="bg-blue-600 text-white px-4 py-2 rounded shadow hover:bg-blue-500 transition duration-300">
                                        <i class="ti ti-brand-facebook text-lg"></i> Share
                                    </button>
                                </a>
                                <a href="https://twitter.com/intent/tweet?url={{ urlencode(request()->fullUrl()) }}&text=Check%20this%20out!"
                                   target="_blank">
                                    <button
                                        class="bg-blue-400 text-white px-4 py-2 rounded shadow hover:bg-blue-300 transition duration-300">
                                        <i class="ti ti-brand-twitter text-lg"></i> Tweet
                                    </button>
                                </a>
                                <a href="https://wa.me/{{ $jobList->whats_app_no }}?text={{ urlencode(request()->fullUrl()) }}"
                                   target="_blank">
                                    <button class="bg-green-600 text-white px-8 py-2 rounded shadow hover:bg-green-500">
                                        <i class="ti ti-brand-whatsapp text-xl"></i> WhatsApp
                                    </button>
                                </a>
                            </div>
                        </div>

                        <div class="mt-8">
                            <h2 class="text-2xl font-semibold mb-4">More from Nepalgunj AtoZ</h2>
                            <div class="grid grid-cols-1 sm:grid-cols-2 lg:grid-cols-4 gap-4">
                                <!-- Related Job Listings -->
                                @forelse ($relatedjobs as $relatedJobList)
                                    <a href="{{ route('jobDetail', $relatedJobList) }}">
                                        <div
                                            class="bg-white overflow-hidden rounded-lg shadow-md transition-transform transform hover:scale-105 mb-4">
                                            <img src="{{ $relatedJobList->image }}" alt="Job Image"
                                                 class="w-full lg:w-40 h-52 lg:h-24 object-cover rounded-t-md">
                                            <div class="p-4">
                                                <p class="text-gray-700 font-bold text-base">{{ $relatedJobList->job_name }}</p>
                                            </div>
                                        </div>
                                    </a>
                                @empty
                                    <p class="text-gray-500">No Data found!!</p>
                                @endforelse
                            </div>
                        </div>
                    </div>

                    <!-- Sidebar News Items -->
                    <div class="space-y-6 hidden lg:block">
                        <h2 class="text-xl font-semibold mb-4">Vacancy from {{$jobList->registeredUser->username}}</h2>
                        <div class="bg-white shadow-md rounded-lg p-4">
                            @forelse($relatedjobLists as $relatedJobList)
                                <a href="{{ route('jobDetail', $relatedJobList) }}">

                                    <div class="flex flex-col sm:flex-row items-center space-x-4 mb-4">
                                        <img src="{{ $relatedJobList->image }}" alt="News Image"
                                             class="w-full lg:w-40 h-52 lg:h-24 rounded-md">
                                        <h3 class="text-sm font-semibold">{{ $relatedJobList->job_name }}</h3>
                                    </div>
                                </a>
                            @empty
                                <p>No data found !!</p>
                            @endforelse
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-guest-layout>
