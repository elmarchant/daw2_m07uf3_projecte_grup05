function main(){
    var nom = document.querySelector('#nom');
    var nomUsuari =  document.querySelector('#nom-usuari');;
    var contrasenya = document.querySelector('#contrasenya');
    var rol = document.querySelector('#rol');

    nom.addEventListener('submit', (event)=>{
        let data = new FormData(nom);

        if(data.get('nom').length > 30){
            event.preventDefault();
            nom.querySelector('input[type="text"]').classList.add('is-invalid');
            alert('30 caràcters màxims');
        }
    });

    nomUsuari.addEventListener('submit', (event)=>{
        event.preventDefault(); 
        let data = new FormData(nomUsuari);

        if(data.get('nom_usuari').length > 30){
            event.preventDefault();
            nomUsuari.querySelector('input[type="text"]').classList.add('is-invalid');
            alert('20 caràcters màxims');
        }
    });

    contrasenya.addEventListener('submit', (event)=>{

        let data = new FormData(contrasenya);

        let inputs = contrasenya.querySelectorAll('input[type="password"]');

        if(data.get('contrasenya').length < 8){
            event.preventDefault();
            inputs[0].classList.add('is-invalid');
            alert('Mínim de caràcters: 8');
        }else if(data.get('contrasenya') != data.get('re-contrasenya')){
            event.preventDefault();
            inputs[0].classList.add('is-invalid');
            inputs[1].classList.add('is-invalid');

            alert('Les contrasenyes no coincideixen');
        }
    });
}

window.addEventListener('load', main, true);