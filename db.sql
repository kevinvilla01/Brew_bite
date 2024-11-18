CREATE TABLE menu (
    id_producto SERIAL PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    precio int(11) NOT NULL,
    descripcion varchar(255) NOT NULL,
    foto varchar(100) NOT NULL,
    categoria varchar(100) NOT NULL
);

CREATE TABLE orden (
    id_orden SERIAL PRIMARY KEY,
    nombre varchar(100) NOT NULL,
    correo varchar(100) NOT NULL,
    telefono varchar(100) NOT NULL,
    lista_productos varchar(100) NOT NULL,
    total int(11) NOT NULL,
    descripcion_adicional varchar(100) NOT NULL,
    fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP,
    estado varchar(100) NOT NULL DEFAULT 'pendiente'
);

CREATE TABLE confirmacion_pago (
    id_pago SERIAL PRIMARY KEY,
    id_orden int NOT NULL,
    num_tarjeta varchar(100) NOT NULL,
    cvv varchar(100) NOT NULL,
    fecha_exp varchar(100) NOT NULL,
    total int(11) NOT NULL,
    estado varchar(100) NOT NULL DEFAULT 'pendiente',
    fecha date NOT NULL DEFAULT CURRENT_TIMESTAMP
);