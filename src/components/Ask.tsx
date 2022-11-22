import '../assets/css/Ask.css'
import { AskResult } from '../interfaces/Ask.inteface';
import { Offcanva } from './Offcanva'



export const Ask = (
    props: AskResult
) => {

    console.log();
    
    
    return (
        <div className="tarjeta my-4">
            <div className="container">
                <div className="row">
                    <div className="col">
                        <h5>{props.asunto}</h5>
                    </div>
                </div>

                <div className="row">
                    <div className="col">
                        <div className="user">
                            <img src={require(`../${props.rutaArchivo}`)} alt={props.nombreArchivo} className="icon" />
                            <div className="nombre">
                                <h6>{props.nickname}</h6>
                                <div className="text2">
                                    <p>{props.fechaPreguntada}</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div className="col">
                    <div className="row">
                        <p className="content">{props.contenido}</p>
                    </div>
                </div>

                <div className="col">
                    <div className="row justify-content-end">
                        <button className="btn btn-primary m-2" type="button" data-bs-toggle="offcanvas" data-bs-target={`#offcanvasRight${props.id_pregunta}`} id="botonnn">Responder</button>
                    </div>
                </div>

            </div>
            <Offcanva
                ariaLabelledby={`offcanvasRightLabel${props.id_pregunta}`}
                id={`offcanvasRight${props.id_pregunta}`}
                ask={props}                
            />
        </div>
    )
}
