$(document).ready(function () {

  // fonction qui cache le champs select  
  function Display_none() {
    document.getElementById("task_client").style.display = "none";
  };

  // fonction qui affiche les change select
  function Display_block() {
    document.getElementById("task_client").style.display = "block";
  };

  // appel de la fonction display_none
  Display_none();

  //url de l'api
  const apiUrl = 'https://api-adresse.data.gouv.fr/search/?q=';

  //selection du champs form adresse
  let adresse = document.querySelector('#task_client');

  // fonction qui ce lance a chaque fois qu'on appuie sur une touche dans le champ adresse
  $(adresse).keypress(function () {

    //valeur du champ adresse
    let test = $(this).val();

    //remplacement des espace par des "+"
    let test_replace = test.replace(/\s/g, '+');

    //ajout de la valeur du form a notre url
    let url = apiUrl + test_replace;

    //affichage de l'url dans la console aprés chaque touche
    console.log(url);

    //appel de l'api Fetch
    fetch(url, { method: 'get' }).then(response => response.json()).then(result => {

      // affichage des resultat aprés chaque touche dans la console 
      console.log(result.features);

      //affichage du champs select
      Display_block();

      //afficher directement le select avec 5 proposition
      $('#monselect').attr('size', 5);

      // remplissage de la div select a chaque résultat             
      document.getElementById('monselect').innerHTML =
        `<option value="` + result.features[0].properties.label + `">"` + result.features[0].properties.label + `"</option>
                <option value="`+ result.features[1].properties.label + `">"` + result.features[1].properties.label + `"</option>
        <option value="`+ result.features[2].properties.label + `">"` + result.features[2].properties.label + `"</option>
        <option value="`+ result.features[3].properties.label + `">"` + result.features[3].properties.label + `"</option>
        <option value="`+ result.features[4].properties.label + `">"` + result.features[4].properties.label + `"</option>`;
      
        //fonction qui remplis le champs adresse aprés un clique sur un select
      $('#monselect').change(function () {
        $("#task_client").val(this.value);
        
        // ne plus afficher le champs select
        Display_none();
      });


    });


  });


});
