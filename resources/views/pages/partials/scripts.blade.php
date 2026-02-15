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

        // FAQ Accordion Logic
        document.addEventListener('DOMContentLoaded', () => {
            const faqButtons = document.querySelectorAll('.faq-btn');

            faqButtons.forEach(btn => {
                btn.addEventListener('click', () => {
                    const item = btn.closest('.faq-item');
                    const content = btn.nextElementSibling;
                    const icon = btn.querySelector('.faq-icon');

                    // Tutup FAQ lain yang lagi kebuka
                    document.querySelectorAll('.faq-content').forEach(otherContent => {
                        if (otherContent !== content) {
                            otherContent.style.maxHeight = null;
                            otherContent.closest('.faq-item').classList.remove('border-fiesphere-blue', 'shadow-xl');
                            const otherIcon = otherContent.previousElementSibling.querySelector('.faq-icon');
                            if(otherIcon) otherIcon.style.transform = 'rotate(0deg)';
                        }
                    });

                    // Toggle item yang diklik
                    if (content.style.maxHeight) {
                        // Kalo lagi kebuka, tutup
                        content.style.maxHeight = null;
                        item.classList.remove('border-fiesphere-blue', 'shadow-xl');
                        icon.style.transform = 'rotate(0deg)';
                    } else {
                        // Kalo lagi tertutup, buka
                        content.style.maxHeight = content.scrollHeight + "px";
                        item.classList.add('border-fiesphere-blue', 'shadow-xl');
                        icon.style.transform = 'rotate(180deg)';
                    }
                });
            });
        });
    
        // Testimonial Slider Logic
        const track = document.getElementById('testimonialTrack');
        const prevBtn = document.getElementById('testiPrev');
        const nextBtn = document.getElementById('testiNext');
        let index = 0;

        function updateSlider() {
            const cardWidth = track.firstElementChild.offsetWidth;
            track.style.transform = `translateX(-${index * cardWidth}px)`;
        }

        function nextSlide() {
            const totalCards = track.children.length;
            const visibleCards = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
            
            if (index < totalCards - visibleCards) {
                index++;
            } else {
                index = 0; // Balik ke awal
            }
            updateSlider();
        }

        function prevSlide() {
            if (index > 0) {
                index--;
            } else {
                const visibleCards = window.innerWidth >= 1024 ? 3 : (window.innerWidth >= 768 ? 2 : 1);
                index = track.children.length - visibleCards; // Ke akhir
            }
            updateSlider();
        }

        // Auto-slide interval (3 detik)
        let autoSlide = setInterval(nextSlide, 3000);

        // Event Listeners
        nextBtn?.addEventListener('click', () => {
            clearInterval(autoSlide);
            nextSlide();
            autoSlide = setInterval(nextSlide, 3000); // Reset timer
        });

        prevBtn?.addEventListener('click', () => {
            clearInterval(autoSlide);
            prevSlide();
            autoSlide = setInterval(nextSlide, 3000); // Reset timer
        });

        // Update slider on window resize biar responsifnya nggak rusak
        window.addEventListener('resize', updateSlider);

       const mentorTrack = document.getElementById('mentorTrack');
const mNextBtn = document.getElementById('mentorNext');
const mPrevBtn = document.getElementById('mentorPrev');
let mIndex = 0;

function updateMentorSlider() {
    if(!mentorTrack) return;
    const cardWidth = mentorTrack.firstElementChild.offsetWidth;
    mentorTrack.style.transform = `translateX(-${mIndex * cardWidth}px)`;
}

function nextMentor() {
    const totalCards = mentorTrack.children.length;
    // Sekarang 4 kolom di layar lebar (lg)
    const visibleCards = window.innerWidth >= 1024 ? 4 : (window.innerWidth >= 640 ? 2 : 1);
    
    if (mIndex < totalCards - visibleCards) {
        mIndex++;
    } else {
        mIndex = 0;
    }
    updateMentorSlider();
}

mNextBtn?.addEventListener('click', nextMentor);
mPrevBtn?.addEventListener('click', () => {
    if (mIndex > 0) mIndex--;
    updateMentorSlider();
});

window.addEventListener('resize', updateMentorSlider);
    </script>