function adcElemento(){
    
    b = document.body;
    console.log(b);
    let a = document.getElementById("cursos");
    console.log(a);
    let c = document.createElement("div");
    c.setAttribute("class", "cursoTela");
    a.appendChild(c);
    document.getElementById("oi").style.display = "block";
    c.appendChild(document.getElementById("oi"));
    document.getElementById("cursoCont").style.display = "none";
}
function muda(){
  document.getElementById("muda").style.display = "block";
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
 function altera(){
   document.getElementById("modal").style.display = "flex";
 }
 function fecha(){
    document.getElementById("modal").style.display = "none";
 }
 function apaga(){
    b = document.body;
    let a = document.getElementById("cursoCont");
    let c = document.createElement("div");
    c.setAttribute("class", "cursoConteudo");
    a.appendChild(c);
    document.getElementById("oi").style.display = "block";
    c.appendChild(document.getElementById("oi"));
    console.log(document.querySelectorAll(".cursoTela"));
    document.querySelectorAll(".cursoTela").forEach(element => {
      element.style.display = "none";
    });
    document.getElementById("cursoCont").style.display = "block";
 }
 function volta(){
    document.querySelectorAll(".cursoConteudo").forEach(element => {
      element.remove();
    });
    document.querySelectorAll(".cursoTela").forEach(element => {
      element.style.display = "block";
    });
 }
