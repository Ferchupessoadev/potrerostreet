import './alpine';
import { createIcons, icons } from 'lucide';


// Esto es vital: crea los iconos en el DOM después de que la página carga
document.addEventListener('DOMContentLoaded', () => {
    createIcons({ icons });
});
