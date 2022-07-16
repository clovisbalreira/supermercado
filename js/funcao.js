function precoContas(){
    quantidade = document.getElementById('quantidade').value
    preco = document.getElementById('preco').value
    precototal = document.getElementById('precototal')
    soma = parseInt(quantidade) * parseFloat(preco)
    if(quantidade != '' && preco != ''){
        precototal.setAttribute("value", soma)
    }
}
