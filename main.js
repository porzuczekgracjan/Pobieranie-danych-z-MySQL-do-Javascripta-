const poka = {
    tabelka : document.querySelector(".php"),
    przyci : document.getElementById("przyci"),
 
    tabela: function(){
        if(this.tabelka.style.display ==="none"){
        this.tabelka.style.display = "block";
        }else{
            this.tabelka.style.display="none"
        }
    },
 
    init: function(){
        this.przyci.addEventListener(
            'click',
            this.tabela.bind(this),
        );
    }
 }
 
 
 poka.init();