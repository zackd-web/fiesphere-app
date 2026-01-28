<!-- LIGHTBOX MODAL (For Poster Zoom) -->
    <div id="posterModal" class="fixed inset-0 z-[100] hidden bg-black/90 flex items-center justify-center p-4 backdrop-blur-sm transition-all">
        <button onclick="closePoster()" class="absolute top-6 right-6 text-white hover:text-fiesphere-yellow transition-colors">
            <i data-lucide="x-circle" class="w-12 h-12"></i>
        </button>
        <img id="modalImg" src="" class="max-h-[90vh] max-w-[90vw] object-contain rounded-2xl shadow-2xl scale-95 transition-transform duration-300">
    </div>

    <script>
        // Updated Modal Zoom Logic (Works for multiple posters)
        function openPoster(element) {
            const modal = document.getElementById('posterModal');
            const imgInside = element.querySelector('img');
            const modalImg = document.getElementById('modalImg');
            
            modalImg.src = imgInside.src;
            modal.classList.remove('hidden');
            setTimeout(() => {
                modalImg.classList.remove('scale-95');
                modalImg.classList.add('scale-100');
            }, 10);
            document.body.style.overflow = 'hidden'; // Stop scroll
        }

        function closePoster() {
            const modal = document.getElementById('posterModal');
            const modalImg = document.getElementById('modalImg');
            
            modalImg.classList.add('scale-95');
            setTimeout(() => {
                modal.classList.add('hidden');
                document.body.style.overflow = 'auto'; // Restore scroll
            }, 200);
        }

        // --- Slider Logic ---
        function setupSlider(containerId, nextBtnId, prevBtnId) {
            const container = document.getElementById(containerId);
            const nextBtn = document.getElementById(nextBtnId);
            const prevBtn = document.getElementById(prevBtnId);

            if (nextBtn && prevBtn && container) {
                nextBtn.addEventListener('click', () => {
                    container.scrollLeft += container.offsetWidth * 0.8;
                });
                prevBtn.addEventListener('click', () => {
                    container.scrollLeft -= container.offsetWidth * 0.8;
                });
            }
        }

        // Initialize Sliders
        setupSlider('sliderContainer', 'nextBtn', 'prevBtn');       // Fasilitas
        setupSlider('posterSlider', 'posterNext', 'posterPrev');    // Poster

        // Init Lucide Icons
        lucide.createIcons();

        // Toggle mobile menu
        const toggle = document.getElementById('mobile-toggle');
        const menu = document.getElementById('mobile-menu');

        toggle.addEventListener('click', () => {
            menu.classList.toggle('hidden');
        });

        // Close menu on click link
        document.querySelectorAll('#mobile-menu a').forEach(link => {
            link.addEventListener('click', () => menu.classList.add('hidden'));
        });

        // Simple Navbar Scroll effect
        window.addEventListener('scroll', () => {
            const header = document.querySelector('header');
            if (window.scrollY > 50) {
                header.classList.add('shadow-lg');
            } else {
                header.classList.remove('shadow-lg');
            }
        });
    </script>