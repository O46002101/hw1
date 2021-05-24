function nascondiMenu(event){
    const menu = event.currentTarget;
    
    const menu_tendina = document.querySelector('.menu_tendina');
    menu_tendina.classList.add('hidden');
    
    menu.removeEventListener('click', nascondiMenu);
    menu.addEventListener("click", mostraMenu);
}

function mostraMenu(event) { 
    const menu = event.currentTarget;
    
    const menu_tendina = document.querySelector('.menu_tendina');
    menu_tendina.classList.remove('hidden');
    
    menu.removeEventListener('click', mostraMenu);
    menu.addEventListener('click', nascondiMenu);
}

const menu = document.querySelector('#menu');
menu.addEventListener('click', mostraMenu);