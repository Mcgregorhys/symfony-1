import './styles/app.css';
import { startStimulusApp } from '@symfony/stimulus-bridge';

// Inicjalizuj Stimulus TYLKO RAZ
export const app = startStimulusApp();

// Rejestruj kontrolery (przykład dla LiveComponent)
import LiveController from '@symfony/ux-live-component';
app.register('live', LiveController);

// Alpine.js (jeśli potrzebny)
import Alpine from 'alpinejs';
window.Alpine = Alpine;
Alpine.start();

// Hamburger menu (przenieś to do osobnego kontrolera Stimulus)
const btn = document.getElementById("hamburger-icon");
const nav = document.getElementById("mobile-menu");
btn?.addEventListener("click", () => {
    nav.classList.toggle("flex");
    nav.classList.toggle("hidden");
});