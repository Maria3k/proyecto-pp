import { AnswerProps } from "../interfaces/Answer.inteface"

export const Answer = (
    {
        id_respuesta,
        contenido,
        fechaRespondida,
        nickname,
        rutaArchivo,
        nombreArchivo,
    }: AnswerProps
) => {
    return (
        <div className="rta1">
            <div className="user">
                <img src={require(`../${rutaArchivo}`)} alt={nombreArchivo} className="icon" />
                <div className="nombre">
                    <h6>{nickname}</h6>
                    <div className="text2">
                        <p>{fechaRespondida}</p>
                    </div>
                </div>
            </div>
            <p id="rtaDerta">{contenido}</p>
            <a className="rta3" data-bs-toggle="collapse" href={`#collapse${id_respuesta}`} role="button" aria-expanded="false">
                Contestar...
            </a>
            <div className="collapse" id={`collapse${id_respuesta}`}>
                <div className="card card-subRta card-body pb-4">
                    <div className="newRta2">
                        <textarea className="form-control mt-2" id="subRta" cols={34} rows={3} placeholder="Dejar un comentario..." />
                        <button id="enviarr2" className="my-2 mx-2">Enviar</button>
                    </div>
                </div>
            </div>
            <div id="linea"></div>
        </div>
    )
}
