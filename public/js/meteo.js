const options = {
    enableHighAccuracy: true,
    timeout: 5000,
    maximumAge: 0
  };
  // affiche les infos de la meteo en fonction de la geolacatisation
  function success(pos) {
      // enregistremnt de la latitude et longitude
    let crd = pos.coords;
  
    console.log('Votre position actuelle est :');
    console.log(`Latitude : ${crd.latitude}`);
    console.log(`Longitude : ${crd.longitude}`);
    console.log(`La précision est de ${crd.accuracy} mètres.`);

    // Clés de l'API
    key = "6a7dd3e034574a301c1221e9a3fc37a3"
    // appel de l'api ApiWeather
    fetch(`https://api.openweathermap.org/data/2.5/weather?lat=${crd.latitude}&lon=${crd.longitude}&appid=6a7dd3e034574a301c1221e9a3fc37a3&units=metric`, { method: 'get' }).then(response => response.json()).then(result => {
    
    //enregistrement de la ville en fonction de la geolocalisation
    let weather = result

    //affichage de l'heure
    document.getElementById("location").innerHTML= `<i class="material-icons locationIcon">place</i> ${weather.name}`;

    // date du jour
    let date = new Date();

    // affiche l'heure actuelle
    document.getElementById('time').innerHTML= `${date.getHours()+" : "+date.getMinutes()}`
    
document.getElementById('temp').innerHTML= `${weather.main.temp}<span id="F">&#8451;</span>`


            });

  }
  // affiche les erreurs si il y en as
  function error(err) {
    console.warn(`ERREUR (${err.code}): ${err.message}`);
  }
  // lance la fonction sucess ou error
  navigator.geolocation.getCurrentPosition(success, error, options);
