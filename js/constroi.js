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
    
 function cadastro(){
   document.getElementById("modal").style.display = "flex";
 }
 function d(){
    
    document.getElementById("modal").style.display = "none";
 }
