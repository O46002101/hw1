
  function onJson(json) {
    const risultati = document.querySelector('#risultati');
    risultati.innerHTML = '';
    const giochi_risultati = json.results;
    const num_risultati_trovati = json.results.length;

    for(let i=0;i<num_risultati_trovati;i++){

    const gioco_risultato = giochi_risultati[i];

    const nome_gioco = gioco_risultato.name ;
    const immagine_gioco = gioco_risultato.background_image;
    const metacritic_gioco = gioco_risultato.metacritic;
    
    const blocco = document.createElement('div');
    blocco.classList.add('gioco');
    
    const img = document.createElement('img');
    img.src = immagine_gioco;
    
    const nome = document.createElement('span'); 
    nome.textContent= nome_gioco;

    const didascalia = document.createElement('span');
    didascalia.classList.add('didascalia');
    didascalia.textContent = "Metacritic : " + metacritic_gioco;
   
    blocco.appendChild(img);
    blocco.appendChild(nome);
    blocco.appendChild(didascalia);
   
    risultati.appendChild(blocco);
    }
  
  }

  function onResponse(response) {
    return response.json();
  }
  
  function search(event)
  {
    //Evitiamo il refresh della pagina
    event.preventDefault();
    const input = document.querySelector('#barradiricerca');
    const valore_input = encodeURIComponent(input.value);
    fetch('metacritic_api.php?q=' + valore_input).then(onResponse).then(onJson);
  }
  

  // Aggiungo l'event listener al form
   const form = document.querySelector('#form');
   form.addEventListener('submit', search);
  