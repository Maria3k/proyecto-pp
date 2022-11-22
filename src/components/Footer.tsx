import { faFacebookF, faGithub, faYoutube, faInstagram } from "@fortawesome/free-brands-svg-icons";
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import '../assets/css/Footer.css'

export const Footer = () => {
    return (
        <footer className="foot">
            <div className="grupo-1">
                <div className="box">
                    <figure>
                        <a href="#">
                            <img src={require('../assets/img/logoblanco.png')} alt="logoblanco.png" />
                        </a>
                    </figure>
                </div>
                <div className="box">
                    <h5>Autores:</h5>
                    <ul>
                        <li>Maria Morales - 6°1 Computacion</li>
                        <li>Nicolas Domeq - 6°1 Computacion</li>
                        <li>Ignacio Rios Lahore - 6°1 Computacion</li>
                        <li>Thristall Guerra - 6°1 Computación</li>
                        <li>Ivan Britez - 6°1 Computación</li>
                    </ul>
                </div>
                <div className="box position-relative">
                    <h5>Redes Sociales</h5>
                    <div className="connect">
                        <a href="https://www.facebook.com/groups/tecnica32/" rel="noopener noreferrer" className="facebook"
                            target="_blank" title="Facebook">
                            <FontAwesomeIcon icon={faFacebookF} />
                        </a>
                        <a href="https://github.com/Maria3k/Proyecto-PP" rel="noopener noreferrer" className="github" target="_blank"
                            title="Github">
                            <FontAwesomeIcon icon={faGithub} />
                        </a>

                        <a href="https://www.youtube.com/channel/UCywUijMchnujSg6dVVUKprQ/videos?view_as=subscriber"
                            rel="noopener noreferrer" className="youtube" target="_blank" title="Youtube">
                            <FontAwesomeIcon icon={faYoutube} />
                        </a>

                        <a href="https://www.instagram.com/la_gloriosa_32_escuela_tecnica/?hl=es-la" rel="noopener noreferrer"
                            className="instagram" target="_blank" title="Instagram">
                            <FontAwesomeIcon icon={faInstagram} />
                        </a>
                    </div>
                </div>
            </div>

            <div className="grupo-2">
                <small>&copy; 2022 <b>ET32 RESPUESTAS</b> - Todos los derechos reservados.</small>
            </div>
        </footer>
    )
}
