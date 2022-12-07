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
 function cadastro(){
   document.getElementById("modal").style.display = "flex";
 }
 function d(){
    
    document.getElementById("modal").style.display = "none";
 }
 function oi71(){
    document.getElementById("cursos").style.display = "none";
 }
