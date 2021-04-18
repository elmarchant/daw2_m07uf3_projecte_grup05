function main(){
    let passForm = document.querySelector('#contrasenya');

    passForm.addEventListener('submit', (event)=>{
        let data = new FormData(passForm);

        if(data.get('contrasenya') != data.get('re-contrasenya')){
            event.preventDefault();
            alert('Les contrasenyes no coincideixen');
        }
    });
}

window.addEventListener('load', main, true);