/* Declaração das variáveis */

const modal = document.querySelector('.tela-modal')
const tbody = document.querySelector('tbody')
const sFilme = document.querySelector('#m-filme')
const sGenero = document.querySelector('#m-genero')
const sAno = document.querySelector('#m-ano')
const sStream = document.querySelector('#m-stream')
const btnSalvar = document.querySelector('#btnSalvar')

/* Variáveis de armazenamento */

let itens
let id

/* Funções responsáveis por pegar e encaixar os itens no banco. */

const getItensBD = () => JSON.parse(localStorage.getItem('dbfunc')) ?? []
const setItensBD = () => localStorage.setItem('dbfunc', JSON.stringify(itens))

function loadItens() {
  itens = getItensBD()
  tbody.innerHTML = ''
  itens.forEach((item, index) => {
    insertItem(item, index)
  })

}

loadItens()

/* Criação das ações para Update e Delete. */

function insertItem(item, index) {
  let tr = document.createElement('tr')

  tr.innerHTML = `
    <td>${item.filme}</td>
    <td>${item.genero}</td>
    <td>${item.ano}</td>
    <td>${item.stream}</td>
    <td class="acao">
      <button onclick="editItem(${index})"><i class='bx bx-edit' ></i></button>
    </td>
    <td class="acao">
      <button onclick="deleteItem(${index})"><i class='bx bx-trash'></i></button>
    </td>
  `
  tbody.appendChild(tr)
}

/* ALteração para Update ou Delete do Array */

function editItem(index) {

  openModal(true, index)
}

function deleteItem(index) {
  itens.splice(index, 1)
  setItensBD()
  loadItens()
}

/* Ações do modal */
/* OBS 1: "add" será responsável pela atividade do modal. Caso esteja ativa, essa ação fornece a exibição*/
/* OBS 2: "remove" será responsável pela atividade do modal. Caso não esteja ativa, o "display = none" fornecido no CSS irá desativar sua exibição.*/

function openModal(edit = false, index = 0) {
  modal.classList.add('active')

  modal.onclick = e => {
    if (e.target.className.indexOf('tela-modal') !== -1) {
      modal.classList.remove('active')
    }
  }

  /* Funcionamento do Update do CRUD */

  if (edit) {
    sFilme.value = itens[index].filme
    sGenero.value = itens[index].genero
    sAno.value = itens[index].ano
    sStream.value = itens[index].stream
    id = index
  } else {
    sFilme.value = ''
    sGenero.value = ''
    sAno.value = ''
    sStream.value = ''
  }
  
}

/* Botão para armazenamento */

btnSalvar.onclick = e => {
  
  if (sFilme.value == '' || sGenero.value == '' || sAno.value == '' || sStream.value == '') {
    return
  }

  e.preventDefault();

  if (id !== undefined) {
    itens[id].filme = sFilme.value
    itens[id].genero = sGenero.value
    itens[id].ano = sAno.value
    itens[id].stream = sStream.value
  } else {
    itens.push({'filme': sFilme.value, 'genero': sGenero.value, 'ano': sAno.value, 'stream': sStream.value})
  }

  setItensBD()

  modal.classList.remove('active')
  loadItens()
  id = undefined
}