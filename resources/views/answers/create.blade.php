<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 dark:text-gray-200 leading-tight">
            {{ __('Dashboard') }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white dark:bg-gray-800 overflow-hidden shadow-sm sm:rounded-lg">
                <div class="p-2 text-gray-900 dark:text-gray-100">
                    <div class='flex items-center justify-center min-h-screen '>
                        <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                            <div class='max-w-md mx-auto space-y-6'>
                                <form action="{{ route('answers.store', ['application'=>$application->id]) }}" method="POST"
                                    enctype="multipart/form-data">
                                    @csrf
                                    <h2 class="mb-3 text-xl font-bold text-sm text-neutral-600 ">Answer application #{{ $application->id }}</h2>
                                    <hr class="my-6">
                                    <label class="mb-3 text-xl font-bold text-sm text-neutral-600">Answer</label>
                                    <textarea name="body" required
                                        class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none text-neutral-600"
                                        name="" id="" rows="5"></textarea><br>
                                    <div>
                                        <input type="submit" class="border border-green-500 bg-green-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-green-600 focus:outline-none focus:shadow-outline" value="Submit">
                                        <a href='{{ route('dashboard') }}' class="border border-red-500 bg-red-500 text-white rounded-md px-4 py-2 m-2 transition duration-500 ease select-none hover:bg-red-600 focus:outline-none focus:shadow-outline"
                                        >Cancel</a>
                                    </div>
                                </form>

                            </div>
                        </div>
                    </div>


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
