import './bootstrap';
import Alpine from 'alpinejs';

// Tente esta versão mais específica:
import.meta.glob([
  '../imgs/**',
], { eager: true }); 

window.Alpine = Alpine;
Alpine.start();