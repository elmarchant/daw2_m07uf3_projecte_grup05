function main(){
    let forms = document.querySelectorAll('form.remove-form');

    forms.forEach(item =>{
        item.addEventListener('submit', (event)=>{
            event.preventDefault();
            
            let respuesta = confirm('Vols eliminar aquesta associació?');
            
            if(respuesta){
                item.submit();                
            }
        });
    });
}

window.addEventListener('load', main, true);