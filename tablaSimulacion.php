<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <title>Tabla de Simulación</title>
    <link rel="stylesheet" type="text/css" href="css/tablas.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/xlsx/0.16.9/xlsx.full.min.js"></script>

    <!-- html2canvas -->
   <script src="https://html2canvas.hertzen.com/dist/html2canvas.min.js"></script>
   <!-- jsPDF -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/2.4.0/jspdf.umd.min.js"></script>

   <script src="https://code.jquery.com/jquery-3.6.4.min.js"></script>


</head>
<body>
   
    <div class="contenedor" id="contenedor">
        <header>
            <h1>Resultados de la Simulación</h1>
        </header>

    <div id="resultados" class="resultados">
        <h1 id="titulo1">POLÍTICA 1</h1>
        <table id="politica1">
            <thead>
                <tr>
                    <th>Día</th>
                    <th id="inicial" class="inicial" onmouseover="mostrarModal('inicial')" onmouseout="cerrarModal()">Inventario Inicial</th>
                    <th id="demanda" class="demanda" onmouseover="mostrarModal('demanda')" onmouseout="cerrarModal()">Demanda</th>
                    <th id="final" class="final" onmouseover="mostrarModal('final')" onmouseout="cerrarModal()">Inventario Final</th>
                    <th id="faltante" class="faltante" onmouseover="mostrarModal('faltante')" onmouseout="cerrarModal()">Faltante</th>                    
                    <th id="mantenimiento" class="mantenimiento" onmouseover="mostrarModal('mantenimiento')" onmouseout="cerrarModal()">Costo de Mantenimiento(Bs)</th>                    
                    <th id="deficit" class="deficit" onmouseover="mostrarModal('deficit')" onmouseout="cerrarModal()">Costo Déficit(Bs)</th>
                    <th id="pedir" class="pedir" onmouseover="mostrarModal('pedir')" onmouseout="cerrarModal()">¿Pedir Inventario?</th>
                    <th id="cantidad" class="cantidad" onmouseover="mostrarModal('cantidad')" onmouseout="cerrarModal()">Cantidad de Pedido</th>
                    <th id="entrega" class="entrega" onmouseover="mostrarModal('entrega')" onmouseout="cerrarModal()">Tiempo de Entrega</th>
                    <th id="pedido" class="pedido" onmouseover="mostrarModal('pedido')" onmouseout="cerrarModal()">Costo de Pedido(Bs)</th>
                    <th id="total" class="total" onmouseover="mostrarModal('total')" onmouseout="cerrarModal()">Costo Día(Bs)</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table>
    </div>

    <div id="resultados2" class="contenedor2">
        <table id="politica2">
            <h1>POLÍTICA 2</h1>
            <thead>
                <tr>
                    <th>Día</th>
                    <th id="inicial" class="inicial" onmouseover="mostrarModal('inicial')" onmouseout="cerrarModal()">Inventario Inicial</th>
                    <th id="demanda" class="demanda" onmouseover="mostrarModal('demanda')" onmouseout="cerrarModal()">Demanda</th>
                    <th id="final" class="final" onmouseover="mostrarModal('final')" onmouseout="cerrarModal()">Inventario Final</th>
                    <th id="faltante" class="faltante" onmouseover="mostrarModal('faltante')" onmouseout="cerrarModal()">Faltante</th>                    
                    <th id="mantenimiento" class="mantenimiento" onmouseover="mostrarModal('mantenimiento')" onmouseout="cerrarModal()">Costo de Mantenimiento(Bs)</th>                    
                    <th id="deficit" class="deficit" onmouseover="mostrarModal('deficit')" onmouseout="cerrarModal()">Costo Déficit(Bs)</th>
                    <th id="pedir" class="pedir" onmouseover="mostrarModal('pedir')" onmouseout="cerrarModal()">¿Pedir Inventario?</th>
                    <th id="cantidad" class="cantidad" onmouseover="mostrarModal('cantidad')" onmouseout="cerrarModal()">Cantidad de Pedido</th>
                    <th id="entrega" class="entrega" onmouseover="mostrarModal('entrega')" onmouseout="cerrarModal()">Tiempo de Entrega</th>
                    <th id="pedido" class="pedido" onmouseover="mostrarModal('pedido')" onmouseout="cerrarModal()">Costo de Pedido(Bs)</th>
                    <th id="total" class="total" onmouseover="mostrarModal('total')" onmouseout="cerrarModal()">Costo Día(Bs)</th>
                </tr>
            </thead>
            <tbody></tbody>
        </table> 
    </div>
    <button onclick="exportarExcel()">Exportar en exel</button>
    <button id="mostrarGraficoBtn">Mostrar Gráfico</button>
   
    <div id="graficos">
        <div id="grafica1" class="torta" style="border: 1px solid black;">
            <h2 id="grafico1">Politica 1</h2>
            <canvas id="miGrafico" style= "height: 500px;width: 80%;"></canvas>
            <ul>
                <li id="costos1"></li>
                <li id="costos11"></li>
                <li id="costos12"></li>
            </ul>
        </div>
        <div id="grafica2" class="torta" style="border: 1px solid black;">
            <h2>Politica 2</h2>
            <canvas id="miGrafico1" style= "height: 500px;width: 80%;"></canvas>
            <ul>
                <li id="costos2"></li>
                <li id="costos21"></li>
                <li id="costos22"></li>
            </ul>
        </div>
        <div id="grafica3" class="torta" style="border: 1px solid black;">
            <h2>Costos Totales</h2>
            <canvas id="miGrafico2" style= "height: 500px;width: 80%;"></canvas>
            <ul>
                <li id="totales1"></li>
                <li id="totales2"></li>
                <li id="totales"></li>
            </ul>
        </div>
    </div>
    
    <footer>
        <p>Derechos de autor © 2023</p>
    </footer>
    
  </div>

  <button onclick="exportarGraficoYTablas()">Descargar en PDF</button>

  <div id="miModal" class="modal">
    <div class="modal-contenido">
        <p id="explicacion"></p>
    </div>
  </div>

    
  <script>
function exportarGraficoYTablas() {
    var contenedor = document.getElementById('contenedor');
    contenedor.style.height = contenedor.scrollHeight + 'px';

    window.jsPDF = window.jspdf.jsPDF;

    html2canvas(contenedor).then(function(contenedorImg) {
        var pdf = new jsPDF();
        pdf.addImage(contenedorImg, 'PDF', 20, 20, 160, 200);
        var pdfData = pdf.output();
        pdf.save('simulacion.pdf');
        console.log(pdfData);

        
       // Esperar un breve período antes de enviar el PDF al servidor
    setTimeout(function() {
        $.ajax({
            type: 'POST',
            url: 'tu_servidor.php',
            data: { pdfData: pdfData },
            success: function(response) {
                console.log('PDF enviado correctamente al servidor');
                console.log(response.mensaje);
            },
            error: function(error) {
                console.error('Error al enviar el PDF al servidor', error);
            }
        });
    }, 1000);  // Ajusta el tiempo de espera según sea necesario
});
}
</script>



    <!-- <script src="scripts/simulacion.js"></script> -->
    <script src="scripts/demanda.js"></script>
    <script src="scripts/tiempoEntrega.js"></script>
    <script src="scripts/datosEntrada.js"></script>
    <script src="scripts/graficos.js"></script>
    <script src="scripts/simulacion.js"></script>
    <script src="scripts/modal.js"></script>
    <script src="scripts/exportar.js"></script>

</body>
</html>
