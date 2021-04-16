function main(){
    var forms = document.querySelectorAll('form');

    forms.forEach(item =>{
        item.addEventListener('submit', (event)=>{
            var res = confirm('Vols eliminar aquest soci?');

            if(!res){
                event.preventDefault();
            }
        });
    });
}

window.addEventListener('load', main, true);