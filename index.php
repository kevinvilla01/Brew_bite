<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <link rel="stylesheet" href="assets/bootstrap.min.css">
    <script src="assets/bootstrap.bundle.min.js"></script>
    <title>Brew & Bite</title>

    <!-- Estilos de la página -->
    <style>
        @font-face {
            font-family: 'serif';
            src: url(fonts/DM_Serif_Display/DMSerifDisplay-Regular.ttf);
        }
        @font-face {
            font-family: 'lato';
            src: url(fonts/Lato/Lato-Regular.ttf);
        }
        .nav{
            text-align: center;
        }
        .navbar{
            transition: transform 0.3s ease-in-out;
            z-index: 999;
        }
        .nav-link{
            color: #f5f5dc;
            text-decoration: none;
            margin-right: 32px;
        }
        .nav-link:hover{
            color: #F5f5dc;
        }
        .nav-item {
            position: relative; /* Necesario para el efecto de subrayado */
        }
        .nav-item::after{
            content: "";
            position: absolute;
            left: 0;
            bottom: -0.3125rem;
            width: 80%;
            height: 0.1875rem;
            background-color: #F5EEDC;
            transform: scaleX(0);
            transform-origin: bottom right;
            transition: transform 0.3s ease-out;
        }
        .nav-item:hover::after{
            transform: scaleX(1);
            transform-origin: bottom left;
        }
        .bg-body-tertiary{
            background-color: #b68f51 !important;
        }
        .btnOrdenar{
            background-color: #76470a;
            color: #f5f5dc;
            width: 70%;
        }
        .btnOrdenar:hover{
            display: none;
        }
        .container, .principal{
            margin: 1rem 3rem;
        }
        .textot{
            color: #fcfcfc;
            text-align: justify;
            width: 70%;
            font-family: 'serif';
        }
        .texto{
            color: #fcfcfc;
            text-align: justify;
            width: 70%;
            font-family: 'lato';
        }
        .titulos{
            font-family: 'serif';
        }
        .fuente{
            font-family: 'lato';
        }
        body{
            background-color: #b68f51;
            overflow-x: hidden;
        }
        .textp{
            margin-left: -2.5rem;
            margin-top: 5rem;
            text-align: justify;
        }
        .imgp{
            width: 100%;
            height: auto;
            margin-top: 10px;
            border: 10px solid #f5f5dc;
        }
        #textoc{
            color: #d4a05c;
        }
        /* Ajustes responsivos */
        @media (max-width: 768px) {
            .container, .principal {
                margin: 0 auto; /* Reduce el margen en pantallas pequeñas */
                padding: 0 1rem;
            }
            .textot, .texto {
                width: 100%; /* Permite que el texto ocupe todo el ancho en pantallas pequeñas */
            }
            .textp {
                margin-left: 0; /* Centra el texto en pantallas pequeñas */
                margin-top: 1rem; /* Reduce el margen superior */
                text-align: center; /* Centra el texto en pantallas pequeñas */
            }
            .imgp {
                margin-top: 10px;
                width: 100%;
                border: 5px solid #f5f5dc; /* Ajusta el borde para que se vea mejor en pantallas pequeñas */
            }
            .cresponsive {
                flex-direction: column; /* Hace que las columnas se apilen verticalmente en lugar de en fila */
                align-items: center; /* Centra los elementos */
            }
        }

        /*seccion de intermedio*/
        .seccioni1{
            margin-top: 70px;
            background-color: #F5EEDC;
        }

        .iconos{
            margin-top: 10px;
            margin-left: 40%;
            width: 20%;
            height: 4rem;
        }
        .carta{
            padding: 20px;
        }
        .row2{
            display: flex;
            justify-content: center;
            margin-left: 0;
            margin-right: 0;
        }
        .card-img-top{
            height: 200px;
            object-fit: cover;
        }
        #modalOrdenar{
            z-index: 99999;
        }

        /*Cartas*/
        .card {
        position: relative;
        background-color: #F5EEDC; /* Color de fondo inicial */
        text-align: center;
        padding: 20px; /* Ajusta el padding según sea necesario */
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra opcional */
        z-index: 1;
        overflow: hidden; /* Para que el contenido no sobresalga */
        transition: background-color 0.5s ease; /* Transición suave para el fondo */
    }

    .card::after {
        content: "";
        position: absolute;
        inset: 0;
        background-color: #b68f51; /* Color de fondo al hacer hover */
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); /* Cambia según tus necesidades */
        transform: scaleY(0.4);
        transform-origin: bottom;
        z-index: -1;
        transition: transform 0.5s ease; /* Transición para el efecto de fondo */
    }

    .card:hover::after {
        clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); /* Mantener el mismo clip-path */
        transform: scaleY(1);
    }

    .card h4, .card .card-body {
        color: #fcfcfc; /* Color del texto */
        transition: color 0.5s ease; /* Transición para el color del texto */
    }

    .card:hover h4, .card:hover .card-body {
        color: #F5EEDC; /* Color del texto al hacer hover */
    }

        /*Nosotros*/

        .nosotros{
            background-color: #fcfcfc;
        }
        .coreana{
            background-color: #b68f51;
            margin-left: 20%;
            margin: 50px auto;
        }
        .cor{
            object-fit: cover;
            height: auto;
            width: 100%;
        }
        .infonosotros{
            margin-top: 3rem;
            margin-bottom: 3rem;
        }
        /*Fin de nosotros*/

        /*Menu code*/
        .menu{
            background-color: #F5EEDC;
        }
        .btnMenu {
            background-color: #b68f51; /* Color de fondo del botón */
            width: 100%;
            margin-top: 1rem;
            overflow: hidden; /* Asegúrate de que esto no esté causando problemas */
            position: relative;
            z-index: 1; /* Mantén el z-index del botón por encima del pseudo-elemento */
            border: none; /* Asegúrate de que no haya bordes que afecten la apariencia */
            color: white; /* Cambia el color del texto si es necesario */
            padding: 10px; /* Ajusta el padding según sea necesario */
        }

        .btnMenu::before {
            content: '';
            width: 0;
            height: 100%; /* Asegúrate de que el pseudo-elemento cubra todo el botón */
            position: absolute;
            top: 0;
            left: 0;
            background-image: linear-gradient(to right, #8a6b3a 0%, #654400 100%);
            transition: width 0.5s ease; /* Especifica la propiedad que deseas animar */
            display: block;
            z-index: -1; /* Este z-index debe ser menor que el del botón */
        }

        .btnMenu:hover::before {
            width: 100%;
        }

        /* Evitar que el botón cambie su apariencia al hacer hover */
        .btnMenu:hover {
            background-color: #b68f51; /* Manten el mismo color de fondo */
            color: white;
        }
        .col_menu{
            margin-left: 2px;
        }

        .cardmenu{
            position: relative;
            background-color: #b68f51; /* Color de fondo inicial */
            text-align: center;
            padding: 20px; /* Ajusta el padding según sea necesario */
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1); /* Sombra opcional */
            z-index: 1;
            overflow: hidden; /* Para que el contenido no sobresalga */
            transition: background-color 0.5s ease; /* Transición suave para el fondo */
        }
        .cardmenu::after{
            content: "";
            position: absolute;
            inset: 0;
            background-color: #8a6b3a; /* Color de fondo al hacer hover */
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); /* Cambia según tus necesidades */
            transform: scaleY(0.4);
            transform-origin: bottom;
            z-index: -1;
            transition: transform 0.5s ease; /* Transición para el efecto de fondo */
        }
        .cardmenu:hover::after{
            clip-path: polygon(0 0, 100% 0, 100% 100%, 0 100%); /* Mantener el mismo clip-path */
            transform: scaleY(1);
        }

        /*Muestra*/
        .row3{
            margin: 6rem 6rem;
        }
        .col_int{
            margin-top: 4rem;
        }
        #textoi{
            margin: 1rem auto;
            width: 80%;
        }
        /* Ajustes responsivos */
@media (max-width: 768px) {
    .row3 {
        margin: 1rem; /* Reduce el margen en pantallas pequeñas */
    }
    #textoi{
        width: 100%;
    }

    .col_int {
        margin-top: 1rem; /* Reduce el margen superior */
        text-align: center; /* Centra el texto en pantallas pequeñas */
    }

    .col_con .content {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 1rem;
    }

    .col_con img {
        width: 80%; /* Ajusta el tamaño de la imagen para que no se vea muy grande */
    }
}

    /*Galeria*/
    .galeria2 {
        margin: 0 auto;
        display: flex;
        justify-content: center;
        background-color: #F5EEDC;
        width: 80%;
        border-radius: 12px;
    }

    #galeria {
        display: grid;
        grid-template-columns: repeat(4, 1fr); /* 4 columnas de igual tamaño */
        gap: 10px;
        margin-top: 2rem;
    }

    /* Tamaños específicos para cada imagen según su posición en la cuadrícula */
    .large {
        grid-column: span 2; /* Ocupa 2 columnas */
        grid-row: span 2;    /* Ocupa 2 filas */
    }

    .small {
        grid-column: span 1; /* Ocupa 1 columna */
        grid-row: span 1;    /* Ocupa 1 fila */
    }

    .medium {
        grid-column: span 2; /* Ocupa 2 columnas */
        grid-row: span 1;    /* Ocupa 1 fila */
    }

    .wide {
        grid-column: span 4; /* Ocupa 4 columnas (toda la fila) */
        grid-row: span 1;    /* Ocupa 1 fila */
    }

    .item {
        position: relative;
    }

    .galeria2 img {
        width: 100%;
        height: 100%;
        border: 4px solid #8a6b3a;
    }

    .item button {
        position: absolute;
        bottom: 0;
        left: 50%;
        transform: translateX(-50%);
        background-color: #d4a05c; /* Color del botón */
        color: #000; /* Color del texto del botón */
        font-weight: bold;
        padding: 10px 20px; /* Tamaño del botón en pantallas grandes */
        font-size: 1rem; /* Tamaño de fuente en pantallas grandes */
        border-radius: 5px;
    }
    /* Media query para pantallas pequeñas */
    @media (max-width: 768px) {
    .item button {
        padding: 5px 10px;   /* Reduce el padding en pantallas pequeñas */
        font-size: 0.8rem;   /* Reduce el tamaño de fuente */
    }
    }

    /* Media query para pantallas muy pequeñas (como móviles) */
    @media (max-width: 480px) {
    .item button {
        width: 3.1rem;
        height: 1rem;
        padding: 3px 8px;    /* Padding aún más pequeño en móviles */
        font-size: 0.44rem;   /* Tamaño de fuente más pequeño */
    }
    }
    .item button:hover{
        cursor: pointer;
        display: none;
    }

   /*footer*/
    .footer {
        background-color: #fff;
        color: #000;
        padding: 20px;
        text-align: center;
        font-family: Arial, sans-serif;
    }

    .footer-content {
        display: flex;
        justify-content: space-around;
        align-items: center;
        flex-wrap: wrap;
        border-bottom: 1px solid #ccc;
        padding-bottom: 20px;
    }

    .footer-logo img {
        width: 12rem;
        height: auto;
    }

    .footer-info {
        display: flex;
        gap: 50px;
        text-align: left;
    }

    .footer-info h3 {
        font-size: 1.2rem;
        font-weight: bold;
    }

    .footer-info p {
        margin: 5px 0;
    }

    .footer-social {
        display: flex;
        gap: 15px;
        font-size: 1.5rem;
        flex-direction: row; /* Nueva línea para ponerlas una debajo de la otra */
    }

    .footer-social a {
        color: #000;
        text-decoration: none;
    }

    .footer-social img {
        width: 30px; /* Ajustar el tamaño de las imágenes */
        height: auto;
        margin: 5px 0; /* Espacio entre las imágenes */
    }

    .footer-bottom {
        display: flex;
        justify-content: center;
        align-items: center;
        margin-top: 20px;
        font-size: 0.9rem;
        gap: 20px;
    }

    .footer-bottom p {
        margin: 0;
    }
    .footer-bottom a{
        text-decoration: none;
        color: inherit;
    }

    /* Responsivo */
    @media (max-width: 768px) {
        .footer-content {
            flex-direction: column;
            text-align: center;
        }

        .footer-info {
            flex-direction: column;
            align-items: center;
            gap: 20px;
        }

        .footer-social {
            gap: 10px; /* Ajustar el espacio entre los iconos en pantallas pequeñas */
            font-size: 1.2rem; /* Reducir el tamaño de los íconos */
        }

        .footer-bottom {
            flex-direction: column;
            gap: 10px;
        }
    }

    .modal-content {
    background-color: #F5EEDC; /* Fondo del modal */
    }   

    .form-control {
        background-color: white; /* Fondo de los inputs */
        color: black; /* Color del texto de los inputs */
    }

    .form-select {
        background-color: white; /* Fondo del select */
        color: black; /* Color del texto del select */
    }
    
    </style>
    <!-- Fin de estilos de la página -->
</head>
<body>
    <nav class="navbar navbar-expand-lg bg-body-tertiary" id="dynamicNavbar">
        <div class="container">
            <a class="navbar-brand" href="#principal">
                <img src="assets/img/LOGO_AI_VECTORIZADO.png" alt="Brew_Bite" width="200" height="130" style="margin-left: -70px;" id="seccion1">
            </a>

            <!-- Botón de colapso -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Contenedor colapsable -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="nav justify-content-end ms-auto">
                    <li class="nav-item">
                        <a class="nav-link active" aria-current="page" href="#principal">Inicio</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#nosotros">Nosotros</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#menu">Menú</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#galeria">Galería</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#redes">Redes</a>
                    </li>
                    <li class="nav-item">
                        <a href="" class="nav-link" data-bs-toggle="modal" data-bs-target="#modalOrdenar"><img src="assets/img/wired-outline-146-trolley-hover-jump.png" style="height: 2rem;"></a>
                    </li>
                </ul>
            </div>
        </div>
    </nav>
    <script>// Selecciona la navbar
const navbar = document.getElementById('dynamicNavbar');

// Variable para rastrear la posición del scroll
let lastScrollY = window.scrollY;

window.addEventListener('scroll', () => {
    // Obtén la posición actual del scroll
    const currentScrollY = window.scrollY;

    // Si el usuario está desplazándose hacia arriba
    if (currentScrollY < lastScrollY) {
        navbar.style.top = `${currentScrollY}px`; // Ajusta la posición de la navbar
    }

    // Actualiza la posición previa del scroll
    lastScrollY = currentScrollY;
});</script>

    <!-- Contenedor principal -->
    <div class="container text-center py-4 principal" id="principal">
        <div class="container">
            <div class="row cresponsive">
                <div class="col textp me-5">
                    <h1 class="textot">¡El sabor que ya conoces al mejor precio!</h1>
                    <p class="texto py-3">Disfruta de café, pasteles y bocadillos en 
                        nuestra acogedora cafetería. Alimenta tu 
                        cuerpo y alma con una experiencia única.
                        ¡Te esperamos para deleitar tus sentidos!</p>
                        <!--modal ordenar-->
                        <button type="button" class="btn btnOrdenar" data-bs-toggle="modal" data-bs-target="#modalOrdenar">Ordenar</button>
                        <!-- Modal 1-->
                        <div class="modal fade" id="modalOrdenar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalOrdenarLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalOrdenarLabel">Menú</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form id="formOrdenar">
                                            <div class="row mb-3">
                                                <div class="col">
                                                    <label for="productosCafe" class="form-label">Café</label>
                                                    <select class="form-select" id="productosCafe" aria-label="Default select example">
                                                        <option disabled selected>Seleccione un producto</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label for="productosPostres" class="form-label">Postres</label>
                                                    <select class="form-select" id="productosPostres" aria-label="Default select example">
                                                        <option disabled selected>Seleccione un producto</option>
                                                    </select>
                                                </div>

                                                <div class="col">
                                                    <label for="productosBocadillos" class="form-label">Bocadillos</label>
                                                    <select class="form-select" id="productosBocadillos" aria-label="Default select example">
                                                        <option disabled selected>Seleccione un producto</option>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="mb-3">
                                                <label for="listaProductos" class="form-label">Lista de productos</label>
                                                <textarea class="form-control" id="listaProductos" rows="6" placeholder="Lista de productos:"></textarea>
                                            </div>

                                            <div class="mb-3">
                                                <textarea class="form-control" id="descAdicional" rows="3" placeholder="Descripción adicional"></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary btnOrdenar" data-bs-target="#modalOrdenar2" data-bs-toggle="modal" onclick="prepararOrden()">Continuar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            const productosSeleccionados = {};

                            // Función para cargar productos en el select
                            function cargarProductos(tipo, selectId) {
                                fetch(`get_products.php?tipo=${tipo}`)
                                    .then(response => response.json())
                                    .then(productos => {
                                        const select = document.getElementById(selectId);
                                        productos.forEach(producto => {
                                            const option = document.createElement('option');
                                            option.value = producto.id_producto;
                                            option.textContent = producto.nombre;
                                            option.dataset.precio = producto.precio;
                                            select.appendChild(option);
                                        });
                                    })
                                    .catch(error => console.error('Error al cargar los productos:', error));
                            }

                            // Función para actualizar la lista de productos
                            function actualizarListaProductos() {
                                const lista = document.getElementById('listaProductos');
                                lista.value = Object.entries(productosSeleccionados)
                                    .map(([id, { nombre, precio, cantidad }]) => `${nombre} - Precio: $${precio} - Cantidad: ${cantidad}`)
                                    .join('\n');
                            }

                            //Funcion para manejar el cambio en selects
                            function manejarCambio(selectId){
                                const select = document.getElementById(selectId);
                                const selectedOption = select.options[select.selectedIndex];

                                if (selectedOption.value) {
                                    const idProducto = selectedOption.value;
                                    const precioProducto = selectedOption.dataset.precio;
                                    const nombreProducto = selectedOption.textContent;

                                    // Si el producto ya está en la lista, aumentar la cantidad
                                    if (productosSeleccionados[idProducto]) {
                                        productosSeleccionados[idProducto].cantidad++;
                                    } else {
                                        // Si no está, agregarlo a la lista
                                        productosSeleccionados[idProducto] = {
                                            nombre: nombreProducto,
                                            precio: precioProducto,
                                            cantidad: 1
                                        };
                                    }

                                    //Actualizar la lista de productos
                                    actualizarListaProductos();

                                    // Limpiar la selección
                                    select.selectedIndex = 0; // Volver a la opción "Seleccione un producto"
                                }
                            }

                            // Función para preparar la orden al abrir el segundo modal
                            function prepararOrden() {
                                const listaProductosModal = document.getElementById('listaProductosModal');
                                const descAdicionalModal = document.getElementById('descAdicionalModal');

                                // Llenar los campos del segundo modal con los datos del primer modal
                                listaProductosModal.value = document.getElementById('listaProductos').value;
                                descAdicionalModal.value = document.getElementById('descAdicional').value;
                            }

                            // Agregar eventos a los selects
                            document.getElementById('productosCafe').addEventListener('change', () => manejarCambio('productosCafe'));
                            document.getElementById('productosPostres').addEventListener('change', () => manejarCambio('productosPostres'));
                            document.getElementById('productosBocadillos').addEventListener('change', () => manejarCambio('productosBocadillos'));

                            // Cargar productos en los selects
                            cargarProductos('cafe', 'productosCafe');
                            cargarProductos('postre', 'productosPostres');
                            cargarProductos('bocadillo', 'productosBocadillos');
                        </script>
                        <!-- Modal 2-->
                        <div class="modal fade" id="modalOrdenar2" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalOrdenar2Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalOrdenarLabel">Orden</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form id="formOrden">
                                            <div class="mb-3">
                                                <label for="nombre" class="form-label">Nombre</label>
                                                <input type="text" class="form-control" id="nombre" placeholder="Juan Perez">
                                            </div>
                                            <div class="mb-3">
                                                <label for="correo" class="form-label">Correo</label>
                                                <input type="email" class="form-control" id="correo" placeholder="juanperez@gmail.com">
                                            </div>
                                            <div class="mb-3">
                                                <label for="telefono" class="form-label">Teléfono</label>
                                                <input type="tel" class="form-control" id="telefono" placeholder="123456789">
                                            </div>
                                            <div class="mb-3">
                                                <label for="listaProductosModal" class="form-label">Lista de productos</label>
                                                <textarea class="form-control" id="listaProductosModal" rows="6" placeholder="Lista de productos:" readonly></textarea>
                                            </div>
                                            <div class="mb-3">
                                                <label for="descAdicionalModal" class="form-label">Descripción adicional</label>
                                                <textarea class="form-control" id="descAdicionalModal" rows="3" placeholder="Descripción adicional" readonly></textarea>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary btnOrdenar" onclick="insertarOrden()">Continuar</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function insertarOrden() {
                                const nombre = document.getElementById('nombre').value;
                                const correo = document.getElementById('correo').value;
                                const telefono = document.getElementById('telefono').value;
                                const listaProductos = document.getElementById('listaProductosModal').value;
                                const descAdicional = document.getElementById('descAdicionalModal').value;

                                // Aquí puedes calcular el total, por ejemplo, sumando los precios de los productos
                                const total = calcularTotal(); // Implementa esta función según tu lógica

                                // Crear un objeto con los datos
                                const data = {
                                    nombre: nombre,
                                    correo: correo,
                                    telefono: telefono,
                                    lista_productos: listaProductos,
                                    total: total,
                                    descripcion_adicional: descAdicional
                                };

                                // Enviar los datos al servidor usando fetch
                                fetch('insertar_orden.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify(data)
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Si la inserción fue exitosa, avanzar al modal 3
                                        $('#modalOrdenar2').modal('hide');
                                        // Establecer el total en el modal 3
                                        document.getElementById('totalOrden').value = total; // Mostrar el total en el modal 3
                                        $('#modalOrdenar3').modal('show');
                                        // Limpiar los campos del formulario
                                        document.getElementById('nombre').value = '';
                                        document.getElementById('correo').value = '';
                                        document.getElementById('telefono').value = '';
                                        document.getElementById('listaProductos').value = '';
                                        document.getElementById('descAdicional').value = '';
                                        document.getElementById('listaProductosModal').value = '';
                                        document.getElementById('descAdicionalModal').value = '';
                                        // Guardar el id_orden para usarlo en la confirmación de pago
                                        const id_orden = data.id_orden;
                                        document.getElementById('orden').value = id_orden;
                                    } else {
                                        alert('Error al insertar la orden: ' + data.message);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('Error al insertar la orden');
                                });
                            }

                            // Función para calcular el total (implementa tu lógica aquí)
                            function calcularTotal() {
                                let total = 0;

                                // Iterar sobre los productos seleccionados
                                for (const id in productosSeleccionados) {
                                    const producto = productosSeleccionados[id];
                                    // Calcular el total sumando el precio por la cantidad
                                    total += producto.precio * producto.cantidad;
                                }

                                return total; // Retorna el total calculado
                            }
                        </script>
                        <!-- Modal 3-->
                        <div class="modal fade" id="modalOrdenar3" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalOrdenar3Label" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalOrdenarLabel">Pago</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>

                                    <div class="modal-body">
                                        <form id="formPago">
                                            <div class="mb-3">
                                                <label class="form-label" for="text">Confirmación de pago:</label>
                                                <input class="form-control" type="text" name="totalOrden" id="totalOrden" placeholder="$300.00" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label" for="orden">Orden:</label>
                                                <input class="form-control" type="text" name="orden" id="orden" value="" readonly>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label">No. de tarjeta:</label>
                                                <input type="text" inputmode="numeric" class="form-control" name="numTarjeta" id="numTarjeta" maxlength="16" placeholder="1234 5678 9012 3456" required>
                                            </div>

                                            <div class="row">
                                                <div class="col-md-6">
                                                        <label class="form-label" for="cvv">CVV:</label>
                                                        <input class="form-control" type="text" name="cvv" id="cvv" maxlength="3" placeholder="123" required>
                                                </div>
                                                <div class="col-md-6">
                                                        <label class="form-label" for="fecha">Fecha de expiración:</label>
                                                        <input class="form-control" type="text" name="fecha" id="fecha" maxlength="5" placeholder="MM/AA" required>
                                                </div>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary btnOrdenar" onclick="confirmarPago()">Pagar ahora</button>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <script>
                            function confirmarPago() {
                                const totalOrden = document.getElementById('totalOrden').value;
                                const orden = document.getElementById('orden').value;
                                const numTarjeta = document.getElementById('numTarjeta').value;
                                const cvv = document.getElementById('cvv').value;
                                const fecha = document.getElementById('fecha').value;

                                // Crear un objeto con los datos
                                const data = {
                                    total_orden: totalOrden,
                                    orden: orden,
                                    num_tarjeta: numTarjeta,
                                    cvv: cvv,
                                    fecha_expiracion: fecha
                                };

                                // Enviar los datos al servidor usando fetch
                                fetch('confirmar_pago.php', {
                                    method: 'POST',
                                    headers: {
                                        'Content-Type': 'application/json'
                                    },
                                    body: JSON.stringify(data)
                                })
                                .then(response => response.json())
                                .then(data => {
                                    if (data.success) {
                                        // Si la confirmación fue exitosa, mostrar un mensaje de éxito
                                        alert('Pago confirmado con éxito!');
                                        // Limpiar los campos del formulario
                                        document.getElementById('numTarjeta').value = '';
                                        document.getElementById('cvv').value = '';
                                        document.getElementById('fecha').value = '';
                                        document.getElementById('totalOrden').value = '';
                                        document.getElementById('orden').value = '';
                                        // Cerrar el modal
                                        $('#modalOrdenar3').modal('hide');

                                    } else {
                                        alert('Error al confirmar el pago: ' + data.message);
                                    }
                                })
                                .catch(error => {
                                    console.error('Error:', error);
                                    alert('Error al confirmar el pago');
                                });
                            }
                        </script>

                        <!-- Modal Agregar al carrito-->
                        <div class="modal fade" id="modalAgregar" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="modalAgregarLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="modalAgregarLabel">Agregar al carrito</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        ¿Deseas agregar el producto a tu carrito?
                                    </div>
                                    <div class="modal-footer">
                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancelar</button>
                                        <button type="button" class="btn btn-primary btnOrdenar">Agregar</button>
                                    </div>
                                </div>
                            </div>
                        </div>

                </div>

                <div class="col">
                    <div class="row">
                        <div class="col">
                            <img src="assets/img/kalisha-ocheni-_BBTqanOrBI-unsplash.jpg" class="imgp">
                        </div>
                        <div class="col">
                            <img src="assets/img/taylor-franz-GJogrGZxKJE-unsplash.jpg" class="imgp">
                        </div>
                    </div>

                    <div class="row">
                        <div class="col">
                            <img src="assets/img/meina-yin-wIm4CDia_1s-unsplash.jpg" class="imgp">
                        </div>
                        <div class="col">
                            <img src="assets/img/nick-karvounis-1RdpoppRkOA-unsplash.jpg" class="imgp">
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--seccion intermedia de incio-->
    <div class="container-fluid text-center seccioni1">
        <div class="row row2">

        <div class="col-auto">
        <div class="col carta">
            <div class="card cartas" style="width: 18rem;">
                <img src="assets/img/cafe icon.png" class="iconos">
                <h4 style="color: black;">Café</h4>
                <div class="card-body">
                    <a><img src="assets/img/imgs1.png" class="card-img-top"></a>
                </div>
            </div>
        </div>
        </div>

        <div class="col-auto">
            <div class="col carta">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/cake icon.png" class="iconos">
                    <h4 style="color: black;">Pasteles</h4>
                    <div class="card-body">
                        <a><img src="assets/img/imgs2.png" class="card-img-top"></a>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-auto">
            <div class="col carta">
                <div class="card" style="width: 18rem;">
                    <img src="assets/img/pan icon.png" class="iconos">
                    <h4 style="color: black;">Bocadillos</h4>
                    <div class="card-body">
                        <a><img src="assets/img/imgs3.png" class="card-img-top"></a>
                    </div>
                </div>
            </div>
        </div>
        </div>
    </div>

    <!--Nosotros-->
    <div class="container-fluid text-center nosotros">
        <div class="row" id="nosotros">
            <!--Imagen de la coreana-->
            <div class="col">
                <div class="card coreana" style="width: 18rem;">
                    <img src="assets/img/Mesera.png" class="cor">
                </div>
            </div>

            <!--Informacion-->
            <div class="col infonosotros">
                <h1 class="display-4 titulos">Pasteles, bocadillos y los mejores cafes de la zona!</h1>
                <p class="lead fuente" id="textoc">En Brew and Bite, no solo servimos café excepcional y comidas deliciosas, sino que también nos esforzamos por ser un espacio donde la comunidad pueda reunirse, compartir ideas y disfrutar de momentos especiales juntos.</p>
                <ul>
                <li class="fuente">Ambiente acogedor</li>
                <li class="fuente">Servicio al cliente excepcional</li>
                <li class="fuente">Wifi gratuito</li>
                </ul>
                <button type="button" class="btn btnOrdenar" data-bs-toggle="modal" data-bs-target="#modalOrdenar">Ordenar</button>
            </div>
        </div>
    </div>
    <!--Fin de nosotros-->

    <!--Seccion de Menu-->

    <div class="container-fluid text-center py-4 menu px-5">
        <h3 id="menu" class="titulos">Nuestro delicioso menú</h3>
        <div class="row">
            <div class="col">
                <!--boton menu-->
                <button type="button" class="btn btn-lg btn-block btnMenu titulos" id="btnCafe">Café</button>
            </div>
            <div class="col">
                <!-- boton menu-->
                <button type="button" class="btn  btn-lg btn-block btnMenu titulos" id="btnPostres">Postres</button>
            </div>
            <div class="col">
                <!-- boton menu-->
                <button type="button" class="btn btn-lg btn-block btnMenu titulos" id="btnBocadillos">Bocadillos</button>
            </div>

            <div class="row row-cols-md-3 g-4 col_menu" id="contenedor-menu">
                <!-- CARGAR LAS CARDS DEL MENÚ EN EL CONTENEDOR -->
            </div>
        </div>
    </div>
    <!--Fin de menú-->

    <!--Seccion intermedia-->
    <div class="container_fluid text-center infocirculo">
        <div class="row row3">
            <div class="col col_int">
                <h2 class="titulos" style="color: #fcfcfc;">¡Café de calidad, servicio de calidad!</h2>
                <p class="fuente" id="textoi" style="color: #fcfcfc;">El lugar ideal para los amantes del café, los adictos a los postres y los devordadores de emparedados de calidad.</p>
                <button type="button" class="btn btnOrdenar" data-bs-toggle="modal" data-bs-target="#modalOrdenar">Ordenar</button>
            </div>
            <div class="col col_con">
                <div class="content">
                    <img src="assets/img/muestra.png" style="width: 60%;">
                </div>
            </div>
        </div>
    </div>
    <!--Fin seccion intermedia-->

    <!--Inicio de galeria-->
    <div class="container-fluid text-center py-4 galeria2">
        <div class="row rowgaleria" id="galeria">
            <div class="item large">
                <img src="assets/img/img galeria1.jpg" alt="25% de descuento en mocca!">
                <button class="btn" data-bs-toggle="modal" data-bs-target="#modalOrdenar">ORDENAR</button>
            </div>

            <div class="item small">
                <img src="assets/img/Capuchino.jpg" alt="25% de descuento en capuchino!">
                <button class="btn" data-bs-toggle="modal" data-bs-target="#modalOrdenar">ORDENAR</button>
            </div>

            <div class="item small">
                <img src="assets/img/img galeria2.jpeg" alt="Pastel de queso sabroso!">
                <button class="btn" data-bs-toggle="modal" data-bs-target="#modalOrdenar">ORDENAR</button>
            </div>

            <div class="item medium">
                <img src="assets/img/Img galeria3.jpg" alt="Expresso increible con 25%!">
                <button class="btn" data-bs-toggle="modal" data-bs-target="#modalOrdenar">ORDENAR</button>
            </div>

            <div class="item wide">
                <img src="assets/img/img galeria4.png" alt="Desayuno hogareño!">
                <button class="btn" data-bs-toggle="modal" data-bs-target="#modalOrdenar">ORDENAR</button>
            </div>
        </div>
    </div>

    <!--Redes_footer-->
    <footer class="footer">
        <div class="footer-content" id="redes">
            <div class="footer-logo">
                <img src="assets/img/LOGO_AI_VECTORIZADO.png" alt="Brew & Bite Logo" width="200" height="130">
            </div>

            <div class="footer-info">
                <div class="contact">
                    <h3 class="titulos">Contáctanos</h3>
                    <p>+1 (02352) 109-9222</p>
                    <p>Brew&Bite@email.com</p>
                    <a href="https://maps.app.goo.gl/u6zaHmdiEP6KzeNZA" target="_blank"><p>Av. Las Nieves 52 C.P. 55895 Méx.</p></a>
                </div>

                <div class="hours">
                    <h3 class="titulos">Horario de apertura</h3>
                    <p>Lunes a viernes: 07:00 - 21:00</p>
                    <p>Sábado: 10:00 - 16:00</p>
                </div>
            </div>

            <div class="footer-social">
                <a href="https://www.facebook.com/share/hW7gMUZefRavUcgX/" target="_blank"><img class="fab fa-facebook" src="assets/img/face.png"></img></a>
                <a href="https://www.instagram.com/brew.bite_/profilecard/?igsh=MThlcHlsZG9sNXpmbw==" target="_blank"><img class="fab fa-instagram" src="assets/img/insta.png"></img></a>
            </div>
        </div>

        <div class="footer-bottom">
            <a href="terminos.html"><p>Términos y Condicones</p></a>
            <p>&copy; 2024. Brew & Bite Company. Todos los derechos reservados</p>
        </div>
    </footer>

    <script>
        document.getElementById('btnCafe').addEventListener('click', () => cargarProductos('CAFE'));
        document.getElementById('btnPostres').addEventListener('click', () => cargarProductos('POSTRE'));
        document.getElementById('btnBocadillos').addEventListener('click', () => cargarProductos('BOCADILLO'));

        // Función para cargar los productos según el tipo seleccionado
        function cargarProductos(tipo) {
            const contenedor = document.getElementById('contenedor-menu');
            contenedor.innerHTML = ''; // Limpiar el contenedor antes de cargar nuevos productos

            fetch(`get_products.php?tipo=${tipo}`)
                .then(response => response.json())
                .then(productos => {
                    productos.forEach(producto => {
                        // Crear un div con la clase 'col'
                        const colDiv = document.createElement('div');
                        colDiv.className = 'col';

                        // Crear la tarjeta
                        const card = document.createElement('div');
                        card.className = 'card cardmenu h-100';
                        card.innerHTML = `
                            <img src="${producto.foto}" class="card-img-top rounded-circle" alt="${producto.nombre}" style="width: 40%; height: 10rem; margin: 0 auto; object-fit: contain;">
                            <div class="card-body">
                                <h5 class="card-title">${producto.nombre}</h5>
                                <p class="card-text">Precio: $${producto.precio}</p>
                            </div>
                        `;

                        // Agregar la tarjeta al div 'col'
                        colDiv.appendChild(card);

                        // Agregar el div 'col' al contenedor principal
                        contenedor.appendChild(colDiv);
                    });
                })
                .catch(error => console.error('Error al cargar los productos:', error));
        }
    </script>

</body>
</html>