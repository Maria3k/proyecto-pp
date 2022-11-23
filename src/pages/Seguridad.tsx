import { Acordian } from '../components/Acordian'
import { Navbar } from '../components/Navbar'
import { User } from '../interfaces/User.interface'
import '../assets/css/Seguridad.css'
import '../assets/css/Fondo.css'
import { useLocation } from 'wouter';
import { useEffect } from 'react';

export const Seguridad = () => {

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
      <Acordian active='Seguridad' />
      <div className="fondo">
        <div id="Caja">
          <div className="act text-center"> <p>Actividad</p> </div>
          <div className="dato UltSesion"> <p>Ultimo Inicio de Sesión:</p>{user.sesion.hora}</div>
          <div className="dato navegador"><p>Desde el navegador:</p>{user.sesion.navegador}</div>
          <div className="dato UltConex"><p>Ultima Conexion:</p>{user.sesion.hora}</div>
        </div>

        <form action="seguridadcopy.php" method="post" className="CajaContra">
          <div className="tituloContra">
            <label>Administrador de Contraseña</label>
          </div>
          <div className="Password">
            <label>Contraseña actual:</label>
            <input type="password" name="actualPass" title='Vieja Contraseña' required />
          </div>
          <div className="Password">
            <label>Nueva contraseña:</label>
            <input type="password" name="newPass" title='Nueva Contraseña' required />
          </div>
          <div className="Password">
            <label>Confirmar contraseña:</label>
            <input id="ccon" type="password" name="vNewPass" title='Confirmar Nueva Contraseña' required />
          </div>
          <input type="submit" className="botoncito" value="enviar" />
        </form>
      </div>
    </div >
  )
}
