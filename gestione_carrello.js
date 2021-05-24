function nascondiCarrello(event){ 

    const carrello = event.currentTarget;
    
    const pannello_carrello = document.querySelector('.pannello_carrello');
    pannello_carrello.classList.add('hidden');
    
    carrello.removeEventListener('click', nascondiCarrello);
    carrello.addEventListener("click", visualizzaCarrello);
  }
  
  function visualizzaCarrello(event) {
  
    const carrello = event.currentTarget;
    
    const pannello_carrello = document.querySelector('.pannello_carrello');
    pannello_carrello.classList.remove('hidden');
    
    carrello.removeEventListener('click', visualizzaCarrello);
    carrello.addEventListener('click', nascondiCarrello);
  
    fetch('visualizza_carrello.php').then(onResponse).then(caricaCarrello);
  
  }
  
  
  function aggiornaCarrello() { 
  
    // Richiedi la lista di articoli
    fetch('visualizza_carrello.php').then(onResponse).then(caricaCarrello);
  
  }
  
  function caricaCarrello(json){ 
  
    const pannello_carrello = document.querySelector('.pannello_carrello2');
    pannello_carrello.innerHTML='';
  
    const num_risultati_trovati = json.length;
  
    for (let i=0; i<num_risultati_trovati; i++) {
  
      const dati = json[i];
  
    const articolo_carrello= document.createElement('form');
    articolo_carrello.classList.add('articolo_carrello');
    articolo_carrello.setAttribute("method", "get");
    pannello_carrello.appendChild(articolo_carrello);
  
    const immagine_articolo_carrello = document.createElement('div');
    immagine_articolo_carrello.classList.add('immagine_articolo_carrello');
    articolo_carrello.appendChild(immagine_articolo_carrello);
    
    const img_articolo = document.createElement('img');
    img_articolo.src= dati.immagine;
    immagine_articolo_carrello.appendChild(img_articolo);
  
    const titolo_e_quantita= document.createElement('div');
    titolo_e_quantita.classList.add('titolo_e_quantita');
    articolo_carrello.appendChild(titolo_e_quantita);
  
    const titolo_articolo_carrello = document.createElement('div');
    titolo_articolo_carrello.classList.add('titolo_articolo_carrello');
    titolo_articolo_carrello.textContent=dati.articolo;
    titolo_e_quantita.appendChild(titolo_articolo_carrello);
  
    const titolo_articolo_hidden = document.createElement('input');
    titolo_articolo_hidden.setAttribute("type", "hidden");
    titolo_articolo_hidden.setAttribute("name", "articolo");
    titolo_articolo_hidden.setAttribute("value", dati.articolo);
    articolo_carrello.appendChild(titolo_articolo_hidden);
  
    const quantita_articolo_carrello = document.createElement('div');
    quantita_articolo_carrello.classList.add('quantita_articolo_carrello');
    titolo_e_quantita.appendChild(quantita_articolo_carrello);
  
    const meno = document.createElement('submit');
    meno.textContent = "-";
    meno.classList.add('meno');
    meno.addEventListener('click', diminuisciQuantita);
    quantita_articolo_carrello.appendChild(meno);
  
    const quantita = document.createElement('div');
    quantita.textContent = dati.quantita;
    quantita.classList.add('quantita');
    quantita_articolo_carrello.appendChild(quantita);
  
    const piu = document.createElement('submit');
    piu.textContent = "+";
    piu.classList.add('piu');
    piu.addEventListener('click', aumentaQuantita);
    quantita_articolo_carrello.appendChild(piu); 
  
    const prezzo_e_rimuovi = document.createElement('div');
    prezzo_e_rimuovi.classList.add('prezzo_e_rimuovi');
    articolo_carrello.appendChild(prezzo_e_rimuovi);
  
    const prezzo_articolo_carrello = document.createElement('div'); 
    prezzo_articolo_carrello.textContent = "€" + dati.prezzo; 
    prezzo_articolo_carrello.classList.add('prezzo_articolo_carrello');
    prezzo_e_rimuovi.appendChild(prezzo_articolo_carrello);
  
    const rimuovi_articolo_carrello = document.createElement('submit');
    rimuovi_articolo_carrello.classList.add('rimuovi_articolo_carrello');
    rimuovi_articolo_carrello.addEventListener('click', rimuoviArticolo);
    prezzo_e_rimuovi.appendChild(rimuovi_articolo_carrello);
  
    }
  
    calcolaTotale();
  
  }
  
  function calcolaTotale() {
  
    fetch('calcola_totale.php').then(onResponse).then(aggiornaTotale);
  
  }
  
  function aggiornaTotale(json){
   
    const totale_carrello = document.querySelector('.totale_carrello span');
    totale_carrello.innerHTML='';
    totale_carrello.textContent = json[0].totale;
  
  }
  
  function aumentaQuantita(event){
   
    const articolo = event.currentTarget.parentNode.parentNode.parentNode.querySelector('input').value;
  
    fetch('aumenta_quantita_carrello.php?articolo=' + articolo).then(aggiornaCarrello);
  
  }
  
  function diminuisciQuantita(event){ 
  
    const articolo = event.currentTarget.parentNode.parentNode.parentNode.querySelector('input').value;
    const quantita = event.currentTarget.parentNode.querySelector('.quantita').textContent;
    
    if(quantita <= "1") { 
        
      fetch('rimuovi_carrello.php?articolo=' + articolo).then(aggiornaCarrello);
  
    } else {
        
      fetch('diminuisci_quantita_carrello.php?articolo=' + articolo).then(aggiornaCarrello);
        
    }
  
  }
  
  
  function aggiungiArticolo(event){

    const form = event.currentTarget.parentNode.parentNode;
    
    const form_data = {method: 'post', body: new FormData(form)};
  
    fetch('aggiungi_carrello.php', form_data).then(aggiornaCarrello);
  
  }
  
  function rimuoviArticolo(event){ 
  
    const articolo = event.currentTarget.parentNode.parentNode.querySelector('input').value;
  
    fetch('rimuovi_carrello.php?articolo=' + articolo).then(aggiornaCarrello);
  
  }

  function onResponse(response) {
    return response.json();
  }

  const carrello = document.querySelector('.carrello');
carrello.addEventListener("click", visualizzaCarrello);



