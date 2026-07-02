USE securedesk;

INSERT INTO usuarios(nombre,email,password,rol)
VALUES
('Administrador','admin@securedesk.local','admin123','Administrador'),
('Laura Gómez','laura@securedesk.local','laura123','Analista'),
('Carlos Pérez','carlos@securedesk.local','carlos123','Usuario');

INSERT INTO incidencias
(titulo,descripcion,prioridad,estado,usuario_id)
VALUES
('SQL Injection detectada',
'Se ha detectado una posible SQL Injection en el módulo de login.',
'Alta',
'Abierta',
2),

('Servidor lento',
'El servidor responde con mucha latencia.',
'Media',
'En progreso',
3),

('Actualización pendiente',
'Actualizar Apache y PHP.',
'Baja',
'Cerrada',
1);

INSERT INTO comentarios(incidencia_id,usuario_id,comentario)
VALUES
(1,2,'Se está revisando la consulta vulnerable.'),
(2,3,'Parece un problema de memoria.'),
(3,1,'Actualización completada.');

INSERT INTO logs(usuario_id,accion)
VALUES
(1,'Inicio de sesión'),
(2,'Creó una incidencia'),
(3,'Subió un archivo');