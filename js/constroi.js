function adcElemento(){
    b = document.body;
    console.log(b);
    let a = document.createElement("div");
    a.setAttribute("class", "cursos");
    console.log(a);
    b.appendChild(a);
    let c = document.createElement("div");
    c.setAttribute("class", "cursoTela");
    console.log(b);
    a.appendChild(c);
 }
 function cadastro(){
   document.getElementById("modal").style.display = "flex";
 }
 function d(){
    
    document.getElementById("modal").style.display = "none";
 }
