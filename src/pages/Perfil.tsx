import { Acordian } from '../components/Acordian'
import { Navbar } from '../components/Navbar'
import '../assets/css/Fondo.css'
import { User } from '../interfaces/User.interface';
import '../assets/css/Perfil.css'
import { useLocation } from 'wouter';
import { useEffect } from 'react';

export const Perfil = () => {

    const [location, setLocation] = useLocation();

    useEffect(() => {
        if (localStorage.length == 0) {
            setLocation('/')
        }
    }, [])

    const user = JSON.parse(localStorage.getItem('user') || '') as User

    return (
        <div className="fondo-perfil">
            <Navbar transparent light/>
            <Acordian active='Inicio' />
            <div className="carta-contenedor">
                <div className="header">
                    <div className="nombreUser text-center my-4">
                        <h2>
                            <label id="titulob">
                                ¡Bienvenido! <b>{user.nickname}</b>
                            </label>
                        </h2>
                    </div>
                    <div className="lorem">
                        Si el usuario dispone de alguna interrogacion o visualiza algun problema en la web dale al boton consulta
                        <br />
                        Contacto
                        <ul>
                            <li>
                                DOE - Email: ofdealumnos@gmail.com
                            </li>
                            <li>
                                Telefono: 4551-9121 4555-4026/4034
                            </li>
                            <li>
                                Direccion: Teodoro Garcia 3899 - C1427ECG CABA
                            </li>
                        </ul>
                    </div>
                </div>
                <div className="wave">
                    <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 1440 320"><path fill="#6eb8f5" fill-opacity="1" d="M0,128L34.3,144C68.6,160,137,192,206,181.3C274.3,171,343,117,411,128C480,139,549,213,617,208C685.7,203,754,117,823,106.7C891.4,96,960,160,1029,181.3C1097.1,203,1166,181,1234,154.7C1302.9,128,1371,96,1406,80L1440,64L1440,320L1405.7,320C1371.4,320,1303,320,1234,320C1165.7,320,1097,320,1029,320C960,320,891,320,823,320C754.3,320,686,320,617,320C548.6,320,480,320,411,320C342.9,320,274,320,206,320C137.1,320,69,320,34,320L0,320Z"></path></svg>
                </div>

                <div className="consulta">
                    <a href="#" className="botonConsulta px-2">
                        <p>
                            Realizar Consulta
                        </p>
                    </a>
                </div>
            </div>
        </div >
    )
}
