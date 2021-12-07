function mostraMenu(){
  if(document.querySelector('.submenu').style.display == 'none' || document.querySelector('.submenu').style.display == ""){
    document.querySelector('.submenu').style.display = 'block';
  }else{
    document.querySelector('.submenu').style.display = 'none';
  }
}

function addConvidado() {

  var convidado = document.getElementById('listaConvidados').value;
  var lista = document.getElementById('lista');
  if(lista.value == ""){
    lista.value = convidado;
  }else{
    lista.value += '\n'+convidado;
  }
  var item = document.createElement('li');
  item.innerHTML = convidado;
  lista.appendChild(item);
}