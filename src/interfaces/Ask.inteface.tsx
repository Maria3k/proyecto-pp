export interface AskResponse {
    pages: number;
    results: AskResult[];
}

export interface AskResult {
    id_pregunta: string;
    asunto: string;
    contenido: string;
    fechaPreguntada: string;
    nickname: string;
    rutaArchivo: string;
    nombreArchivo: string;
}