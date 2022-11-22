export interface User {
    id_usuario: string;
    nombre: string;
    apellido: string;
    nickname: string;
    email: string;
    fechaNacimiento: string;
    'contraseña': string;
    id_avatar: string;
    nombreArchivo: string;
    rutaArchivo: string;
    sesion: Sesion;
}

export interface Sesion {
    id_sesion: string;
    usuario: string;
    navegador: string;
    dispositivo: string;
    hora: string;
}