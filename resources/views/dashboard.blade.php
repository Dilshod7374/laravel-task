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
                    @if (auth()->user()->role->name == 'manager')
                        <span class="text-xl">Received Applications</span>
                        <div class='mt-5 p-6 text-gray-900 dark:text-gray-100'>
                            @foreach ($applications as $application)
                                <div style="margin-left: 100px"
                                    class="rounded-xl border p-5 mt-5 shadow-md w-9/12 bg-white">
                                    <div class="flex w-full items-center justify-between border-b pb-3">
                                        <div class="flex items-center space-x-3">
                                            <div
                                                class="h-8 w-8 rounded-full bg-slate-400 bg-[url('https://i.pravatar.cc/32')]">
                                            </div>
                                            <div class="text-lg font-bold text-slate-700">{{ $application->user->name }}
                                            </div>
                                        </div>
                                        <div class="flex items-center space-x-8">
                                            <button
                                                class="text-xs text-neutral-500 rounded-2xl border bg-neutral-100 px-3 py-1 text-xs ">#
                                                {{ $application->id }}
                                            </button>
                                            <div class="text-xs text-neutral-500">{{ $application->created_at }}</div>
                                        </div>
                                    </div>
                                    <div class="flex justify-between">
                                        <div>
                                            <div class="mt-4 mb-6">
                                                <div class="mb-3 text-xl font-bold text-sm text-neutral-600">
                                                    {{ $application->subject }}</div>
                                                <div class="text-sm text-neutral-600">{{ $application->message }}</div>
                                            </div>
                                            <div>
                                                <div class="flex items-center justify-between text-slate-500">
                                                    {{ $application->user->email }}
                                                </div>
                                            </div>
                                        </div>
                                        <div>
                                            <div
                                                class="m-6 mr-8 p-4 border rounded hover:bg-gray-50 transition cursor-pointer flex flex-col items-center">
                                                @if (isset($application->file_url))
                                                    <a href="{{ asset('storage/' . $application->file_url) }}"
                                                        target="blank">

                                                        <svg xmlns="http://www.w3.org/2000/svg" fill="none"
                                                            viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor"
                                                            class="w-6 h-6 text-neutral-600 flex-right">
                                                            <path stroke-linecap="round" stroke-linejoin="round"
                                                                d="M19.5 14.25v-2.625a3.375 3.375 0 00-3.375-3.375h-1.5A1.125 1.125 0 0113.5 7.125v-1.5a3.375 3.375 0 00-3.375-3.375H8.25m0 12.75h7.5m-7.5 3H12M10.5 2.25H5.625c-.621 0-1.125.504-1.125 1.125v17.25c0 .621.504 1.125 1.125 1.125h12.75c.621 0 1.125-.504 1.125-1.125V11.25a9 9 0 00-9-9z" />
                                                        </svg>
                                                    </a>
                                                @else
                                                    <span class="text-neutral-600">No file</span>
                                                @endif
                                            </div>
                                            <div>
                                                <a href="#"
                                                    class="p-5 bg-blue-500 hover:bg-blue-700 text-white font-bold py-2 px-4 rounded">
                                                    Answer
                                                </a>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            @endforeach

                        </div>
                        {{ $applications->links() }}
                    @else
                        @if (session()->has('error'))
                            <div
                                class="flex justify-center items-center m-1 font-medium py-1 px-2 bg-white rounded-md text-green-100 bg-green-700 border border-green-700 ">
                                <div class="text-xl font-normal  max-w-full flex-initial">
                                    <div class="py-2 text-neutral-600">{{ session()->get('error') }}</div>
                                </div>
                                <div class="flex flex-auto flex-row-reverse">
                                    <div>
                                        <svg xmlns="http://www.w3.org/2000/svg" width="100%" height="100%"
                                            fill="none" viewBox="0 0 24 24" stroke="currentColor" stroke-width="2"
                                            stroke-linecap="round" stroke-linejoin="round"
                                            class="feather feather-x cursor-pointer hover:text-green-400 rounded-full w-5 h-5 ml-2">
                                            <line x1="18" y1="6" x2="6" y2="18"></line>
                                            <line x1="6" y1="6" x2="18" y2="18"></line>
                                        </svg>
                                    </div>
                                </div>
                            </div>
                        @endif
                        <div class='flex items-center justify-center min-h-screen '>
                            <div class='w-full max-w-lg px-10 py-8 mx-auto bg-white rounded-lg shadow-xl'>
                                <div class='max-w-md mx-auto space-y-6'>
                                    <form action="{{ route('applications.store') }}" method="POST"
                                        enctype="multipart/form-data">
                                        @csrf
                                        <h2 class="mb-3 text-xl font-bold text-sm text-neutral-600 ">Submit your
                                            application</h2>
                                        <hr class="my-6">
                                        <label class="mb-3 text-xl font-bold text-sm text-neutral-600">Subject</label>
                                        <input type="text" required name="subject"
                                            class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none text-neutral-600">

                                        <label class="mb-3 text-xl font-bold text-sm text-neutral-600">Message</label>
                                        <textarea name="message" required
                                            class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none text-neutral-600"
                                            name="" id="" rows="5"></textarea><br>
                                        <label class="mb-3 text-xl font-bold text-sm text-neutral-600">File</label>
                                        <input type="file" name="file"
                                            class="p-3 mt-2 mb-4 w-full bg-slate-200 rounded border-2 border-slate-200 focus:border-slate-600 focus:outline-none text-neutral-600">
                                        <div>
                                            <input type="submit"
                                                class="py-3 px-6 my-2 bg-emerald-500 text-white font-medium rounded hover:bg-indigo-500 cursor-pointer ease-in-out duration-300"
                                                value="Send">
                                        </div>
                                    </form>

                                </div>
                            </div>
                        </div>
                    @endif


                </div>
            </div>
        </div>
    </div>
</x-app-layout>
