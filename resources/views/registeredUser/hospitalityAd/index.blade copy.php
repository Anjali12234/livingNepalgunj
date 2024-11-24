
@extends('registeredUser.layout.master')

@section('content')
    <div class="content px-5 md:px-7 col-span-3 md:mt-0">
        <h1 class="font-semibold text-3xl mt-6">Health Care List</h1>
        <div class="border-b border-gray-200 dark:border-neutral-700">

            <nav class="relative mt-2 z-0 flex overflow-hidden dark:border-neutral-700" aria-label="Tabs" role="tablist" aria-orientation="horizontal">
                @foreach ($mainCategories as $mainCategory)
                    @foreach ($mainCategory?->hospitalityCategories as $hospitalityCategory)
                        <button type="button"
                            class="tab-button hs-tab-active:border-b-blue-600 hs-tab-active:text-gray-100 dark:hs-tab-active:text-white relative
                                   dark:hs-tab-active:border-b-blue-600 min-w-0 flex-1
                                   bg-blue-100 hover:bg-green-200 focus:bg-blue-200 dark:bg-indigo-300 dark:hover:bg-gray-400
                                   first:border-s-0  border-b-2 py-1 px-1 text-gray-500 hover:text-green-600
                                   text-lg font-medium text-center overflow-hidden
                                   focus:z-10 focus:outline-none focus:text-blue-600
                                   disabled:opacity-50 disabled:pointer-events-none
                                   dark:text-red-600 dark:hover:text-white"
                            data-tab-target="#tab-content-{{ $mainCategory->id }}-{{ $hospitalityCategory->id }}">
                            {{ $hospitalityCategory->title_en }}
                        </button>
                    @endforeach
                @endforeach
            </nav>

        </div>

        <!-- Table Header -->
        <div class="mt-3">
            <div class="flex flex-col">
                <div class="-m-1.5 overflow-x-auto">
                    <div class="p-1.5 min-w-full inline-block align-middle">
                        <div class="overflow-hidden">
                            <table class="min-w-full divide-y divide-gray-200 dark:divide-neutral-600">
                                <thead>
                                    <tr>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Reference No
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Name
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Category
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Contact Number
                                        </th>
                                        <th class="px-6 py-3 text-left text-xs font-medium text-gray-500 uppercase tracking-wider">
                                            Action
                                        </th>
                                    </tr>
                                </thead>
                                <tbody id="tab-content-body">
                                    <!-- Table body content will be updated here -->
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const tabButtons = document.querySelectorAll('.tab-button');
            const tableBody = document.getElementById('tab-content-body');

            // Data for each tab (you might need to modify this part based on how your data is structured)
            const tabData = {
                @foreach ($mainCategories as $mainCategory)
                    @foreach ($mainCategory->hospitalityCategories as $hospitalityCategory)
                        "tab-content-{{ $mainCategory->id }}-{{ $hospitalityCategory->id }}": [
                            @foreach ($hospitalityCategory->hospitalityLists as $hospitalityList)
                                `<tr>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ $hospitalityList->reference_no }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm font-medium text-gray-800 dark:text-neutral-200">
                                        {{ Str::words($hospitalityList->name, 5) }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $hospitalityList->hospitalityCategory->title_en }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-sm text-gray-800 dark:text-neutral-200">
                                        {{ $hospitalityList->contact_number }}
                                    </td>
                                    <td class="px-6 py-4 whitespace-nowrap text-end text-sm font-medium">
                                        <a href="{{ route('registeredUser.hospitalityList.edit', $hospitalityList) }}"
                                           class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400">
                                            <i class="ti ti-edit text-2xl font-bold text-neutral-800"></i>
                                        </a>
                                        <form action="{{ route('registeredUser.hospitalityList.destroy', $hospitalityList) }}" method="POST" style="display: inline">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="inline-flex items-center gap-x-2 text-sm font-semibold rounded-lg border border-transparent text-blue-600 hover:text-blue-800 focus:outline-none focus:text-blue-800 dark:text-blue-500 dark:hover:text-blue-400"
                                                onclick="return confirm('Are you sure you want to delete?')">
                                                <i class="ti ti-trash text-2xl font-bold text-red-700"></i>
                                            </button>
                                        </form>
                                    </td>
                                </tr>`,
                            @endforeach
                        ],
                    @endforeach
                @endforeach
            };

            tabButtons.forEach(button => {
                button.addEventListener('click', function () {
                    const target = this.dataset.tabTarget;

                    // Clear the table body
                    tableBody.innerHTML = '';

                    // Populate the new data in the table body
                    if (tabData[target]) {
                        tableBody.innerHTML = tabData[target].join('');
                    }

                    // Handle tab button active state
                    tabButtons.forEach(btn => {
                        btn.classList.remove('active');
                    });
                    this.classList.add('active');
                });
            });

            // Trigger the first tab to load its content by default
            tabButtons[0].click();
        });
    </script>
@endsection

