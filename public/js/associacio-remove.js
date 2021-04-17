function main(){
    var forms = document.querySelectorAll('form.remove-form');

    forms.forEach(item =>{
        item.addEventListener('submit', (event)=>{
            var res = confirm('Vols eliminar aquesta associació?');

            if(!res){
                event.preventDefault();
            }
        });
    });
}

window.addEventListener('load', main, true);