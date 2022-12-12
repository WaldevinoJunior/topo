function adcElemento(){ 
    b = document.body;
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
    const a = document.getElementById("cursoCont");
    const c = document.createElement("div");
    c.setAttribute("class", "cursoConteudo");
    a.appendChild(c);
    document.getElementById("oi2").style.display = "block";
    c.appendChild(document.getElementById("oi2"));
    let d = document.getElementsByClassName("cursoTela");
    for (let i = 0; i < d.length; i++) {
      d[i].style.display = "none";
    }
    document.getElementById("cursoCont").style.display = "block";
 }
 function volta(){
    document.querySelectorAll(".cursoConteudo").forEach(element => {
      element.remove();
    });
    let d = document.getElementsByClassName("cursoTela");
    for (let i = 0; i < d.length; i++) {
      d[i].style.display = "block";
    }
    document.getElementById("cursoCont").style.display = "none";
 }
 /*$(".col-xs-3.col-md-3 .entre").on("mouseenter", function(){
  $("#barras").show();
});

$("div.conteudo_dropdow").on("mouseleave", function(){
  $("#barras").hide();
});*/