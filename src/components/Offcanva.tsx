import { AskResult } from "../interfaces/Ask.inteface"
import { Answer } from "./Answer"
import { useState, useEffect } from 'react';
import { Option } from "../interfaces/OptionsForm.inteface";
import { AnswerProps } from "../interfaces/Answer.inteface";
import $ from 'jquery';
import { User } from "../interfaces/User.interface";

interface OffCanvaProps {
    id: string,
    ariaLabelledby: string,
    ask: AskResult
}
export const Offcanva = ({ id, ariaLabelledby, ask }: OffCanvaProps) => {

    const [answer, setAnswer] = useState<JSX.Element>(
        <>
            <div className="loading text-center mt-5">
                <div className="spinner-border text-primary" role="status">
                    <span className="visually-hidden">Loading...</span>
                </div>
            </div>
        </>
    )

    useEffect(() => {

        const form = new FormData();
        form.append("ask", ask.id_pregunta);

        const options: Option = {
            method: 'POST',
        };

        options.body = form;

        fetch('http://localhost:800/proyecto-pp/src/apis/answers.php', options)
            .then(response => response.json())
            .then((response) => {
                setAnswer(
                    response.map(
                        (answerData: AnswerProps, i: number) => (
                            <Answer
                                key={i}
                                id_respuesta={answerData.id_respuesta}
                                contenido={answerData.contenido}
                                fechaRespondida={answerData.fechaRespondida}
                                nickname={answerData.nickname}
                                rutaArchivo={answerData.rutaArchivo}
                                nombreArchivo={answerData.nombreArchivo}
                            />
                        )
                    )
                )
            })
            .catch(err => console.error(err));


    }, [ask.id_pregunta])


    return (
        <div className="offcanvas offcanvas-end" id={id} aria-labelledby={ariaLabelledby}>
            <div className="offcanvas-header">
                <h5 className="offcanvas-title" id="offcanvasRightLabel">Comentarios</h5>
            </div>
            <div className="offcanvas-body mx-2">
                <h5>{ask.asunto}</h5>
                <div className="user">
                    <img src={require(`../${ask.rutaArchivo}`)} alt={ask.nombreArchivo} className="icon" />
                    <div className="nombre">
                        <h6>{ask.nickname}</h6>
                        <div className="text2">
                            <p>{ask.fechaPreguntada}</p>
                        </div>
                    </div>
                </div>
                <p className="content">{ask.contenido}</p>
                <form
                    className="newRta py-3"
                    onSubmit={
                        e => {
                            e.preventDefault();

                            const user = JSON.parse(localStorage.getItem('user') || "") as User


                            const form = new FormData();
                            form.append("usuario_respuesta", user.id_usuario);
                            form.append("pregunta", ask.id_pregunta);
                            form.append("contenido", (document.getElementById('areaa') as HTMLInputElement).value);

                            const options: Option = {
                                method: 'POST'
                            };

                            options.body = form;

                            fetch('http://localhost:800/proyecto-pp/src/apis/submitAnswer.php', options)
                                .then(response => response.json())
                                .then(response => {
                                    setAnswer(
                                        <>
                                            <Answer
                                                contenido={(document.getElementById('areaa') as HTMLInputElement).value}
                                                fechaRespondida={new Date().toJSON().slice(0, 10)}
                                                id_respuesta={ask.id_pregunta}
                                                nickname={user.nickname}
                                                rutaArchivo={user.rutaArchivo}
                                                nombreArchivo={user.nombreArchivo}
                                            />
                                            {answer}
                                        </>
                                    );
                                })
                                .catch(err => console.error(err));
                        }
                    }
                >
                    <textarea className="form-control" id="areaa" cols={37} rows={3} placeholder="Dejar un comentario..." required />
                    <button className="mt-3 mx-2" id="enviarr1">Enviar</button>
                </form>
                {answer}
            </div>
        </div>
    )
}
