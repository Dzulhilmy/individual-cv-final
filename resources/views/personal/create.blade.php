<x-app-layout>
    <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">{{ __('Create CV Profile') }}</h2>
    </x-slot>

    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white p-8 shadow-sm sm:rounded-lg">

                @if ($errors->any())
                    <div class="mb-4 p-4 bg-red-100 text-red-700 rounded">
                        <ul>@foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach</ul>
                    </div>
                @endif

                <form action="{{ route('personal.store') }}" method="POST" enctype="multipart/form-data">
                    @csrf

                    <h3 class="text-lg font-bold text-gray-700 border-b mb-4">1. Personal Details</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Full Name</label>
                            <input type="text" name="name" class="w-full border-gray-300 rounded-md shadow-sm" required>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Job Title</label>
                            <input type="text" name="job_title" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Email</label>
                            <input type="email" name="email" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Phone</label>
                            <input type="text" name="phone" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Address</label>
                            <input type="text" name="address" class="w-full border-gray-300 rounded-md shadow-sm">
                        </div>
                        <div class="col-span-2">
                            <label class="block text-sm font-medium text-gray-700">Profile Image</label>
                            <input type="file" name="image" class="w-full border border-gray-300 p-2 rounded-md">
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-700 border-b mb-4">2. Objective & Skills</h3>
                    <div class="grid grid-cols-1 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Professional Objective</label>
                            <textarea name="summary" rows="3" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="Briefly state your career goals..."></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Skills</label>
                            <textarea name="skills" rows="3" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="List your key skills (e.g., PHP, Laravel, Team Leadership)"></textarea>
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-700 border-b mb-4">3. History</h3>
                    <div class="grid grid-cols-1 gap-6 mb-6">
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Work Experience</label>
                            <textarea name="experience" rows="5" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="• Job Title at Company (Year) - Description..."></textarea>
                        </div>
                        <div>
                            <label class="block text-sm font-medium text-gray-700">Education</label>
                            <textarea name="education" rows="5" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="• Degree Name at University (Year)"></textarea>
                        </div>
                         <div>
                            <label class="block text-sm font-medium text-gray-700">Awards & Honours</label>
                            <textarea name="awards" rows="3" class="w-full border-gray-300 rounded-md shadow-sm" placeholder="List any certifications or awards"></textarea>
                        </div>
                    </div>

                    <h3 class="text-lg font-bold text-gray-700 border-b mb-4">4. References (2 People)</h3>
                    <div class="grid grid-cols-1 md:grid-cols-2 gap-6 mb-6">
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-bold text-sm mb-2">Reference 1</h4>
                            <input type="text" name="ref1_name" placeholder="Name" class="w-full mb-2 border-gray-300 rounded-md">
                            <input type="text" name="ref1_job" placeholder="Job Title/Company" class="w-full mb-2 border-gray-300 rounded-md">
                            <input type="text" name="ref1_contact" placeholder="Email or Phone" class="w-full border-gray-300 rounded-md">
                        </div>
                        <div class="bg-gray-50 p-4 rounded-lg">
                            <h4 class="font-bold text-sm mb-2">Reference 2</h4>
                            <input type="text" name="ref2_name" placeholder="Name" class="w-full mb-2 border-gray-300 rounded-md">
                            <input type="text" name="ref2_job" placeholder="Job Title/Company" class="w-full mb-2 border-gray-300 rounded-md">
                            <input type="text" name="ref2_contact" placeholder="Email or Phone" class="w-full border-gray-300 rounded-md">
                        </div>
                    </div>

                    <button type="submit" class="bg-blue-600 text-white px-6 py-2 rounded font-bold hover:bg-blue-700">Create CV</button>
                </form>
            </div>
        </div>
    </div>
</x-app-layout>
