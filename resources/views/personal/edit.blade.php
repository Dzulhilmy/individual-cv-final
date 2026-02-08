<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Edit CV Profile') }}: {{ $personal->name }}
        </h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded border-l-4 border-red-500">
                        <ul class="list-disc ml-5">
                            @foreach ($errors->all() as $error)
                                <li>{{ $error }}</li>
                            @endforeach
                        </ul>
                    </div>
                @endif

                <form action="{{ route('personal.update', $personal->id) }}" method="POST" enctype="multipart/form-data">
                    @csrf
                    @method('PUT')

                    <h3 class="text-lg font-bold text-gray-800 border-b-2 border-gray-100 pb-2 mb-6 mt-2">1. Personal Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" value="{{ $personal->name }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Job Title</label>
                            <input type="text" name="job_title" value="{{ $personal->job_title }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" value="{{ $personal->email }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" name="phone" value="{{ $personal->phone }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" name="address" value="{{ $personal->address }}" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>

                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700 mb-2">Profile Image</label>
                            <div class="flex items-center gap-6">
                                @if($personal->image)
                                    <div class="shrink-0">
                                        <img src="{{ asset('storage/'.$personal->image) }}" class="h-20 w-20 object-cover rounded-full border border-gray-200" alt="Current profile photo">
                                        <p class="text-xs text-gray-500 text-center mt-1">Current</p>
                                    </div>
                                @endif
                                <div class="w-full">
                                    <input type="file" name="image" class="block w-full text-sm text-gray-500 file:mr-4 file:py-2 file:px-4 file:rounded-md file:border-0 file:text-sm file:font-semibold file:bg-indigo-50 file:text-indigo-700 hover:file:bg-indigo-100">
                                    <p class="mt-1 text-xs text-gray-500">Upload to replace the current image.</p>
                                </div>
                            </div>
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-800 border-b-2 border-gray-100 pb-2 mb-6 mt-8">2. Objective & Skills</h3>
                    <div class="grid grid-cols-1 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Professional Objective</label>
                            <textarea name="summary" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $personal->summary }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Skills</label>
                            <textarea name="skills" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $personal->skills }}</textarea>
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-800 border-b-2 border-gray-100 pb-2 mb-6 mt-8">3. History</h3>
                    <div class="grid grid-cols-1 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Work Experience</label>
                            <textarea name="experience" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $personal->experience }}</textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Education</label>
                            <textarea name="education" rows="5" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $personal->education }}</textarea>
                        </div>
                         <div>
                            <label class="block text-sm font-medium text-gray-700">Awards & Honours</label>
                            <textarea name="awards" rows="3" class="mt-1 block w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">{{ $personal->awards }}</textarea>
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-800 border-b-2 border-gray-100 pb-2 mb-6 mt-8">4. References (2 People)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h4 class="font-bold text-sm mb-3 text-indigo-600">Reference 1</h4>
                            <input type="text" name="ref1_name" value="{{ $personal->ref1_name }}" placeholder="Name" class="w-full mb-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <input type="text" name="ref1_job" value="{{ $personal->ref1_job }}" placeholder="Job Title/Company" class="w-full mb-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <input type="text" name="ref1_contact" value="{{ $personal->ref1_contact }}" placeholder="Email or Phone" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg border border-gray-200">
                            <h4 class="font-bold text-sm mb-3 text-indigo-600">Reference 2</h4>
                            <input type="text" name="ref2_name" value="{{ $personal->ref2_name }}" placeholder="Name" class="w-full mb-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <input type="text" name="ref2_job" value="{{ $personal->ref2_job }}" placeholder="Job Title/Company" class="w-full mb-3 border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                            <input type="text" name="ref2_contact" value="{{ $personal->ref2_contact }}" placeholder="Email or Phone" class="w-full border-gray-300 rounded-md shadow-sm focus:border-indigo-500 focus:ring-indigo-500">
                        </div>
                    </div>

                    <div class="mt-8 flex justify-end gap-4">
                        <a href="{{ route('personal.index') }}" class="px-6 py-2 border border-gray-300 rounded-md text-gray-700 font-semibold hover:bg-gray-50 transition">Cancel</a>
                        <button type="submit" class="bg-indigo-600  px-6 py-2 rounded-md font-bold hover:bg-indigo-700 transition shadow-lg">Update Profile</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
