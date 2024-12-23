document.addEventListener('DOMContentLoaded', function() {
    // Burger menu functionality
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click', () => {
        // Toggle Nav
        nav.classList.toggle('nav-active');

        // Animate Links
        navLinks.forEach((link, index) => {
            if (link.style.animation) {
                link.style.animation = '';
            } else {
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.3}s`;
            }
        });

        // Burger Animation
        burger.classList.toggle('toggle');
    });

    // Contact form handling
    const contactForm = document.querySelector('.contact-form form');
    
    if (contactForm) {
        contactForm.addEventListener('submit', function(e) {
            e.preventDefault();
            
            const formData = new FormData(this);
            
            // Tampilkan loading state
            const submitBtn = this.querySelector('.submit-btn');
            const originalBtnText = submitBtn.innerHTML;
            submitBtn.innerHTML = '<i class="fas fa-spinner fa-spin"></i> Sending...';
            submitBtn.disabled = true;

            fetch('process.php', {
                method: 'POST',
                body: formData
            })
            .then(response => response.json())
            .then(data => {
                // Tampilkan pesan sukses/error
                const alertDiv = document.createElement('div');
                alertDiv.className = `alert alert-${data.status}`;
                alertDiv.textContent = data.message;
                
                contactForm.insertBefore(alertDiv, contactForm.firstChild);
                
                // Reset form jika sukses
                if (data.status === 'success') {
                    contactForm.reset();
                }
                
                // Hapus pesan setelah 5 detik
                setTimeout(() => {
                    alertDiv.remove();
                }, 5000);
            })
            .catch(error => {
                console.error('Error:', error);
                // Tampilkan pesan error umum
                const alertDiv = document.createElement('div');
                alertDiv.className = 'alert alert-error';
                alertDiv.textContent = 'An error occurred. Please try again later.';
                contactForm.insertBefore(alertDiv, contactForm.firstChild);
                
                setTimeout(() => {
                    alertDiv.remove();
                }, 5000);
            })
            .finally(() => {
                // Kembalikan tombol ke state awal
                submitBtn.innerHTML = originalBtnText;
                submitBtn.disabled = false;
            });
        });
    }

    // Smooth scrolling for navigation links
    document.querySelectorAll('a[href^="#"]').forEach(anchor => {
        anchor.addEventListener('click', function (e) {
            e.preventDefault();
            const target = document.querySelector(this.getAttribute('href'));
            if (target) {
                target.scrollIntoView({
                    behavior: 'smooth',
                    block: 'start'
                });
                // Close mobile menu if open
                if (nav.classList.contains('nav-active')) {
                    nav.classList.remove('nav-active');
                    burger.classList.remove('toggle');
                }
            }
        });
    });

    // Optional: Add scroll to top button
    const scrollTopBtn = document.createElement('button');
    scrollTopBtn.innerHTML = '<i class="fas fa-arrow-up"></i>';
    scrollTopBtn.className = 'scroll-top-btn';
    document.body.appendChild(scrollTopBtn);

    window.addEventListener('scroll', () => {
        if (window.pageYOffset > 300) {
            scrollTopBtn.classList.add('show');
        } else {
            scrollTopBtn.classList.remove('show');
        }
    });

    scrollTopBtn.addEventListener('click', () => {
        window.scrollTo({
            top: 0,
            behavior: 'smooth'
        });
    });
});

// Add CSS for scroll to top button
const style = document.createElement('style');
style.textContent = `
    .scroll-top-btn {
        position: fixed;
        bottom: 20px;
        right: 20px;
        background: #5b8d4d;
        color: white;
        width: 40px;
        height: 40px;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        display: none;
        align-items: center;
        justify-content: center;
        transition: all 0.3s ease;
        z-index: 1000;
        opacity: 0;
    }

    .scroll-top-btn.show {
        display: flex;
        opacity: 1;
    }

    .scroll-top-btn:hover {
        background: #4a7340;
        transform: translateY(-3px);
    }
`;
document.head.appendChild(style); 

function toggleMenu() {
    const navLinks = document.querySelector('.nav-links');
    navLinks.classList.toggle('active');
} 