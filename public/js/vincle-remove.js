function main(){
    var forms = document.querySelectorAll('form.remove-form');

    forms.forEach(item =>{
        item.addEventListener('submit', (event)=>{
            var res = confirm('Vols eliminar aquest vincle?');

            if(!res){
                event.preventDefault();
            }
        });
    });
}

window.addEventListener('load', main, true);