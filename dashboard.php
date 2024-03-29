<?php
session_start();

// Verificar si el usuario está autenticado
if (!isset($_SESSION['username'])) {
    // Si no está autenticado, redirigir al formulario de inicio de sesión
    header("Location: login.php");
    exit();
}

// Obtener el nombre de usuario
$username = $_SESSION['username'];
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Página de Usuario</title>

    <link rel="stylesheet" type="text/css" href="css/formulario.css">

    <style>
        
        nav {
            background-color: #333;
            color: #fff;
            padding: 15px;
            text-align: right;
            margin-bottom: 20px; /* Agregado para espacio en la parte inferior de la barra de navegación */
        }

        nav a {
            color: #fff;
            text-decoration: none;
            margin: 0 15px;
        }

        main {
            padding: 20px;
        }
    </style>
</head>
<body>
    
    <nav>
        <a href="#">Perfil</a>
        <a href="logout.php">Cerrar Sesión</a>
        <span> <?php echo $username; ?></span>
    </nav>

    <main>
        
    <section id="descripcion">
            <h2>Bienvenido a nuestra herramienta de gestión de inventarios.</h2>
            <p>Esta aplicación está diseñada para ayudarte a tomar decisiones informadas sobre cómo manejar el inventario de ciertos artículos, optimizando costos y eficiencia operativa.</p>
            
            <h3>Desafío:</h3>
            <p>Nos enfrentamos al desafío de gestionar la oferta y la demanda de manera efectiva. La demanda diaria de los artículos sigue un patrón específico, y queremos encontrar la estrategia más económica para mantener un inventario suficiente.</p>
            
            <h3>Cómo Funciona:</h3>
            <ul>
                <li>La aplicación considera la demanda diaria, modelada con una distribución binomial.</li>
                <li>El tiempo de entrega es simulado como una variable aleatoria Poisson.</li>
                <li>Se asignan costos a diferentes aspectos, como mantenimiento, déficit y pedidos.</li>
            </ul>
            
            <h3>Políticas de Inventario a Evaluar:</h3>
            <ol>
                <li>Política 1: Ordenar cada 8 días hasta alcanzar un inventario de 30 artículos.</li>
                <li>Política 2: Ordenar hasta 30 artículos cuando el nivel del inventario sea menor o igual a 10.</li>
            </ol>
            
            <h3>Objetivo:</h3>
            <p>Queremos determinar cuál de estas políticas es más económica y eficiente para tu negocio.</p>
        </section>

        <section id="simulacion">
            <form id="simulacion-form" method="get" action="tablaSimulacion.php"  >
                <h2>¡Ingresa los detalles requeridos y descubre la estrategia óptima para gestionar tu inventario!</h2>

                <label for="politica">Selecciona una Política de Inventario:</label>
                <select id="politica" name="politica">
                    <option value="politica1" >Política 1: Reponer inventario cada 8 días.</option>
                    <option value="politica2">Política 2: Reponer inventario cuando sea menor a 11.</option>
                    <option value="politica3">Ambas Políticas</option>
                </select>

                <input type="number" id="duracion" name="duracion" min="1" placeholder="Ingrese la duración de la simulación">

                <input type="number" name="inventario" id="inventario" placeholder="Ingrese el inventario inicial">

                <input type="number" name="costoM" id="costoM" placeholder="Ingrese el costo de mantenimiento por día">

                <input type="number" name="costoD" id="costoD" placeholder="Ingrese el costo en caso de déficit por unidad">

                <input type="number" name="costoP" id="costoP" placeholder="Ingrese el costo por cada pedido">

                <button type="submit" id="iniciar-simulacion">Iniciar Simulación</button>
                
            </form>
        </section>
        
        

    </main>
</body>
</html>

