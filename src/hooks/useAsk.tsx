import { useState, useEffect, useRef } from 'react';
import { Ask } from '../components/Ask';
import { AskResponse, AskResult } from '../interfaces/Ask.inteface';
import { Option } from '../interfaces/OptionsForm.inteface';

export const useAsk = (especialidad: number) => {

    const page = useRef(1);

    const [ask, setAsk] = useState<JSX.Element>()



    useEffect(() => {
        askLoader()
    }, [])


    const askLoader = () => {


        setAsk(
            <div className="loading text-center">
                <div className="spinner-border text-primary" role="status">
                    <span className="visually-hidden">Loading...</span>
                </div>
            </div>
        )

        const form = new FormData();
        form.append("e", especialidad.toString());
        form.append("page", page.current.toString());

        const options: Option = {
            method: 'POST',
        };

        options.body = form;

        fetch('http://localhost:800/proyecto-pp/src/apis/ask.php', options)
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
                                    {
                                        page.current != 1
                                            ? <li
                                                className="page-item"
                                                onClick={
                                                    () => {
                                                        page.current--
                                                        askLoader()
                                                    }
                                                }
                                            >
                                                <a
                                                    className="page-link"

                                                    aria-label="Previous"
                                                    href={`#${page.current}`}
                                                >
                                                    <span aria-hidden="true">&laquo;</span>
                                                </a>
                                            </li>
                                            : null
                                    }
                                    {
                                        [...Array(response.pages)].map((a, i) =>
                                            <li
                                                className="page-item"
                                                key={i + 1}
                                                onClick={
                                                    () => {
                                                        page.current = i + 1
                                                        askLoader()
                                                    }
                                                }
                                            >
                                                <a
                                                    className="page-link"

                                                    href={`#${page.current}`}
                                                >{i + 1}</a>
                                            </li>
                                        )
                                    }

                                    {
                                        page.current != response.pages
                                            ?
                                            <li
                                                className="page-item"
                                                onClick={
                                                    () => {
                                                        page.current++
                                                        askLoader()
                                                    }
                                                }
                                            >
                                                <a
                                                    className="page-link"

                                                    aria-label="Next"
                                                    href={`#${page.current}`}
                                                >
                                                    <span aria-hidden="true">&raquo;</span>
                                                </a>
                                            </li>
                                            : null
                                    }
                                </ul >
                                : null

                        }
                    </>
                )

            })
            .catch(err => console.error(err));
    }


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

        fetch('http://localhost:800/proyecto-pp/src/apis/ask.php', options)
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
                                        {
                                            page.current == 1
                                                ? <li className="page-item">
                                                    <a
                                                        className="page-link"
                                                        onClick={
                                                            () => {
                                                                page.current--
                                                                console.log(page.current);
                                                            }
                                                        }
                                                        aria-label="Previous"
                                                        href='#'
                                                    >
                                                        <span aria-hidden="true">&laquo;</span>
                                                    </a>
                                                </li>
                                                : null
                                        }
                                        {
                                            [...Array(response.pages)].map((a, i) =>
                                                <li className="page-item" key={i + 1}>
                                                    <a
                                                        className="page-link"
                                                        onClick={
                                                            () => {
                                                                page.current = i + 1
                                                                console.log(page.current);

                                                            }
                                                        }
                                                        href='#'
                                                    >{i + 1}</a>
                                                </li>
                                            )
                                        }

                                        {
                                            page.current != response.pages
                                                ?
                                                <li className="page-item">
                                                    <a
                                                        className="page-link"
                                                        onClick={
                                                            () => {
                                                                page.current++
                                                                console.log(page.current);

                                                            }
                                                        }
                                                        aria-label="Next"
                                                        href='#'
                                                    >
                                                        <span aria-hidden="true">&raquo;</span>
                                                    </a>
                                                </li>
                                                : null
                                        }
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
