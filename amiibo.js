function onJson(json) {
    const risultati = document.querySelector('#risultati');
    risultati.innerHTML = '';
    const file_amiibo =json.amiibo;
    const num_risultati_trovati = json.amiibo.length;
    for(let i=0; i<num_risultati_trovati; i++)
    {
      
      const dati_amiibo = file_amiibo[i]
      
      const nome_amiibo = dati_amiibo.name;
      const immagine_amiibo = dati_amiibo.image;
      
      const amiibo = document.createElement('div');
      amiibo.classList.add('amiibo');
      
      const img = document.createElement('img');
      img.src = immagine_amiibo;
      
      const didascalia = document.createElement('span');
      didascalia.textContent = nome_amiibo;
     
      amiibo.appendChild(img);
      amiibo.appendChild(didascalia);
     
      risultati.appendChild(amiibo);
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
    fetch('amiibo_api.php?q=' + valore_input).then(onResponse).then(onJson);
  }
  
  
  // Aggiungo l'event listener al form
  const form = document.querySelector('#form');
  form.addEventListener('submit', search);
