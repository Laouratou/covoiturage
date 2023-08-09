<!DOCTYPE html>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Chat</title>
    <link href="https://cdn.jsdelivr.net/npm/tailwindcss@2.2.15/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="bg-gray-100">

<div class="max-w-xl mx-auto my-10 bg-white rounded-xl shadow-lg">
    <div class="px-6 py-4 border-b border-gray-200">
        <div class="flex justify-between items-center">
            <div class="flex items-center">
                <img src="ressources/left-chevron.svg" alt="Back" class="w-6 h-6">
                <p class="ml-2 text-lg font-semibold">Back</p>
            </div>
            <div class="flex items-center space-x-4">
                <p class="text-lg font-semibold">John Doe</p>
                <p class="text-sm text-gray-600">Active Now</p>
                <div class="flex space-x-2">
                    <img src="ressources/phone.svg" alt="Call" class="w-6 h-6">
                    <img src="ressources/video-camera.svg" alt="Video Call" class="w-6 h-6">
                </div>
            </div>
        </div>
    </div>
    <div class="px-6 py-4">
        <div class="space-y-4">
            <div class="flex items-start space-x-4">
                <img src="ressources/avatar2.jpg" alt="User" class="w-12 h-12 rounded-full">
                <p class="px-4 py-2 bg-gray-800 text-white rounded-xl">Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="flex items-start justify-end space-x-4">
                <p class="px-4 py-2 bg-blue-500 text-white rounded-xl">Lorem ipsum dolor sit amet.</p>
                <img src="ressources/avatar1.jpg" alt="User" class="w-12 h-12 rounded-full">
            </div>
            <div class="flex items-start space-x-4">
                <img src="ressources/avatar2.jpg" alt="User" class="w-12 h-12 rounded-full">
                <p class="px-4 py-2 bg-gray-300 rounded-xl text-gray-800">Lorem ipsum dolor sit amet. Lorem ipsum dolor sit amet.</p>
            </div>
            <div class="flex items-start justify-end space-x-4">
                <p class="px-4 py-2 bg-blue-500 text-white rounded-xl">Lorem ipsum dolor sit amet.</p>
                <img src="ressources/avatar1.jpg" alt="User" class="w-12 h-12 rounded-full">
            </div>
        </div>
    </div>
    <form class="flex items-center justify-center px-6 py-4 bg-gray-100 rounded-b-xl">
        <div class="bg-white flex items-center w-full rounded-full">
            <textarea class="flex-1 py-2 px-4 resize-none outline-none" placeholder="Enter your message here" minlength="1" maxlength="1500"></textarea>
            <img src="ressources/smile.svg" alt="Emoji" class="w-6 h-6 mx-2">
        </div>
        <button type="submit" class="ml-2 bg-white rounded-full">
            <img src="ressources/send.svg" alt="Send" class="w-6 h-6">
        </button>
    </form>
</div>

</body>
</html>
