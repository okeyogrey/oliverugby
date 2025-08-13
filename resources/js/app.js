import './bootstrap';

import Alpine from 'alpinejs';

import AOS from 'aos';
import 'aos/dist/aos.css';

AOS.init({
    duration: 800, // animation duration in ms
    once: true,    // animation happens only once
});

window.Alpine = Alpine;

Alpine.start();
