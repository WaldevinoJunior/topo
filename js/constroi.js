
function adcElemento(){ 
    let a = document.getElementById("cursos");
    let c = document.createElement("div");
    c.setAttribute("class", "cursoTela");
    a.appendChild(c);
    document.getElementById("oi").style.display = "block";
    c.appendChild(document.getElementById("oi"));
    document.getElementById("cursoCont").style.display = "none";
}
function muda(){
  document.getElementById("muda").style.display = "block";
  document.getElementById("canvas").style.display = "none";
}
function muda2(){
  document.getElementById("muda").style.display = "none";
}
function muda3(){
  document.getElementById("muda").style.display = "none";
  document.getElementById("muda2").style.display = "block";
}
function muda4(){
  document.getElementById("muda2").style.display = "none";
  document.getElementById("muda").style.display = "block";

}
function mostraSenha() {
  var senha = document.getElementById("senha");
  if (senha.type === "password") {
    senha.type = "text";
  } else {
    senha.type = "password";
  }
}    
 function altera(){
   document.getElementById("modal").style.display = "flex";
 }
 function alteraH(){
  document.getElementById("modalH").style.display = "flex";
}
 function fecha(){
    document.getElementById("modal").style.display = "none";
 }
 function fechaH(){
  document.getElementById("modalH").style.display = "none";
}
function menu(){
  let e = document.getElementById("mAdmin3");
  if(getComputedStyle(e).display == "none"){
    e.style.display = "flex";
    e.style.flexDirection = "column";
    e.style.backgroundColor = "white";
    e.style.width = "200px";
    e.style.position = "absolute";
    e.style.border ="1px black solid";
    breaK
  }
  if(getComputedStyle(e).display == "flex"){
    e.style.display = "none";
  }
 
}
 var numero = 0; 
 function adcCurso(){
    let a2 = document.getElementById("cursos")
    let c2 = document.createElement("div");
    c2.setAttribute("class", "cursoConteudo");
    c2.setAttribute("name", numero);
    numero++;
    a2.appendChild(c2);
    document.getElementById("oi2").style.display = "block";
    c2.appendChild(document.getElementById("oi2"));
    document.getElementById("cursoCont").style.display = "none";
    let e = document.getElementsByClassName("cursoConteudo");
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "none";
    }
 }
 function volta(){
    let e = document.getElementsByClassName("cursoConteudo");
    for (let i = 0; i < e.length; i++) {
    e[i].style.display = "none";
    }
    let d = document.getElementsByClassName("cursoTela");
    for (let i = 0; i < d.length; i++) {
      d[i].style.display = "flex";
    }
    document.getElementById("cursoCont").style.display = "none";
    window.scrollTo(0,0);
 }
 function mostraCurso(){
    let d = document.getElementsByClassName("cursoConteudo");
    for (let i = 0; i < d.length; i++) {
      d[i].style.display = "block";
    }
    let e = document.getElementsByClassName("cursoTela");
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "none";
    }
    document.getElementById("cursoCont").style.display = "block";
 }
 /*$(".col-xs-3.col-md-3 .entre").on("mouseenter", function(){
  $("#barras").show();
});

$("div.conteudo_dropdow").on("mouseleave", function(){
  $("#barras").hide();
});*/
function mostraAlunos(){
  let e = document.getElementsByClassName("funcA");;
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "none";
    }
    document.getElementById("listaAlunos").style.display = 'block';
}
function cadastraAluno(){
  let e = document.getElementsByClassName("funcA");;
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "none";
    }
    document.getElementById("cadastraAluno").style.display = 'block';
    window.scrollTo(0,0);
}
function voltaAdmin(){
  let e = document.getElementsByClassName("funcA");;
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "block";
    }
    document.getElementById("listaAlunos").style.display = 'none';
    window.scrollTo(0,0);
}
function voltaAdmin2(){
    document.getElementById("cadastraAluno").style.display = 'none';
    document.getElementById("listaAlunos").style.display = 'block';
    document.getElementById("cbcLista").style.display = 'block';
    document.getElementById("tableAluno").style.display = 'block';
    window.scrollTo(0,0);
}
function cadastraAluno2(){
  document.getElementById("tableAluno").style.display = 'none';
  document.getElementById("cbcLista").style.display = 'none';
  document.getElementById("cadastraAluno").style.display = 'block';
}
function mostraColaboradores(){
  let e = document.getElementsByClassName("funcA");;
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "none";
    }
    document.getElementById("listaColaboradores").style.display = 'block';
}
function cadastraColab(){
  window.scrollTo(0,0);
  let e = document.getElementsByClassName("funcA");;
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "none";
    }
    document.getElementById("cadastraColab").style.display = 'block';
}
function cadastraColab2(){
  window.scrollTo(0,0);
  document.getElementById("listaColaboradores").style.display = 'none';
  document.getElementById("cadastraColab").style.display = 'block';
}
function voltaAdmin4(){
   let e = document.getElementsByClassName("funcA");;
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "block";
    }
    document.getElementById("listaColaboradores").style.display = 'none';
    window.scrollTo(0,0);
}
function voltaAdmin3(){
  let e = document.getElementsByClassName("funcA");;
    for (let i = 0; i < e.length; i++) {
      e[i].style.display = "block";
    }
    document.getElementById("cadastraColab").style.display = 'none';
    window.scrollTo(0,0);
}
function deletarAlunos(){
  alert("Confirme para deletar");
}
function buscarAluno(){
   let aluno = document.getElementsByClassName("alunoBusca");
   for (let i = 0; i < aluno.length; i++) {
     aluno[i].style.display = "none";
    if(document.getElementById("busca").value == aluno[i].getAttribute("name")){
      aluno[i].style.display = "flex";
    }
  }
  
}