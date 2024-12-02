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

INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('EXPRESSO', 45, 'EXPRESSO', '/assets/menu_img/cafe_expresso.png', 'CAFE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('AMERICANO', 35, 'AMERICANO', '/assets/menu_img/cafe_americano.png', 'CAFE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('CAPUCHINO', 45, 'CAPUCHINO', '/assets/menu_img/cafe_capuchino.png', 'CAFE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('FRAPPE', 50, 'FRAPPE', '/assets/menu_img/cafe_frappe.png', 'CAFE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('LATTE', 70, 'LATTE', '/assets/menu_img/cafe_latte.png', 'CAFE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('MOCCA', 45, 'MOCCA', '/assets/menu_img/cafe_mocca.png', 'CAFE');

INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('CHEESE CAKE', 45, 'CHEESE CAKE', '/assets/menu_img/postre_chessecake', 'POSTRE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('BROWNIE C', 35, 'BROWNIE C', '/assets/menu_img/postre_browniec', 'POSTRE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('CREPAS', 45, 'CREPAS', '/assets/menu_img/postre_crepas', 'POSTRE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('FLAN', 50, 'FLAN', '/assets/menu_img/postre_flan', 'POSTRE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('PASTEL DE CHOCOLATE', 70, 'PASTEL DE CHOCOLATE', '/assets/menu_img/postre_pasteldechocolate', 'POSTRE');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('CUPCAKE', 45, 'CUPCAKE', '/assets/menu_img/postre_cupcake', 'POSTRE');

INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('HOTDOG', 10, 'HOTDOG', '/assets/menu_img/bocadillos_hotdog.png', 'BOCADILLO');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('BAGUETTE SALMON', 10, 'BAGUETTE SALMON', '/assets/menu_img/bocadillos_baguette.png', 'BOCADILLO');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('BAGUETTE RES', 10, 'Baguette Res', '/assets/menu_img/bocadillos_baguetteres.png', 'BOCADILLO');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('PAN RELLENO', 10, 'Pan Relleno', '/assets/menu_img/bocadillos_panrellano.png', 'BOCADILLO');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('GALLETAS', 10, 'Galletas', '/assets/menu_img/bocadillos_galletas.png', 'BOCADILLO');
INSERT INTO menu (nombre, precio, descripcion, foto, categoria) VALUES ('PAN DE MUERTO', 10, 'Pan de Muerto', '/assets/menu_img/bocadillos_pandemuerto.png', 'BOCADILLO');