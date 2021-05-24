function onJson(json){

    const num_risultati_trovati = json.length;
      for (let i=0; i<num_risultati_trovati; i++) {
  
        const dati = json[i];
  
        const container = document.querySelector('#preordini');
  
        const contenuto = document.createElement('div');
        contenuto.classList.add('contenuto');
        container.appendChild(contenuto);
  
        const elementoHTML= document.createElement('form');
        elementoHTML.setAttribute("method", "post");
        contenuto.appendChild(elementoHTML);
  
        const nuovaimg = document.createElement('img');
        nuovaimg.classList.add('nuovaimg');
        nuovaimg.src=dati.immagine;
        elementoHTML.appendChild(nuovaimg);
  
        const img_articolo_hidden = document.createElement('input');
        img_articolo_hidden.setAttribute("type", "hidden");
        img_articolo_hidden.setAttribute("name", "immagine");
        img_articolo_hidden.setAttribute("value", dati.immagine);
        elementoHTML.appendChild(img_articolo_hidden);
  
        const elementoHTML2= document.createElement('div');
        elementoHTML2.classList.add('elementoHTML2');
        elementoHTML.appendChild(elementoHTML2);
  
        const nuovoh1 = document.createElement('h1');
        nuovoh1.classList.add('nuovoh1');
        nuovoh1.textContent=dati.titolo;
        elementoHTML2.appendChild(nuovoh1);
  
        const titolo_articolo_hidden = document.createElement('input');
        titolo_articolo_hidden.setAttribute("type", "hidden");
        titolo_articolo_hidden.setAttribute("name", "titolo");
        titolo_articolo_hidden.setAttribute("value", dati.titolo);
        elementoHTML.appendChild(titolo_articolo_hidden);
  
        const cesta_aggiungi = document.createElement('submit');
        cesta_aggiungi.classList.add('cesta_aggiungi');
        cesta_aggiungi.setAttribute("value", "");
        elementoHTML2.appendChild(cesta_aggiungi);
  
        const bottone_dettagli = document.createElement('button');
        bottone_dettagli.textContent="Mostra dettagli";
        bottone_dettagli.classList.add('bottone_dettagli');
        elementoHTML.appendChild(bottone_dettagli);
  
        const spazio_dettagli = document.createElement('div');
        spazio_dettagli.classList.add('spazio_dettagli');
        spazio_dettagli.classList.add('hidden');
        elementoHTML.appendChild(spazio_dettagli);
  
        const prezzo = document.createElement('h2');
        prezzo.textContent="€" + dati.prezzo;
        spazio_dettagli.appendChild(prezzo);
  
        const prezzo_articolo_hidden = document.createElement('input');
        prezzo_articolo_hidden.setAttribute("type", "hidden");
        prezzo_articolo_hidden.setAttribute("name", "prezzo");
        prezzo_articolo_hidden.setAttribute("value", dati.prezzo);
        elementoHTML.appendChild(prezzo_articolo_hidden);
        
        const dettagli = document.createElement('h2');
        dettagli.textContent="Genere: " + dati.genere;
        spazio_dettagli.appendChild(dettagli);
       
  
        /* Descrizione degli oggetti*/
        bottone_dettagli.addEventListener('click', mostra_dettagli);
  
        cesta_aggiungi.addEventListener("click", aggiungiArticolo);
      }
  
  }


function onResponse(response) {
    return response.json();
  }
  
  
  function mostra_dettagli(event) {
  
    event.preventDefault();
    
    const bottone = event.currentTarget;
    const descrizione = event.currentTarget.parentNode.querySelector('.spazio_dettagli');
    
    isVisible = !isVisible;
    if (isVisible) {
      descrizione.classList.remove('hidden');
      bottone.textContent = 'Nascondi dettagli';
    } else {
      descrizione.classList.add('hidden');
      bottone.textContent = 'Mostra dettagli';
    }
  
  
  }


  fetch('json_preordini.php').then(onResponse).then(onJson);

  /* Creazione dinamica dei blocchi*/
let isVisible = false;