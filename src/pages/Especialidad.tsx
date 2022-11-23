import '../assets/css/Especialidad.css'
import { Ask } from '../components/Ask';
import { useState } from 'react';
import { useAsk } from '../hooks/useAsk';
import { Navbar } from '../components/Navbar';
import { Footer } from '../components/Footer';
import { Option } from '../interfaces/OptionsForm.inteface';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faMagnifyingGlass } from '@fortawesome/free-solid-svg-icons';
import { useLocation } from 'wouter';
import { User } from '../interfaces/User.interface';
import $ from 'jquery';
import { useLastAsk } from '../hooks/useLastAsk';

interface EspecialidadProps {
    especialidad: 1 | 2 | 3
}

export const Especialidad = ({ especialidad }: EspecialidadProps) => {

    const { ask, setAsk, search } = useAsk(especialidad);
    const [location, setLocation] = useLocation();
    const [loading, setLoading] = useState<JSX.Element>()

    const lastAsk = useLastAsk();


    return (
        <>
            <Navbar />
            <div id="barra">
                <input
                    className="input-field barra"
                    type="text"
                    id="inputo"
                    placeholder="Busqueda de preguntas"
                    onChange={search}
                />
                <FontAwesomeIcon icon={faMagnifyingGlass} className='lupa' color='white' />
            </div>
            <div className="container-sm text-center my-3">
                <div className="row justify-content-center">
                    <div className="cuadro">
                        <div id="texto">
                            Para hacer una pregunta haga click en el boton
                        </div>
                        <button className="b" type="button" data-bs-toggle="collapse" data-bs-target="#preguntaCollapse" aria-expanded="false" aria-controls="preguntaCollapse">
                            +
                        </button>
                    </div>
                    <div className="collapse collapse-ask" id="preguntaCollapse">
                        <form
                            className="card-ask card-body"
                            onSubmit={
                                (e) => {

                                    e.preventDefault();

                                    setLoading(
                                        <div className="loading normal">
                                            <div className="spinner-border text-primary" role="status">
                                                <span className="visually-hidden">Loading...</span>
                                            </div>
                                        </div>
                                    )

                                    if (localStorage.length == 0) setLocation('/form')

                                    const user = JSON.parse(localStorage.getItem('user') || "") as User

                                    const form = new FormData();
                                    form.append("id_ultima", lastAsk)
                                    form.append("usuario_pregunta", user.id_usuario);
                                    form.append("asunto", $('#floatingTextarea').val()?.toString() as string);
                                    form.append("contenido", $('#floatingTextarea2').val()?.toString() as string);
                                    form.append("fechaPreguntada", new Date().toJSON().slice(0, 10));
                                    form.append("respondida", "1");
                                    form.append("e", especialidad.toString());

                                    const options: Option = {
                                        method: 'POST',
                                    };

                                    options.body = form;

                                    fetch('http://localhost:800/proyecto-pp/src/apis/submitAsk.php', options)
                                        .then(response => response.json())
                                        .then(response => {
                                            if (response) {
                                                setLoading(<></>)
                                                setAsk(
                                                    <>
                                                        <Ask
                                                            asunto={$('#floatingTextarea').val()?.toString() as string}
                                                            contenido={$('#floatingTextarea2').val()?.toString() as string}
                                                            fechaPreguntada={new Date().toJSON().slice(0, 10)}
                                                            id_pregunta={lastAsk}
                                                            nickname={user.nickname}
                                                            nombreArchivo={user.nombreArchivo}
                                                            rutaArchivo={user.rutaArchivo}
                                                        />
                                                        {ask}
                                                    </>
                                                )
                                            }
                                        })
                                        .catch(err => console.error(err));

                                }
                            }
                        >
                            <div className="form-floating">
                                <textarea className="form-control" placeholder="Leave a comment here" id="floatingTextarea" required />
                                <label htmlFor='floatingTextarea'>Asunto</label>
                            </div>
                            <div className="form-floating my-2">
                                <textarea className="form-control" placeholder="Leave a comment here" id="floatingTextarea2" required />
                                <label htmlFor='floatingTextarea2'>Contenido</label>
                            </div>
                            <div className="col text-end my-1">
                                <input className="b mx-auto" type="submit" value="Enviar" id="botn" />
                            </div>
                            {loading}
                        </form>
                    </div>
                </div>
            </div>
            {ask}
            <Footer />
        </>
    )
}
