document.addEventListener("DOMContentLoaded", function () {
    // Smooth Scroll buat navigasi biar pas klik langsung ke bagian yang dituju
    document.querySelectorAll("nav ul li a").forEach(anchor => {
        anchor.addEventListener("click", function (event) {
            const sectionId = this.getAttribute("href");
            if (sectionId.startsWith("#")) { // Only prevent default for internal links
                event.preventDefault();
                document.getElementById(sectionId.substring(1)).scrollIntoView({
                    behavior: "smooth"
                });
            }
        });
    });
    

    // FAQ bisa dibuka tutup pas diklik
    const faqItems = document.querySelectorAll(".faq-item");
    faqItems.forEach(item => {
        item.addEventListener("click", function () {
            const currentlyActive = document.querySelector(".faq-item.active");
            if (currentlyActive && currentlyActive !== this) {
                currentlyActive.classList.remove("active");
                currentlyActive.querySelector(".faq-answer").style.display = "none";
            }
            this.classList.toggle("active");
            const answer = this.querySelector(".faq-answer");
            answer.style.display = this.classList.contains("active") ? "block" : "none";
        });
    });

    // Form kontak, cuma buat alert simulasi kirim pesan
    const contactForm = document.querySelector(".contact-form");
    if (contactForm) {
        contactForm.addEventListener("submit", function () {
            alert("Pesan kamu berhasil dikirim!");
        });
    }

    // Auto scroll buat logo media partner biar kayak carousel
    const mediaPartners = document.querySelector(".partner-section");
    function scrollMediaPartners() {
        mediaPartners.scrollLeft += 1;
        if (mediaPartners.scrollLeft >= mediaPartners.scrollWidth - mediaPartners.clientWidth) {
            mediaPartners.scrollLeft = 0;
        }
    }
    setInterval(scrollMediaPartners, 50);

    // Animasi loading sebelum masuk ke halaman (opsional, bisa dihapus kalau nggak butuh)
    setTimeout(() => {
        document.querySelector(".loading-screen").style.display = "none";
    }, 2000);
});