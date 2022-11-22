import { User } from '../interfaces/User.interface';
import "../assets/css/Menu.css"
import { useState } from 'react';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome';
import { faArrowRightFromBracket, faUser } from '@fortawesome/free-solid-svg-icons';
import { Link, useLocation } from 'wouter';

interface MenuProps {
    light?: boolean
}

export const Menu = ({ light }: MenuProps) => {

    const user = JSON.parse(localStorage.getItem('user') || "") as User
    const [location, setLocation] = useLocation();

    const [isActive, setIsActive] = useState(false)

    return (
        <div className="action" >
            <div className="profile" onClick={() => setIsActive(!isActive)}>
                <img src={require(`../${user.rutaArchivo}`)} width="30px" height="30px" alt={user.rutaArchivo} />
            </div>
            <div className={`menu${isActive ? " active" : ''}${light ? ' light' : ''}`}>
                <ul>
                    {
                        light
                            ?
                            ''
                            :
                            <li id="primero">
                                <Link to='/perfil'>
                                    <FontAwesomeIcon icon={faUser} className='mx-2' />
                                    Perfil
                                </Link>
                            </li>
                    }
                    <li className={ light ? 'border-none' : ''}>
                        <a
                            onClick={
                                () => {
                                    localStorage.clear()
                                    setLocation('/')
                                    window.location.reload()
                                }
                            }
                        >
                            <FontAwesomeIcon icon={faArrowRightFromBracket} className='mx-2' />
                            Cerrar Sesion
                        </a>
                    </li>
                </ul>
            </div>
        </div>
    )
}
