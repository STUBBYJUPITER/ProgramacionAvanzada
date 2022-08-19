 //ctx.fillStyle = 'black';
            //ctx.fillRect(10, 10, 100, 100);
            //cuadro completo usando transparencia
            //ctx.fillStyle = 'rgba(0, 0, 255, 0.5)';
            //ctx.fillRect(90, 90, 100, 100);
            //ctx.fillStyle = 'rgba(20, 20, 200, 0.5)';
            //ctx.fillRect(180, 180, 100, 100);

            //contorno de un cuadrado
             //ctx.strokeStyle="black";
            //ctx.strokeRect(10,10,200,200);

            //ctx.strokeStyle="green";
            //ctx.strokeRect(30,30,200,200);

           //stroke = contorno de algo
           //lineas

           //donde empieza

           //ctx.moveTo(0,0);
           //donde termina
           //ctx.lineTo(500,500);
           //traza la linea
           //ctx.stroke();

/*
           ctx.moveTo(0,0);
           ctx.lineTo(400,20);
           ctx.lineTo(150,150);
           ctx.stroke();
           ctx.fillStyle = 'rgba(150, 150, 100, 0.5)';
           ctx.fill();
           

          
           ctx.beginPath();
           ctx.fillStyle = 'green';
           ctx.arc(100,390,100,0,2*Math.PI);
           ctx.fill();

           ctx.beginPath();
           ctx.fillStyle = 'purple';
           ctx.arc(390,390,100,0,2*Math.PI);
           ctx.fill();
*/
           //texto
           //ctx.beginPath();
           //ctx.font="30px Arial";
           //ctx.fillText("hola que hace",200,100);

           //ctx.strokeText("nada",340,140);

           //radiante
           
           var grd= ctx.createLinearGradient(0,0,200,0);
             grd.addColorStop(0,"red");
             grd.addColorStop(0.5,"black");
             grd.addColorStop(1,"purple");
             ctx.fillStyle=grd;
             ctx.fillRect(0,200,200,80);

        
   //var  grd = ctx.createRadialGradient(100, 50, 5, 90, 80, 130);
    // grd.addColorStop(0, "red");
     //grd.addColorStop(0.5, "purple");
     //grd.addColorStop(1, "black");
   //ctx.fillStyle = grd;
   //ctx.fillRect(0, 10, 300, 200);



    //  ctx.fillRect(e.offsetX-20,e.offsetY-20,40,40);












    var img=document.getElementById("imagen");
    ctx.drawImage(img,20,50);


    //detectar donde esta el maouse y dibuja una figura
    canvas.addEventListener("mousemove",function(e){
            console.log(e);
           if(press){
            ctx.beginPath();
            ctx.fillRect(e.offsetX-20,e.offsetY-20,10,10);
            ctx.fill();
           } 
            

        });


    canvas.addEventListener('click',function(e){
        console.log(e);
        ctx.fillStyle = color;
        if(fig=="arc"){
            ctx.beginPath();
            ctx.arc(e.offsetX-5,e.offsetY-5,50,0,2*Math.PI);
            ctx.strokeStyle="black";
            
        }else{
            ctx.beginPath();
            ctx.fillRect(e.offsetX-20,e.offsetY-20,50,50);
            
        }
        ctx.fill();
        ctx.stroke();

    });

canvas.addEventListener('mouseover',function(e){
   
    color=random_rgba();
  
});

canvas.addEventListener('mouseout',function(e){
   
    fig=(fig=="arc")?"rec":"arc";
  
});




//funion mousedown para dibujar cuando se esta presionando el mouse

canvas.addEventListener('mousedown',function(e){
   
    press=true;
  
});

//funion mouseup para dejar de dibujar cuando se deja de presionar el mouse
canvas.addEventListener('mouseup',function(e){
   
    press=false;
  
});


function random_rgba() {
var o = Math.round, r = Math.random, s = 255;
return 'rgba(' + o(r()*s) + ',' + o(r()*s) + ',' + o(r()*s) + ',' + r().toFixed(1) + ')';
};