
var urlParams = new URLSearchParams(window.location.search);
var datoss = datos(urlParams);
var politica = datoss.politica; //extraemos 
var duracion = datoss.duracion;

// Obtener referencia al cuerpo de la tabla en el elemento con id "resultados"
var tablaResultados = document.querySelector("#resultados table tbody");

// Obtener referencia al cuerpo de otra tabla en el elemento con id "resultados2"
var tablaResultados2 = document.querySelector("#resultados2 table tbody");

var datosTabla = new Array(); //costo Total
var datosTotales = new Array(); //costo de cada politica
    

var datosGrafico = {
    labels: ['Costo Mantenimiento', 'Costo Deficid', 'Costo Pedido'],  // Aquí ponemos etiquetas como 'Día 1', 'Día 2', etc.
    datasets: [{
        label: 'Costo Total',
        data: [],  // Aquí ponemos los costos  totales de cada día
        backgroundColor: ['orange', 'blue', 'gray'],
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
    }]
};
var datosAmbos = {
    labels: ['POLÍTICA 1', 'POLÍTICA 2'],  // Aquí ponemos etiquetas como 'Día 1', 'Día 2', etc.
    datasets: [{
        label: 'Costo Total',
        data: [],  // Aquí ponemos los costos  totales de cada día
        backgroundColor: ['orange', 'blue'],
        borderColor: 'rgba(75, 192, 192, 1)',
        borderWidth: 1
    }]
};

/*creacion de un metodo para mostrar la tabla, la funcion recibira dos parametros
la politica y la tabla en la que se mostrara*/
function iniciarSimulacion(politica, tabla){
var dia = 1;  //inicializamos el dia en 1
var inventarioI = datoss.inventario; // cantidad de inventario Inicial
var inventarioF;  //inventario final
const costoDeficid =datoss.costoD;   //costo de deficid
const costMantenimiento = datoss.costoM; //costo de mantenimiento
const costoPedido = parseInt(datoss.costoP);  //costo de pedido
var costoP;
var costoM;
var costoD;
var deficid;
var pedir, tiempoEntrega;
var cantidadPedido = 0;
var costoTotalDia, costoTotal = 0;
var costoToMa = 0, costoToDe = 0, costoToPe = 0;


    function avanzarDia(){

        if(dia<=duracion){

        var demandaDiaria = generarDemandaBinomial(6,0.5);
        var fila = document.createElement("tr");
        fila.innerHTML = `<td>${dia}</td>    
        <td>${inventarioI}</td>
        <td>${demandaDiaria}</td>`;

        inventarioF = (inventarioI - demandaDiaria) < 0 ? 0 : inventarioI - demandaDiaria;
        deficid = (inventarioI - demandaDiaria) < 0 ? Math.abs(inventarioI - demandaDiaria) : 0;
        inventarioI = inventarioF;
        costoM = parseInt(inventarioF*costMantenimiento);
        costoD = deficid*costoDeficid;

        fila.innerHTML += `<td>${inventarioF}</td>
                           <td>${deficid}</td>
                           <td>${costoM}</td>
                           <td>${costoD}</td>`;

        if(politica === "politica1"){//si en el formulario se eligio la politica 1 se calculara lo siguiente
                
            fila.innerHTML += `
                               <td>${dia%8 === 0 ? pedir = "Si" : pedir = "No" }</td> 
                               <td>${dia%8 === 0 ? cantidadPedido=30 - (inventarioF):0}</td>
                               <td>${dia%8 === 0 ? tiempoEntrega = generarTiempoEntrega(3):0}</td>
                               <td>${dia%8 ===0 ? costoPedido: 0}</td>
                               <td>${dia%8 ===0 ? costoTotalDia=costoM+costoPedido+costoD:costoTotalDia=costoM+costoD}</td>`; 
            costoTotal+=costoTotalDia;   //El costo total  acumulado de cada dia
            costoToMa += costoM;
            costoToDe += costoD;
            costoToPe += dia % 8 === 0 ? costoPedido : 0;
            datosTotales.push(costoToMa), datosTotales.push(costoToDe), datosTotales.push(costoToPe);

            inventarioI = tiempoEntrega === 0 ? cantidadPedido + inventarioF: inventarioF;
            datosTabla.push(costoTotal);

        }else{
            fila.innerHTML += `
                                   <td>${inventarioF<=10 && cantidadPedido == 0 ?pedir = "Si" : pedir = "No"}</td>
                                   <td>${inventarioF<=10 && cantidadPedido == 0 ? cantidadPedido = 30 - (inventarioF):0}</td>
                                   <td>${inventarioF<=10 && pedir === "Si" ? tiempoEntrega = generarTiempoEntrega(3):0}</td>
                                   <td>${inventarioF<=10 && pedir === "Si" ? costoPedido: 0}</td>
                                   <td>${inventarioF<=10 && pedir === "Si"  ? costoTotalDia=costoM+costoPedido:costoTotalDia=costoM+costoD}</td>`;
                costoTotal+=costoTotalDia;  

                costoToMa += costoM;
                costoToDe += costoD;
                costoToPe += inventarioF<=10 && pedir === "Si" ? costoPedido : 0;                
                datosTotales.push(costoToMa), datosTotales.push(costoToDe), datosTotales.push(costoToPe);

                inventarioI = tiempoEntrega === 0 ? cantidadPedido + inventarioF: inventarioF;
                cantidadPedido = tiempoEntrega === 0 ? 0:cantidadPedido;
                datosTabla.push(costoTotal);

        }


        tabla.appendChild(fila);
        setTimeout(avanzarDia, 250);
        dia++;
        tiempoEntrega--;

    }
  }
  avanzarDia();

}

if(politica === "politica1" || politica === "politica2"){
    document.getElementById("resultados2").remove();
    iniciarSimulacion(politica,tablaResultados);
    if(politica === "politica2"){
        document.getElementById("titulo1").innerHTML = "POLÍTICA 2";
        document.getElementById("grafico1").innerHTML = "Politica 2";
    }
    graficos(datosGrafico,"solo",datosTotales);
}else{
    
    iniciarSimulacion("politica1",tablaResultados);
    iniciarSimulacion("politica2",tablaResultados2);
    graficos(datosGrafico,"gra",datosTotales);
    graficos(datosAmbos,"pie",datosTabla);

}


