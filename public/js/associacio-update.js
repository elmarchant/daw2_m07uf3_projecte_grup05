function main(){
    let forms = document.querySelectorAll('form');

    forms.forEach(item => {
        item.addEventListener('submit', (event)=>{
            let data = new FormData(item);
            let max = 0;
            let key='';

            if(data.has('nom')){
                key='nom';
                max=75;
            }else if(data.has('adreca')){
                key='adreca';
                max=100;
            }else if(data.has('poblacio')){
                key='poblacio';
                max=20;
            }else if(data.has('commarca')){
                key='commarca';
                max=20;
            }else if(data.has('declaracio')){
                key='declaracio';
                max=30;
            }else if(data.has('tipus')){
                key='tipus';
                max=20;
            }

            if(data.get(key).length > max){
                event.preventDefault();
                item.querySelector('input[type="text"]').classList.add('is-invalid');
                alert('Caràcters màxims: '+max);
            }
        });
    });
}

window.addEventListener('load', main, true);