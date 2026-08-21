/* ==========================================================================
   MS Solutions Main JavaScript
   Interactivity, Mobile Menu, Tabs, Accordions, WhatsApp Integration
   ========================================================================== */

document.addEventListener('DOMContentLoaded', function () {

    // 1. Mobile Menu Toggler
    const mobileToggler = document.querySelector('.mobile-nav-toggler');
    const mobileMenu = document.querySelector('.mobile-menu');
    const menuBackdrop = document.querySelector('.menu-backdrop');
    const closeBtn = document.querySelector('.mobile-menu .close-btn');

    if (mobileToggler && mobileMenu) {
        mobileToggler.addEventListener('click', function () {
            mobileMenu.classList.add('active');
            if (menuBackdrop) menuBackdrop.classList.add('active');
        });

        const closeMobile = function () {
            mobileMenu.classList.remove('active');
            if (menuBackdrop) menuBackdrop.classList.remove('active');
        };

        if (closeBtn) closeBtn.addEventListener('click', closeMobile);
        if (menuBackdrop) menuBackdrop.addEventListener('click', closeMobile);
    }

    // 2. Interactive Tech Stack Tabs
    const tabItems = document.querySelectorAll('.premium-tab-item');
    const contentPanels = document.querySelectorAll('.premium-content-panel');

    if (tabItems.length > 0) {
        tabItems.forEach(tab => {
            tab.addEventListener('click', function () {
                const targetId = this.getAttribute('data-tab');

                tabItems.forEach(t => t.classList.remove('active'));
                contentPanels.forEach(p => p.classList.remove('active'));

                this.classList.add('active');
                const targetPanel = document.getElementById(targetId);
                if (targetPanel) {
                    targetPanel.classList.add('active');
                }
            });
        });
    }

    // 3. Scroll to Top Button
    const scrollTopBtn = document.querySelector('.scroll-to-top');

    window.addEventListener('scroll', function () {
        if (scrollTopBtn) {
            if (window.scrollY > 300) {
                scrollTopBtn.classList.add('active');
            } else {
                scrollTopBtn.classList.remove('active');
            }
        }
    });

    if (scrollTopBtn) {
        scrollTopBtn.addEventListener('click', function () {
            window.scrollTo({
                top: 0,
                behavior: 'smooth'
            });
        });
    }

    // 4. Contact Form WhatsApp Handler
    const contactForm = document.getElementById('contact-form');
    if (contactForm) {
        contactForm.addEventListener('submit', function (e) {
            e.preventDefault();

            const name = contactForm.querySelector('[name="name"]')?.value || '';
            const email = contactForm.querySelector('[name="email"]')?.value || '';
            const phone = contactForm.querySelector('[name="phone"]')?.value || '';
            const subject = contactForm.querySelector('[name="subject"]')?.value || '';
            const websiteType = contactForm.querySelector('[name="website_type"]')?.value || '';
            const budget = contactForm.querySelector('[name="budget"]')?.value || '';
            const message = contactForm.querySelector('[name="message"]')?.value || '';

            const waMessage = `*New Inquiry from MS Solutions Website*%0A%0A` +
                `*Name:* ${encodeURIComponent(name)}%0A` +
                `*Email:* ${encodeURIComponent(email)}%0A` +
                `*Phone:* ${encodeURIComponent(phone)}%0A` +
                `*Subject:* ${encodeURIComponent(subject)}%0A` +
                `*Website Type:* ${encodeURIComponent(websiteType)}%0A` +
                `*Budget:* ${encodeURIComponent(budget)}%0A` +
                `*Message:* ${encodeURIComponent(message)}`;

            const whatsappUrl = `https://wa.me/919382559266?text=${waMessage}`;
            window.open(whatsappUrl, '_blank');
        });
    }

});
