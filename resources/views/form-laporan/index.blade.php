<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Incident Reporting Form</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <link rel="preload" as="image" href="/assets/background/bg-2.svg" type="image/svg+xml">

    <script>
        tailwind.config = {
            theme: {
                extend: {
                    colors: {
                        primary: '#3E7B27',
                    }
                }
            }
        }
    </script>
    <style>
        .file-input {
            opacity: 0;
            width: 0.1px;
            height: 0.1px;
            position: absolute;
        }
        .file-input-label {
            display: flex;
            align-items: center;
            justify-content: center;
            border: 2px dashed #d1d5db;
            border-radius: 0.5rem;
            padding: 1.5rem;
            cursor: pointer;
            transition: all 0.3s ease;
        }
        .file-input-label:hover {
            border-color: #3E7B27;
            background-color: #f8fafc;
        }
        @keyframes fadeIn {
            from { opacity: 0; transform: translateY(10px); }
            to { opacity: 1; transform: translateY(0); }
        }
        .fade-in {
            animation: fadeIn 0.3s ease-out forwards;
        }
    </style>
</head>
<body class="bg-gray-50 min-h-screen">
    <div class="container mx-auto px-4 py-8 md:py-12 max-w-2xl">
        <div class="text-center mb-8">
            <div class="w-16 h-16 bg-primary rounded-full flex items-center justify-center mx-auto mb-4">
                <i class="fas fa-flag text-white text-2xl"></i>
            </div>
            <h1 class="text-3xl font-bold text-gray-800 mb-2">Incident Report</h1>
            <p class="text-gray-600">Please fill out the form below to submit your report</p>
        </div>

        {{-- Success Message --}}
        @if(session('success'))
            <div class="mb-6 p-4 bg-green-50 border border-green-200 rounded-lg fade-in">
                <div class="flex items-center">
                    <div class="flex-shrink-0">
                        <i class="fas fa-check-circle text-green-500 text-xl"></i>
                    </div>
                    <div class="ml-3">
                        <h3 class="text-sm font-medium text-green-800">{{ session('success') }}</h3>
                        <p class="mt-1 text-sm text-green-700">Kami telah menerima laporan Anda.</p>
                    </div>
                </div>
            </div>
        @endif

        {{-- Form --}}
        <form method="POST" action="{{ route('form-laporan.store') }}" enctype="multipart/form-data" class="bg-white rounded-xl shadow-md overflow-hidden p-6 md:p-8">
            @csrf

            <div class="mb-6">
                <label for="name" class="block text-sm font-medium text-gray-700 mb-1">Full Name <span class="text-red-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-user text-gray-400"></i>
                    </div>
                    <input type="text" id="name" name="name" required value="{{ old('name') }}"
                        class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border"
                        placeholder="">
                </div>
            </div>

            <div class="mb-6">
                <label for="email" class="block text-sm font-medium text-gray-700 mb-1">Email Address <span class="text-red-500">*</span></label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-envelope text-gray-400"></i>
                    </div>
                    <input type="email" id="email" name="email" required value="{{ old('email') }}"
                        class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border"
                        placeholder="">
                </div>
            </div>

            <div class="mb-6">
                <label for="phone" class="block text-sm font-medium text-gray-700 mb-1">Phone Number</label>
                <div class="relative">
                    <div class="absolute inset-y-0 left-0 pl-3 flex items-center pointer-events-none">
                        <i class="fas fa-phone text-gray-400"></i>
                    </div>
                    <input type="tel" id="phone" name="phone" value="{{ old('phone') }}"
                        class="pl-10 block w-full rounded-md border-gray-300 shadow-sm focus:border-primary focus:ring focus:ring-primary focus:ring-opacity-50 py-2 px-3 border"
                        placeholder="+62 ">
                </div>
            </div>

            <div class="mb-8">
                <label class="block text-sm font-medium text-gray-700 mb-1">Evidence (Photos/Documents)</label>
                <input type="file" id="evidence" name="evidence" class="file-input" accept="image/*,.pdf,.doc,.docx">
                <label for="evidence" class="file-input-label">
                    <div class="text-center">
                        <i class="fas fa-cloud-upload-alt text-3xl text-gray-400 mb-2"></i>
                        <p class="text-sm text-gray-600">Drag & drop files here or click to browse</p>
                        <p class="text-xs text-gray-500 mt-1">JPEG, PNG, PDF, DOC (Max 10MB)</p>
                    </div>
                </label>
                <div id="filePreview" class="mt-2 hidden">
                    <div class="flex items-center justify-between bg-gray-50 p-2 rounded">
                        <div class="flex items-center">
                            <i class="fas fa-file text-gray-500 mr-2"></i>
                            <span id="fileName" class="text-sm text-gray-700 truncate max-w-xs"></span>
                        </div>
                        <button type="button" id="removeFile" class="text-red-500 hover:text-red-700">
                            <i class="fas fa-times"></i>
                        </button>
                    </div>
                </div>
            </div>

            <div class="mt-8 space-y-4">
                <button type="submit"
                    class="w-full bg-primary hover:bg-green-700 text-white font-medium py-3 px-4 rounded-md transition duration-300 ease-in-out transform hover:scale-[1.02] focus:outline-none focus:ring-2 focus:ring-primary focus:ring-opacity-50">
                    Submit Report
                </button>

                <div class="text-center">
                    <a href="/" class="text-primary hover:underline text-sm">
                        &larr; Back 
                    </a>
                </div>
            </div>

        </form>

        <div class="mt-6 text-center text-sm text-gray-500">
            <p>Your information will be kept confidential and used only for investigation purposes.</p>
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', function () {
            const fileInput = document.getElementById('evidence');
            const filePreview = document.getElementById('filePreview');
            const fileName = document.getElementById('fileName');
            const removeFileBtn = document.getElementById('removeFile');

            fileInput.addEventListener('change', function () {
                if (this.files.length > 0) {
                    fileName.textContent = this.files[0].name;
                    filePreview.classList.remove('hidden');
                }
            });

            removeFileBtn.addEventListener('click', function () {
                fileInput.value = '';
                filePreview.classList.add('hidden');
            });
        });
    </script>
</body>
</html>
