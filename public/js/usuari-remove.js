function main(){
    let forms = document.querySelectorAll('form.remove-form');

    forms.forEach(item =>{
        item.addEventListener('submit', (event)=>{
            event.preventDefault();

            let data = new FormData(item);
            let respuesta = confirm('Vols eliminar l\'usuari '+ data.get('nom_usuari'));
            
            if(respuesta){
                item.submit();                
            }
        });
    });
}

window.addEventListener('load', main, true);