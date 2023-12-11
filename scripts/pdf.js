
        function generarPDF() {
            // Crear una instancia de jsPDF
            const pdf = new jsPDF();

            // Obtener el contenido del contenedor y agregarlo al PDF
            const contenido = document.getElementById('contenedor');
            pdf.fromHTML(contenido, 15, 15);

            // Guardar el PDF con un nombre específico
            pdf.save('resultados_simulacion.pdf');
        }