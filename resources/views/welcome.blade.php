<!DOCTYPE html>
<html lang="id">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Struktur Desa - Infinite Scroll</title>
    <script src="https://cdn.tailwindcss.com"></script>
    <style>

        .carousel-wrapper {
            width: 90%;
            max-width: 1200px;
            /* Sesuaikan lebar maksimum carousel */
            overflow: hidden;
            /* Sangat penting untuk menyembunyikan kartu di luar view */
            position: relative;
            padding: 20px 0;
            box-shadow: 0 10px 30px rgba(0, 0, 0, 0.1);
            background-color: #ffffff;
            border-radius: 15px;
        }

        .carousel-track {
            display: flex;
            /* Kita akan mengontrol transform pakai JS, jadi tidak pakai CSS animation di sini */
            /* Pastikan ada jarak antar kartu di sini, misal: gap-x-4 di Tailwind atau margin-right kustom */
            /* Variabel CSS untuk lebar kartu dan gap antar kartu */
            --card-width: 320px;
            /* Sesuaikan dengan max-w-xs (kira-kira 320px) + gap */
            --gap-width: 16px;
            /* Sesuai dengan gap-3 di Tailwind (12px) atau lebih */
        }

        /* Karena Tailwind mengatur lebar dan margin, kita override sedikit untuk konsistensi JS */
        .carousel-card-item {
            min-width: var(--card-width);
            width: var(--card-width);
            margin-right: var(--gap-width);
            /* Override Tailwind's margin if needed, or rely on flex gap */
            flex-shrink: 0;
            /* Penting: mencegah kartu menyusut */
            transition: transform 0.2s ease;
            /* Untuk efek hover card */
        }

        /* Optional: adjust card hover effect if needed */
        .carousel-card-item:hover {
            transform: translateY(-5px);
            box-shadow: 0 12px 35px rgba(0, 0, 0, 0.2);
            /* Slightly stronger shadow on hover */
        }

        /* Agar foto terlihat seperti di gambar, mungkin ada overlay */
        .profile-card-image::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: linear-gradient(to top, rgba(0, 0, 0, 0.1) 0%, rgba(0, 0, 0, 0) 50%);
            /* Subtle gradient */
            z-index: 1;
            border-radius: inherit;
            /* Inherit border radius from parent image div */
        }

        /* Responsif */
        @media (max-width: 768px) {
            .carousel-track {
                --card-width: 280px;
                /* Ukuran kartu lebih kecil di mobile */
                --gap-width: 12px;
            }

            .carousel-wrapper {
                width: 95%;
                padding: 15px 0;
            }
        }

        @media (max-width: 480px) {
            .carousel-track {
                --card-width: 240px;
                /* Ukuran kartu lebih kecil lagi */
                --gap-width: 10px;
            }

            .carousel-wrapper {
                padding: 10px 0;
            }
        }
    </style>
</head>

<body class="bg-gray-100 flex items-center justify-center min-h-screen">
    <div class="carousel-wrapper">
        <div class="carousel-track">
            @forelse ($struktur as $item)
                <div class="carousel-card-item max-w-xs rounded-2xl overflow-hidden shadow-lg bg-white">
                    <div class="relative">
                        <img class="w-full h-52 object-cover" src="{{ Storage::url($item['foto']) ?? $item['foto'] }}"
                            alt="Foto Profil">
                        <span
                            class="absolute top-2 right-2 bg-purple-600 text-white text-xs px-3 py-1 rounded-full flex items-center gap-1 shadow-md z-10">
                            <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4" fill="none" viewBox="0 0 24 24"
                                stroke="currentColor">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                    d="M11.049 2.927c.3-.921 1.603-.921 1.902 0l1.518 4.674a1 1 0 00.95.69h4.916c.969 0 1.371 1.24.588 1.81l-3.977 2.89a1 1 0 00-.364 1.118l1.518 4.674c.3.921-.755 1.688-1.54 1.118l-3.977-2.89a1 1 0 00-1.175 0l-3.977-2.89c-.784.57-1.838-.197-1.539-1.118l1.518-4.674a1 1 0 00-.364-1.118l-3.977-2.89c-.784-.57-.38-1.81.588-1.81h4.916a1 1 0 00.95-.69l1.518-4.674z" />
                            </svg> Pimpinan
                        </span>
                    </div>
                    <div class="p-4">
                        <h3 class="text-lg font-semibold text-gray-800">{{ $item['nama'] }}</h3>
                        <p class="text-sm text-gray-500 mb-4">{{ $item['jabatan'] }}</p>
                        <hr class="my-3 border-gray-200">
                        <div class="flex justify-between items-center text-sm text-gray-500 mt-2">
                            <div class="flex items-center gap-1">
                                <svg xmlns="http://www.w3.org/2000/svg" class="h-4 w-4 text-gray-400" fill="none"
                                    viewBox="0 0 24 24" stroke="currentColor">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                        d="M8 7V3m8 4V3M3 11h18M5 19h14a2 2 0 002-2v-5H3v5a2 2 0 002 2z" />
                                </svg> halo ini testing
                            </div>
                            <div class="flex gap-1">
                                <span class="w-2 h-2 rounded-full bg-green-500"></span>
                                <span class="w-2 h-2 rounded-full bg-blue-500"></span>
                                <span class="w-2 h-2 rounded-full bg-purple-500"></span>
                            </div>
                        </div>
                    </div>
                </div>
            @empty
                <div>
                    <p class="text-gray-500">Tidak ada data pelatihan yang tersedia.</p>
                </div>
            @endforelse
        </div>
    </div>

    <script>
        document.addEventListener('DOMContentLoaded', () => {
            const carouselTrack = document.querySelector('.carousel-track');
            const initialCards = Array.from(carouselTrack.children);

            // Perhitungan lebar kartu dan gap.
            // Pastikan ini sesuai dengan nilai di CSS dan Tailwind.
            // Tailwind max-w-xs adalah 20rem (320px)
            // Tailwind gap-3 adalah 0.75rem (12px)
            const cardWidth = 320; // max-w-xs = 320px
            const gapWidth = 12; // gap-3 = 12px

            // Duplikasi kartu dua kali untuk memastikan loop mulus
            initialCards.forEach(card => {
                const clone = card.cloneNode(true);
                carouselTrack.appendChild(clone);
            });
            initialCards.forEach(card => {
                const clone = card.cloneNode(true);
                carouselTrack.appendChild(clone);
            });

            const totalOriginalWidth = (cardWidth + gapWidth) * initialCards.length;

            let currentPosition = 0;
            let currentScrollSpeed;

            const normalSpeed = 1.0; // Kecepatan default
            const hoverSpeed = 0.5; // Kecepatan saat mouse hover (lebih lambat)

            currentScrollSpeed = normalSpeed;

            let animationFrameId;

            function animateScroll() {
                currentPosition -= currentScrollSpeed;

                if (Math.abs(currentPosition) >= totalOriginalWidth) {
                    currentPosition = 0; // Reset posisi ke awal
                }

                carouselTrack.style.transform = `translateX(${currentPosition}px)`;
                animationFrameId = requestAnimationFrame(animateScroll);
            }

            function startScroll() {
                if (!animationFrameId) {
                    animateScroll();
                }
            }

            function stopScroll() {
                if (animationFrameId) {
                    cancelAnimationFrame(animationFrameId);
                    animationFrameId = null;
                }
            }

            // Mulai animasi pertama kali
            startScroll();

            // Event Listener untuk mengatur kecepatan saat mouse hover pada carousel-wrapper
            document.querySelector('.carousel-wrapper').addEventListener('mouseenter', () => {
                currentScrollSpeed = hoverSpeed; // Ubah kecepatan menjadi lebih lambat
            });

            document.querySelector('.carousel-wrapper').addEventListener('mouseleave', () => {
                currentScrollSpeed = normalSpeed; // Kembalikan kecepatan ke normal
            });
        });
    </script>
</body>

</html>
