function main(){
    let pass = document.querySelector('#contrasenya');
    let rePass = document.querySelector('#re-contrasenya');
    let submit = document.querySelector('#submit');
    let nom = document.querySelector('#nom');
    let nomUsuari = document.querySelector('#nom-usuari');
    let valid = true;
    let form = document.querySelector('#afegirUsuari');

    function passValidate(flag){
        if(flag){
            pass.classList.remove('is-invalid');
            rePass.classList.remove('is-invalid');
            submit.removeAttribute('disabled');
            valid = true;
        }else{
            pass.classList.add('is-invalid');
            rePass.classList.add('is-invalid');
            submit.setAttribute('disabled', '');
            valid = false;
        }
    }

    nom.addEventListener('input', ()=>{
        if(nom.value.length <= 30){
            nom.classList.remove('is-invalid');
            valid=true;
        }else{
            nom.classList.add('is-invalid');
            valid=false;
        }
    });

    nomUsuari.addEventListener('input', ()=>{
        if(nomUsuari.value.length <= 20){
            nomUsuari.classList.remove('is-invalid');
            valid=true;
        }else{
            nomUsuari.classList.add('is-invalid');
            valid=false;
        }
    });

    pass.addEventListener('input', ()=>{
        if(pass.value != rePass.value || pass.value == '' || pass.value.length < 8){
            passValidate(false);
        }else{
            passValidate(true);
        }
    });

    rePass.addEventListener('input', ()=>{
        if(rePass.value != pass.value || rePass.value == '' || rePass.value.length < 8){
            passValidate(false);
        }else{
            passValidate(true);
        }
    });

    form.addEventListener('submit', (event)=>{
        if(!valid){
            event.preventDefault();
            passValidate(false);
            alert('La contrasenya no coincideix o no té menys de 8 caràcters');
        }
    });
}

window.addEventListener('load', main, true);