import { Navbar } from '../components/Navbar';
import { Acordian } from '../components/Acordian';
import { User } from '../interfaces/User.interface';
import '../assets/css/InfoPersonal.css'
import { useEffect } from 'react';
import { useLocation } from 'wouter';

export const InfoPersonal = () => {

  const [location, setLocation] = useLocation();


  useEffect(() => {
    if (localStorage.length == 0) {
      setLocation('/')
    }
  }, [])

  const user = JSON.parse(localStorage.getItem('user') || '') as User


  return (
    <div className="fondo-perfil">
      <Navbar transparent light />
      <Acordian active='InfoPersonal' />
      <div className="f">
        <div id="infoPersonal">

          <div className="ImagenUsuario">
            <img src={require(`../${user.rutaArchivo}`)} alt={user.nombreArchivo} />
            <p>{user.nickname}</p>
          </div>
          <div className="datos">
            <div className="name">
              <b className="nombreDato">Nombre: </b> {user.nombre}
            </div>

            <div className="surname">
              <b className="nombreDato">Apellido: </b> {user.apellido}
            </div>

            <div className="FDN">
              <b className="nombreDato">Fecha de Nacimiento: </b> {user.fechaNacimiento}
            </div>

          </div>
        </div>
        <div className="correo">
          <label className="info"> Información de Contacto </label>
          <div className="correoelectronico">
            <b className="nombreDato">Correo Electronico:</b> {user.email}
            </div>
        </div>
      </div>
    </div >
  )
}
