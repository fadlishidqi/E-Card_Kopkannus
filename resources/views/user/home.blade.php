<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Kartu Anggota - {{ $member->nama }}</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-100">
    <div class="min-h-screen flex items-center justify-center p-4">
        <div class="bg-white rounded-2xl shadow-md p-6 max-w-md w-full">
            <img src="{{ asset('image/card_member.png') }}" alt="Kartu Anggota KOPKANUS" class="w-full rounded-xl shadow-sm mb-5">
            
            <h2 class="text-2xl font-medium text-black mb-1 text-center">{{ $member->nama }}</h2>
            <p class="text-black-600 mb-6 text-center font-medium">{{ $member->departemen }}</p>
            
            <div class="space-y-4">
                <div class="flex items-center border-b pb-3">
                    <svg class="w-14 h-6 mr-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"></path></svg>
                    <div>
                        <p class="text-sm text-gray-500">ID Anggota</p>
                        <p>{{ $member->id_karyawan }}</p>
                    </div>
                </div>
                <div class="flex items-center border-b pb-3">
                    <svg class="w-14 h-6 mr-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 5a2 2 0 012-2h3.28a1 1 0 01.948.684l1.498 4.493a1 1 0 01-.502 1.21l-2.257 1.13a11.042 11.042 0 005.516 5.516l1.13-2.257a1 1 0 011.21-.502l4.493 1.498a1 1 0 01.684.949V19a2 2 0 01-2 2h-1C9.716 21 3 14.284 3 6V5z"></path></svg>
                    <div>
                        <p class="text-sm text-gray-500">No. Telp</p>
                        <p>+62 813 908 2803</p>
                    </div>
                </div>
                <div class="flex items-center border-b pb-3">
                    <svg class="w-14 h-6 mr-4 text-blue-500" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"></path></svg>
                    <div>
                        <p class="text-sm text-gray-500">Email</p>
                        <p>{{ $member->email }}</p>
                    </div>
                </div>
                <div class="flex items-start border-b pb-3">
                    <svg class="w-14 h-6 mr-4 text-blue-500 mt-1" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"></path><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"></path></svg>
                    <div>
                        <p>PT INDOFOOD CBP SUKSES MAKMUR, Tbk</p>
                        <p class="text-gray-500 text-sm">Jawa Barat 41181</p>
                        <p class="text-gray-500 text-sm">Indonesia</p>
                    </div>
                </div>
            </div>
            
            <button onclick="window.print()" class="mt-6 w-full bg-blue-500 hover:bg-blue-600 text-white font-bold py-3 px-4 rounded-full flex items-center justify-center transition duration-300">
                <svg class="w-5 h-5 mr-2" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg"><path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 16v1a3 3 0 003 3h10a3 3 0 003-3v-1m-4-4l-4 4m0 0l-4-4m4 4V4"></path></svg>
                Download ID CARD
            </button>
        </div>
    </div>
</body>
</html>