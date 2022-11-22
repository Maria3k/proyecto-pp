import { useState, useEffect } from 'react';
import { Link } from 'wouter'
import '../assets/css/Navbar.css'
import { Menu } from './Menu';

interface NavbarProps {
    transparent?: boolean,
    light?: boolean
}

export const Navbar = ({ transparent, light }: NavbarProps) => {
    const [user, setUser] = useState(
        <div className="btns">
            <Link className="btn-nav" to="/form">Iniciar Sesion</Link>
            <Link className="btn-nav" to='/form'>Registrarse</Link>
        </div>
    );

    useEffect(() => {


        if (localStorage.length == 1) {
            setUser(
                <Menu light={light}/>
            )
        } else {
            setUser(
                <div className="btns">
                    <Link className="btn-nav" to="/form">Iniciar Sesion</Link>
                    <Link className="btn-nav" to='/form'>Registrarse</Link>
                </div>
            )
        }

    }, [])


    return (
        <nav
            className={
                transparent ? 'transparent mx-5' : undefined
            }
        >
            <Link to='/'>
                <img className='img1 mx-5' src={require("../assets/img/loguito.png")} alt="loguito.png" />
            </Link>
            {user}
        </nav>
    )
}
