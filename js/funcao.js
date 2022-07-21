function precoContas(){
    quantidade = document.getElementById('quantidade').value
    preco = document.getElementById('preco').value
    precototal = document.getElementById('precototal')
    soma = parseInt(quantidade) * parseFloat(preco)
    if(quantidade != '' && preco != ''){
        precototal.setAttribute("value", 9)
    }
}

function tirarInformacoes(){
    span = document.getElementById('mensagem')
    span.style.backgroundColor = 'red'
    span.style.borderRadius = '50%'
    span.style.fontSize = '1em'
    span.innerHTML = '?'
}

function mostrarInformacoes($mensagem){
    span = document.getElementById('mensagem')
    span.style.backgroundColor = '#F5F7FB'
    p = document.createElement('p')
    p.style.backgroundColor = '#D0DFFD'
    p.style.fontSize = '.5em'
    p.style.borderRadius = '0px'
    p.style.marginTop = '10px'
    p.style.padding = '10px'
    p.innerHTML = $mensagem
    span.appendChild(p)
}

