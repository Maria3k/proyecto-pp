import { useState, useEffect } from 'react';
import { Ask } from '../components/Ask';
import { AskResponse, AskResult } from '../interfaces/Ask.inteface';
import { Option } from '../interfaces/OptionsForm.inteface';

export const useAsk = (especialidad: number) => {

    const [ask, setAsk] = useState<JSX.Element>(
        <>
            <div className="loading text-center">
                <div className="spinner-border text-primary" role="status">
                    <span className="visually-hidden">Loading...</span>
                </div>
            </div>
        </>
    )

    useEffect(() => {
        const form = new FormData();
        form.append("e", especialidad.toString());

        const options: Option = {
            method: 'POST',
        };

        options.body = form;

        fetch('http://localhost:800/react-pp/src/apis/ask.php', options)
            .then(response => response.json())
            .then((response: AskResponse) => {
                setAsk(
                    <>
                        {
                            response.results.map(
                                (ask: AskResult, i: number) => (
                                    <Ask
                                        key={i}
                                        id_pregunta={ask.id_pregunta}
                                        asunto={ask.asunto}
                                        contenido={ask.contenido}
                                        fechaPreguntada={ask.fechaPreguntada}
                                        nickname={ask.nickname}
                                        rutaArchivo={ask.rutaArchivo}
                                        nombreArchivo={ask.nombreArchivo}
                                    />
                                )
                            )
                        }
                        {
                            (response.pages >= 1)
                                ?
                                < ul className="pagination justify-content-center">
                                    <li className="page-item">
                                        <a className="page-link" href="#" aria-label="Previous">
                                            <span aria-hidden="true">&laquo;</span>
                                        </a>
                                    </li>
                                    {
                                        [...Array(response.pages)].map((a, i) =>
                                            <li className="page-item" key={i + 1}>
                                                <a
                                                    className="page-link"
                                                    href="#"
                                                >{i + 1}</a>
                                            </li>
                                        )
                                    }

                                    <li className="page-item">
                                        <a className="page-link" href="#" aria-label="Next">
                                            <span aria-hidden="true">&raquo;</span>
                                        </a>
                                    </li>
                                </ul >
                                : null

                        }
                    </>
                )

            })
            .catch(err => console.error(err));

    }, [especialidad])


    const search = (e: React.ChangeEvent<HTMLInputElement>) => {
        setAsk(
            <div className="loading text-center">
                <div className="spinner-border text-primary" role="status">
                    <span className="visually-hidden">Loading...</span>
                </div>
            </div>
        )

        const form = new FormData();
        form.append('e', especialidad.toString());
        form.append('key', e.target.value)

        const options: Option = {
            method: 'POST',
        };

        options.body = form;

        fetch('http://localhost:800/react-pp/src/apis/ask.php', options)
            .then(response => response.json())
            .then((response: AskResponse) => {
                setAsk(
                    response.results 
                    ?
                        <>
                            {
                                response.results.map(
                                    (ask: AskResult, i: number) => (
                                        <Ask
                                            key={i}
                                            id_pregunta={ask.id_pregunta}
                                            asunto={ask.asunto}
                                            contenido={ask.contenido}
                                            fechaPreguntada={ask.fechaPreguntada}
                                            nickname={ask.nickname}
                                            rutaArchivo={ask.rutaArchivo}
                                            nombreArchivo={ask.nombreArchivo}
                                        />
                                    )
                                )
                            }
                            {
                                (response.pages >= 1)
                                    ?
                                    < ul className="pagination justify-content-center">
                                        <li className="page-item">
                                            <a className="page-link" href="#" aria-label="Previous">
                                                <span aria-hidden="true">&laquo;</span>
                                            </a>
                                        </li>
                                        {
                                            [...Array(response.pages)].map((a, i) =>
                                                <li className="page-item" key={i + 1}>
                                                    <a
                                                        className="page-link"
                                                        href="#"
                                                    >{i + 1}</a>
                                                </li>
                                            )
                                        }

                                        <li className="page-item">
                                            <a className="page-link" href="#" aria-label="Next">
                                                <span aria-hidden="true">&raquo;</span>
                                            </a>
                                        </li>
                                    </ul >
                                    : null

                            }
                        </>
                        :
                        <div className="text-center">
                            No se ha encontrado nada relacionado a <b>{e.target.value}</b>
                        </div>
                    
                )
            })
            .catch(err => console.error(err));

    }


    return {
        ask,
        setAsk,
        search,
    }
}
