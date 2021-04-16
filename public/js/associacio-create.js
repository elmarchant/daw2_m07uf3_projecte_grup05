function main(){
    let input = document.querySelectorAll('input[type=text]');
    let form = document.forms['afegirAssociacio'];

    form.addEventListener('submit', (event)=>{
        input.forEach(item => {
            switch(item.name){
                case 'cif': 
                    if(item.value.length != 9){
                        event.preventDefault();
                        item.classList.add('is-invalid');
                        alert('CIF no vàlid.');
                    }
                    break;
                case 'nom': 
                    if(item.value.length > 75){
                        event.preventDefault();
                        item.classList.add('is-invalid');
                        alert('Caràcters máxims(Nom): 30');
                    }
                    break;
                case 'adreca': 
                    if(item.value.length > 100){
                        event.preventDefault();
                        item.classList.add('is-invalid');
                        alert('Caràcters máxims(Adreça): 100');
                    }
                    break;
                case 'poblacio': 
                    if(item.value.length > 20){
                        event.preventDefault();
                        item.classList.add('is-invalid');
                        alert('Caràcters máxims(Població): 20');
                    }
                    break;
                case 'commarca': 
                    if(item.value.length > 20){
                        event.preventDefault();
                        item.classList.add('is-invalid');
                        alert('Caràcters máxims(Commarca): 20');
                    }
                    break;
                case 'declaracio': 
                    if(item.value.length > 30){
                        event.preventDefault();
                        item.classList.add('is-invalid');
                        alert('Caràcters máxims(Declaració): 30');
                    }
                    break;
                case 'tipus': 
                    if(item.value.length > 20){
                        event.preventDefault();
                        item.classList.add('is-invalid');
                        alert('Caràcters máxims(Tipus): 20');
                    }
                    break;
            }
        });
    });

    
}

window.addEventListener('load', main, true);