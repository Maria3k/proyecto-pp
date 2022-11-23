import { faAddressBook, faTachometer, faLock, faClone } from '@fortawesome/free-solid-svg-icons';
import { FontAwesomeIcon } from '@fortawesome/react-fontawesome'
import '../assets/css/Acordian.css'
import { Link } from 'wouter';
import { useEffect } from 'react';

interface AcordianProps {
    active: 'Inicio' |
    'InfoPersonal' |
    'Seguridad' |
    'InfoGeneral'
}

export const Acordian = ({ active }: AcordianProps) => {

    useEffect(() => (document.getElementById(active) as HTMLElement).classList.add('activeO'), [active])


    return (
        <div id="accordian">
            <ul className="show-dropdown">
                <li id='Inicio'>
                    <Link to='/perfil' className="option">
                        <FontAwesomeIcon icon={faTachometer} />
                        <span className='mx-3'>Inicio</span>
                    </Link>
                </li>
                <li id='InfoPersonal'>
                    <Link to='/perfil/infoPersonal' className="option">
                        <FontAwesomeIcon icon={faAddressBook} />
                        <span className='mx-3'>Info Personal</span>
                    </Link>
                </li>
                <li id='Seguridad' >
                    <Link to='/perfil/seguridad' className="option">
                        <FontAwesomeIcon icon={faLock} />
                        <span className='mx-3'>Seguridad</span>
                    </Link>
                </li>
                <li id='InfoGeneral' >
                    <Link to='/perfil/infoGeneral' className="option">
                        <FontAwesomeIcon icon={faClone} className='' />
                        <span className='mx-3'>Info General</span>
                    </Link>
                </li>
            </ul>
        </div>
    )
}
