import { Navbar } from '../components/Navbar'
import { Card } from '../components/Card'
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faChevronLeft, faChevronRight } from "@fortawesome/free-solid-svg-icons";
import '../assets/css/Home.css'
import '../assets/css/Slider.css'
import { Footer } from '../components/Footer';
import '../assets/js/home'

export const Home = () => {

    return (
        <>
            <Navbar />
            <div className="container-fluid">
                <div className="container">
                    <div className="process-wrapper">
                        <div id="progress-bar-container">
                            <ul>
                                <li className="step step01 active">
                                    <div className="step-inner">ESC. FÁBRICA</div>
                                </li>
                                <li className="step step02">
                                    <div className="step-inner">ACTO</div>
                                </li>
                                <li className="step step03">
                                    <div className="step-inner">ESC. MUNICIPAL</div>
                                </li>
                                <li className="step step04">
                                    <div className="step-inner">ESC. TÉCNICA</div>
                                </li>
                                <li className="step step05">
                                    <div className="step-inner">LEMA</div>
                                </li>
                            </ul>

                            <div id="line">
                                <div id="line-progress"></div>
                            </div>
                        </div>

                        <div id="progress-content-section">
                            <div className="section-content factory active">
                                <h2>Escuela Fábrica</h2>
                                <p>
                                    En agosto de 1950 se inaugura como Escuela Fábrica 131 "Géneral José De San Martín".
                                </p>
                            </div>
                            <div className="section-content act">
                                <h2>Acto Inaugural</h2>
                                <p>
                                    22 de agosto de 1950 se realizó el acto inaugural, con la presencia del entonces Presidente de la Nación,
                                    General Juan Domingo Perón.
                                </p>
                            </div>
                            <div className="section-content municipal">
                                <h2>Escuela Municipal</h2>
                                <p>
                                    En 1992 la escuela pasó a la Administración del ámbito de la Municipalidad de la Ciudad de Buenos Aires
                                    cambiando su denominación a Escuela Municipal de Enseñanza Técnica 2 "General José de San Martín".
                                </p>
                            </div>
                            <div className="section-content technique">
                                <h2>Escuela Técnica</h2>
                                <p>
                                    En 1994 pasó a ser Escuela Técnica 32 Distrito Escolar 14 "General José de San Martín" hasta la actualidad.
                                </p>
                            </div>
                            <div className="section-content motto">
                                <h2>Lema de la ET32</h2>
                                <p>
                                    Somos el azul de nuestros guardapolvos de Técnica; somos el equipo: indestructibles engranajes metálicos
                                    unidos en eterno movimiento; somos vivos rayos, energía que dan potencia y dinamismo a magna labor, somos el
                                    volante que rodea y direcciona al objetivo; somos la placa impresa, base que sostiene y que transmite plenas
                                    conexiones para que todo funcione ¡somos escuela pública y técnica allí donde reside la patria misma... somos
                                    la 32!
                                </p>
                            </div>
                        </div>
                    </div>
                    <div className="cont-card">
                        <Card
                            especialidad='Automotores'
                            description='
                            Es una espcialidad que se focaliza en el estudio y analisis de todo lo referente a los vehiculos automotores, desde la mecánica hasta la dinámica de los mismos
                        '
                        />

                        <Card
                            especialidad='Computacion'
                            description='
                            Es la tecnologia desarrollada para el tratamiento automático de la informacion mediante el uso de computadoras
                        '
                        />

                        <Card
                            especialidad='Mecanica'
                            description='
                            Es la ciencia que estudia el movimiento de los cuerpos bajo la accion de las fuerzas participantes.
                        '
                        />
                    </div>

                </div>
                <div className="slider">
                    <div className="wrapper">
                        <FontAwesomeIcon className='arrow' id='left' icon={faChevronLeft} />
                        <div id="carousel" className="carousel">
                            <img src={require("../assets/img/aaa.jpg")} alt="img" draggable="false" />
                            <img src={require("../assets/img/entrada.jpg")} alt="img" draggable="false" />
                            <img src={require("../assets/img/escuela.jpg")} alt="img" draggable="false" />
                            <img src={require("../assets/img/frente.jpg")} alt="img" draggable="false" />
                            <img src={require("../assets/img/imagenE.jpg")} alt="img" draggable="false" />
                        </div>

                        <FontAwesomeIcon className='arrow' id='right' icon={faChevronRight} />
                    </div>
                </div>
            </div>
            <Footer/>
        </>
    )
}
