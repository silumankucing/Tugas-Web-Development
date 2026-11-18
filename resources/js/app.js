/**
 * Portfolio Website — interaksi ringan tanpa dependency.
 *
 * 1. Header sticky: menambah latar solid setelah halaman di-scroll.
 * 2. Navigasi mobile: toggle buka/tutup + aksesibilitas.
 * 3. Reveal on scroll: elemen [data-reveal] muncul halus saat terlihat.
 * 4. Tombol salin: [data-copy] menyalin teks ke clipboard.
 */
document.addEventListener('DOMContentLoaded', () => {
    const prefersReducedMotion = window.matchMedia('(prefers-reduced-motion: reduce)').matches;

    /* ---------------------------------------------------------------------
     * Header
     * ------------------------------------------------------------------ */
    const header = document.querySelector('[data-site-header]');

    const syncHeader = () => {
        if (!header) {
            return;
        }

        header.classList.toggle('is-scrolled', window.scrollY > 12);
    };

    syncHeader();
    window.addEventListener('scroll', syncHeader, { passive: true });

    /* ---------------------------------------------------------------------
     * Navigasi mobile
     * ------------------------------------------------------------------ */
    const navToggle = document.querySelector('[data-nav-toggle]');
    const mobileNav = document.querySelector('[data-mobile-nav]');

    if (navToggle && mobileNav) {
        const setOpen = (open) => {
            navToggle.setAttribute('aria-expanded', String(open));
            mobileNav.classList.toggle('is-open', open);
        };

        navToggle.addEventListener('click', () => {
            setOpen(navToggle.getAttribute('aria-expanded') !== 'true');
        });

        mobileNav.querySelectorAll('a').forEach((link) => {
            link.addEventListener('click', () => setOpen(false));
        });

        document.addEventListener('keydown', (event) => {
            if (event.key === 'Escape' && navToggle.getAttribute('aria-expanded') === 'true') {
                setOpen(false);
                navToggle.focus();
            }
        });

        window.addEventListener('resize', () => {
            if (window.innerWidth >= 1024) {
                setOpen(false);
            }
        });
    }

    /* ---------------------------------------------------------------------
     * Reveal on scroll
     * ------------------------------------------------------------------ */
    const revealItems = document.querySelectorAll('[data-reveal]');

    if (!revealItems.length) {
        // Tidak ada elemen untuk dianimasikan.
    } else if (prefersReducedMotion || !('IntersectionObserver' in window)) {
        revealItems.forEach((item) => item.classList.add('is-visible'));
    } else {
        const observer = new IntersectionObserver(
            (entries) => {
                entries.forEach((entry) => {
                    if (!entry.isIntersecting) {
                        return;
                    }

                    entry.target.classList.add('is-visible');
                    observer.unobserve(entry.target);
                });
            },
            { threshold: 0.12, rootMargin: '0px 0px -48px 0px' },
        );

        revealItems.forEach((item) => observer.observe(item));
    }

    /* ---------------------------------------------------------------------
     * Tombol salin
     * ------------------------------------------------------------------ */
    let feedbackTimer;

    document.querySelectorAll('[data-copy]').forEach((button) => {
        const label = button.querySelector('[data-copy-label]');
        const originalLabel = label ? label.textContent : '';

        button.addEventListener('click', async () => {
            const value = button.getAttribute('data-copy');

            if (!value) {
                return;
            }

            try {
                if (navigator.clipboard && window.isSecureContext) {
                    await navigator.clipboard.writeText(value);
                } else {
                    const helper = document.createElement('textarea');
                    helper.value = value;
                    helper.setAttribute('readonly', '');
                    helper.style.position = 'absolute';
                    helper.style.opacity = '0';
                    document.body.appendChild(helper);
                    helper.select();
                    document.execCommand('copy');
                    document.body.removeChild(helper);
                }

                if (label) {
                    label.textContent = 'Tersalin!';
                    window.clearTimeout(feedbackTimer);
                    feedbackTimer = window.setTimeout(() => {
                        label.textContent = originalLabel;
                    }, 2000);
                }
            } catch (error) {
                if (label) {
                    label.textContent = 'Gagal menyalin';
                    window.clearTimeout(feedbackTimer);
                    feedbackTimer = window.setTimeout(() => {
                        label.textContent = originalLabel;
                    }, 2000);
                }
            }
        });
    });
});

