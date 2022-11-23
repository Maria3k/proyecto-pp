import { Acordian } from "../components/Acordian"
import { Navbar } from "../components/Navbar"
import { User } from "../interfaces/User.interface"
import '../assets/css/InfoGeneral.css'
import { useEffect } from 'react';
import { useLocation } from 'wouter';

export const InfoGeneral = () => {

  const [location, setLocation] = useLocation();


  useEffect(() => {
    if(localStorage.length == 0){
      setLocation('/')
    }
  }, [])
  

  const user = JSON.parse(localStorage.getItem('user') || '') as User


  return (
    <div className="fondo-perfil">
      <Navbar transparent light />
      <Acordian active='InfoGeneral' />
      <div className="info-general">
        <div id="divPadre">
          <div id="divHijo">
            <p>¿Qué ofrece nuestra web?</p>
          </div>
          <div className="infop">
            <p>
              E.T32 Respuestas está optimizada para la resolución
              de incertidumbres de los estudiantes con respecto a sus especialidad;
              donde los directivos, profesores y/o estudiantes que poseen el conocimiento
              para responder la interrogante, a fin de que la duda sea resuelta.
            </p>
          </div>
        </div>


        <div id="divPadre2">
          <div id="divHijo2">
            <p>Directivos</p>
          </div>
          <div className="dirvos">
            <div className="directivo1">
              <img className="imgi" src={require('../assets/img/iconosUsu/logo2.png')} alt="logo2.png" />
              <div className="infop">
                <p className="letraa">Hola soy tino</p>
                <p>Director de la institucion</p>
              </div>

            </div>
            <div className="directivo1">
              <img className="imgi" src={require('../assets/img/iconosUsu/logo3.png')} alt="logo3.png" />
              <div className="infop">
                <p className="letraa"> Hola soy tino</p>
                <p>Director de la institucion</p>
              </div>
            </div>
            <div className="directivo1">
              <img className="imgi" src={require('../assets/img/iconosUsu/logo4.png')} alt="logo4.png" />
              <div className="infop">
                <p className="letraa">Hola soy tino</p>
                <p>Director de la institucion</p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div >
  )
}
