<!DOCTYPE html>
<html lang="en">
<head>
 <meta charset="UTF-8">
 <meta name="viewport" content="width=device-width, initial-scale=1.0">
 <title>E-ID CARD KOPKANUS</title>
 <script src="https://cdn.tailwindcss.com"></script>
 <link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@300;400;500;600;700&display=swap" rel="stylesheet">
 <style>
    /* Base styles */
    * {
    font-family: 'Space Grotesk', sans-serif;
    }

    body {
    background: linear-gradient(45deg, #FF3366, #00C6FF, #7B41FF, #FF3366);
    background-size: 400% 400%;
    min-height: 100vh;
    display: flex;
    align-items: center;
    justify-content: center; 
    margin: 0;
    padding: 20px;
    position: relative;
    overflow-y: auto;
    animation: gradient 15s ease infinite;
    }

    .glass-effect {
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(30px); 
    border: 1px solid rgba(255, 255, 255, 0.1);
    }

    .shine-effect {
    position: relative;
    overflow: hidden;
    }

    .shine-effect::after {
    content: '';
    position: absolute;
    top: -50%;
    left: -50%;
    width: 200%;
    height: 200%;
    background: linear-gradient(to bottom right,
        rgba(255, 255, 255, 0) 0%,
        rgba(255, 255, 255, 0.1) 50%,
        rgba(255, 255, 255, 0) 100%);
    transform: rotate(45deg);
    animation: shine 3s infinite;
    }

    @keyframes shine {
    0% { transform: translateX(-100%) rotate(45deg); }
    100% { transform: translateX(100%) rotate(45deg); }
    }

    @keyframes gradient {
    0% { background-position: 0% 50%; }
    50% { background-position: 100% 50%; }
    100% { background-position: 0% 50%; }
    }

    .main-container {
    position: relative;
    z-index: 1;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(30px);
    border-radius: 32px;
    padding: 40px;
    width: 100%;
    max-width: 600px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    overflow: hidden;
    margin: 40px 0;
    }

    .title {
    text-align: center;
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 30px;
    color: white;
    }

    .card-content {
    background: url("{{ asset('image/bg-pattern.png') }}") center/cover;
    border-radius: 20px; 
    padding: 30px;
    text-align: center;
    margin-bottom: 30px;
    min-height: 700px;
    height: auto;
    position: relative;
    display: flex;
    flex-direction: column;
    align-items: center;
    box-shadow: 0 8px 32px 0 rgba(31, 38, 135, 0.37);
    }

    .profile-section {
    margin-top: 160px;
    margin-bottom: -10px;
    }

    .name {
    font-size: 34px;
    color: #1453FF;
    font-weight: bold;
    }

    .department {
    color: rgb(0, 0, 0);
    font-size: 28px;
    font-weight: bold;
    margin-bottom: 50px;
    }

    .qr-container {
    width: 260px;
    height: 260px;
    margin: 0 auto 30px;
    background: white;
    padding: 10px;
    border-radius: 20px;
    box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2),
                -5px -5px 15px rgba(255, 255, 255, 0.1);
    }

    .info-container {
    display: grid;
    gap: 10px;
    margin: 0 auto;
    max-width: 400px;
    }

    .info-item {
    display: flex;
    align-items: center;
    gap: 12px;
    padding: 15px 20px;
    background: rgba(255, 255, 255, 0.2);
    backdrop-filter: blur(30px);
    border-radius: 12px;
    border: 1px solid rgba(255, 255, 255, 0.1);
    transition: all 0.3s ease;
    }

    .info-icon {
    color: #393939;
    width: 24px;
    height: 24px;
    }

    .info-details {
    flex: 1;
    }

    .info-label {
    color: rgb(39, 39, 39);
    font-size: 14px;
    margin-bottom: 2px;
    }

    .info-value {
    color: rgb(39, 39, 39);
    font-weight: 500;
    }

    .email-box {
    background: rgba(0, 198, 255, 0.1);
    color: #1453FF;
    padding: 10px 25px;
    border-radius: 20px;
    display: inline-block;
    font-size: 20px;
    margin-bottom: 12px;
    border: 1px solid rgba(0, 198, 255, 0.2);
    backdrop-filter: blur(5px);
    }

    .id-box {
    background: linear-gradient(145deg, #007AFF, #00C6FF);
    color: white;
    padding: 10px 30px;
    border-radius: 20px;
    font-size: 20px;
    display: inline-block;
    font-weight: 500;
    }

    .logout-btn {
        background: #FF3366;
        color: white;
        border: none;
        border-radius: 12px;
        padding: 14px 28px;
        display: flex;
        align-items: center;
        justify-content: center;
        gap: 8px;
        margin: 30px auto 0;
        cursor: pointer;
        font-size: 16px;
        box-shadow: 5px 5px 15px rgba(0, 0, 0, 0.2),
                    -5px -5px 15px rgba(255, 255, 255, 0.1);
        transition: all 0.3s ease;
    }

    .logout-btn:hover {
        transform: translateY(-2px);
        box-shadow: 0 6px 16px rgba(255, 51, 102, 0.3);
    }

    /* Background Particles */
    .particle {
    position: absolute;
    width: 2px;
    height: 2px;
    background: white;
    border-radius: 50%;
    animation: floating 4s ease-in-out infinite;
    }

    @keyframes floating {
    0% { transform: translateY(0px) }
    50% { transform: translateY(-20px) }
    100% { transform: translateY(0px) }
    }

    /* Responsive Styles */
    @media screen and (max-width: 640px) {
    .main-container {
        padding: 20px;
        margin: 10px 0;
    }

    .title {
        font-size: 24px;
    }

    .card-content {
        padding: 15px;
        min-height: 600px;
    }

    .profile-section {
        margin-top: 120px;
    }

    .name {
        font-size: 28px;
    }

    .department {
        font-size: 22px;
    }

    .qr-container {
        width: 220px;
        height: 220px;
        padding: 10px;
    }

    .email-box, .id-box {
        font-size: 16px;
        padding: 8px 20px;
    }
    }

    @media screen and (max-width: 480px) {
    body {
        padding: 10px;
    }

    .main-container {
        padding: 15px;
    }

    .title {
        font-size: 22px;
        margin-bottom: 20px;
    }

    .card-content {
        padding: 10px;
        min-height: 500px;
    }

    .profile-section {
        margin-top: 115px;
    }

    .name {
        font-size: 24px;
    }

    .department {
        font-size: 20px;
        margin-bottom: 30px;
    }

    .qr-container {
        width: 180px;
        height: 180px;
        margin-bottom: 20px;
    }

    .info-container {
        gap: 8px;
    }

    .info-item {
        padding: 12px 15px;
    }

    .info-label {
        font-size: 12px;
    }

    .info-value {
        font-size: 14px;
    }

    .logout-btn {
        padding: 12px 20px;
        font-size: 14px;
    }
    }

    @media screen and (max-width: 360px) {
    .title {
        font-size: 20px;
    }

    .name {
        font-size: 22px;
    }

    .department {
        font-size: 18px;
    }

    .qr-container {
        width: 160px;
        height: 160px;
    }

    .email-box, .id-box {
        font-size: 14px;
        padding: 6px 16px;
    }
    }

    /* Print styles */
    @media print {
    body {
        background: none;
    }

    .main-container {
        box-shadow: none;
        margin: 0;
        padding: 0;
    }

    .logout-btn {
        display: none;
    }
    }

     @keyframes floating {
         0% { transform: translateY(0px) }
         50% { transform: translateY(-20px) }
         100% { transform: translateY(0px) }
     }

     @media print {
    body {
        background: none;
    }

    .main-container {
        box-shadow: none;
        margin: 0;
        padding: 0;
    }

    .title, .info-container, .download-btn {
        display: none;
    }

    .card-content {
        min-height: auto;
        padding: 20px;
        margin: 0;
        page-break-inside: avoid;
    }
}
 </style>
</head>
<body class="min-h-screen overflow-y-auto py-10">
   <!-- Decorative Elements -->
   <div class="absolute top-0 left-0 w-full h-full overflow-hidden pointer-events-none">
       <div class="absolute w-96 h-96 -top-12 -left-12 bg-white/10 rounded-full blur-3xl"></div>
       <div class="absolute w-96 h-96 -bottom-12 -right-12 bg-white/10 rounded-full blur-3xl"></div>
   </div>

   <!-- Background Particles -->
   <div class="fixed top-0 left-0 w-full h-full pointer-events-none">
       <div class="particle" style="top: 10%; left: 45%;"></div>
       <div class="particle" style="top: 20%; left: 75%;"></div>
       <div class="particle" style="top: 80%; left: 15%;"></div>
       <div class="particle" style="top: 60%; left: 85%;"></div>
   </div>

   <div class="main-container shine-effect">
       <h1 class="title">E-ID CARD KOPKANUS</h1>

       <div class="card-content">
           <div class="profile-section">
               <div class="name">{{ $member->nama }}</div>
               <div class="department">{{ $member->departemen }}</div>
           </div>

           <div class="qr-container">
               <?php
               require_once base_path('vendor/autoload.php');
               use chillerlan\QRCode\{QRCode, QROptions};
               
               $options = new QROptions([
                   'quietZone' => 2,
                   'outputType' => QRCode::OUTPUT_MARKUP_SVG,
                   'eccLevel' => QRCode::ECC_L,
                   'version' => 5,
                   'scale' => 8,
                   'imageBase64' => false,
                   'drawLightModules' => false,
               ]);
               
               $qrcode = new QRCode($options);
               echo $qrcode->render($member->id_karyawan);
               ?>
           </div>

           <div class="email-box">{{ $member->email }}</div>
           <div class="id-box">ID {{ $member->id_karyawan }}</div>
       </div>

       <div class="info-container">
        <div class="info-item">
            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <div class="info-details">
                <div class="info-label">Nama</div>
                <div class="info-value">{{ $member->nama }}</div>
            </div>
        </div>
    
        <div class="info-item">
            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 21V5a2 2 0 00-2-2H7a2 2 0 00-2 2v16m14 0h2m-2 0h-5m-9 0H3m2 0h5M9 7h1m-1 4h1m4-4h1m-1 4h1m3-4h1m-1 4h1"/>
            </svg>
            <div class="info-details">
                <div class="info-label">Departemen</div>
                <div class="info-value">{{ $member->departemen }}</div>
            </div>
        </div>
    
        <div class="info-item">
            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M16 7a4 4 0 11-8 0 4 4 0 018 0zM12 14a7 7 0 00-7 7h14a7 7 0 00-7-7z"/>
            </svg>
            <div class="info-details">
                <div class="info-label">ID Anggota</div>
                <div class="info-value">{{ $member->id_karyawan }}</div>
            </div>
        </div>
    
        <div class="info-item">
            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M3 8l7.89 5.26a2 2 0 002.22 0L21 8M5 19h14a2 2 0 002-2V7a2 2 0 00-2-2H5a2 2 0 00-2 2v10a2 2 0 002 2z"/>
            </svg>
            <div class="info-details">
                <div class="info-label">Email</div>
                <div class="info-value">{{ $member->email }}</div>
            </div>
        </div>
    
        <div class="info-item">
            <svg class="info-icon" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17.657 16.657L13.414 20.9a1.998 1.998 0 01-2.827 0l-4.244-4.243a8 8 0 1111.314 0z"/>
                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M15 11a3 3 0 11-6 0 3 3 0 016 0z"/>
            </svg>
            <div class="info-details">
                <div class="info-value">PT INDOFOOD CBP SUKSES MAKMUR, Tbk</div>
                <div class="info-label">Jawa Barat 41181</div>
                <div class="info-label">Indonesia</div>
            </div>
        </div>
    </div>

       <form action="{{ route('user.logout') }}" method="POST">
            @csrf
            <button type="submit" class="logout-btn">
                <svg class="w-5 h-5" fill="none" stroke="currentColor" viewBox="0 0 24 24">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M17 16l4-4m0 0l-4-4m4 4H7m6 4v1a3 3 0 01-3 3H6a3 3 0 01-3-3V7a3 3 0 013-3h4a3 3 0 013 3v1"></path>
                </svg>
                Logout
            </button>
        </form>
   </div>
</body>
</html>