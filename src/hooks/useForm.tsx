import { useState, useEffect } from 'react';
import $ from 'jquery'

interface Avatar {
    id_avatar: number;
    nombreArchivo: string;
    rutaArchivo: string;
}

export const useForm = () => {

    const [avatares, setAvatares] = useState(<></>)
    const [avatarSeleccionado, setAvatarSeleccionado] = useState(require('../assets/img/iconosUsu/logo1.png'))

    const daySelect =
        <select className="form-select" name="d" title="Fecha de nacimiento" id="dia" required>
            <option defaultValue=''>Dia</option>
            {
                [...Array(28)].map((e, i) => <option key={`day${i}`} value={i + 1}>{i + 1}</option>)
            }
        </select>

    const mouthSelect =
        <select className="form-select" name="m" title="Fecha de nacimiento" id="mes" required>
            <option defaultValue='' >Mes</option>
            {
                Array(
                    "Enero",
                    "Febrero",
                    "Marzo",
                    "Abril",
                    "Mayo",
                    "Junio",
                    "Julio",
                    "Agosto",
                    "Septiembre",
                    "Octubre",
                    "Noviembre",
                    "Diciembre"
                ).map((e, i) => <option key={`mouth${i}`} value={i} title=''>{e}</option>)
            }
        </select>

    const yearsSelect =
        <select className="form-select" name="a" title="Fecha de nacimiento" id="año" required>
            <option defaultValue=''>Año</option>
            {

                Array.from(new Array(40), (val, index) => (new Date()).getFullYear() - index).slice(0).reverse().map((year, index) => {
                    return <option key={`year${index}`} value={year}>{year}</option>
                })

            }
        </select>

    useEffect(() => {
        fetch("http://localhost/proyecto-pp/src/apis/avatar.php", {
            method: 'GET'
        })
            .then(r => r.json())
            .then(
                (response) => setAvatares(

                    response.map((avatar: Avatar, i: number) => (
                        <img
                            key={i}
                            id={avatar.id_avatar.toString()}
                            className="avatar"
                            src={require(`../${avatar.rutaArchivo}`)}
                            alt={avatar.rutaArchivo}
                            onClick={() => {
                                select(avatar.id_avatar, require(`../${avatar.rutaArchivo}`))
                            }}
                            data-bs-toggle="collapse"
                            role="button"
                            aria-expanded="false"
                            aria-controls="imagenes"
                        />

                    ))
                )
            )
        $('.avatar').attr('href', '#imagenes')
    }, [])


    const register = () => {

        $('#login').attr('style', 'right:405px')
        $('#register').attr('style', 'right:-30px')
        $('#btn').attr('style', 'left:190px; background: linear-gradient(to left, rgba(40,83,161,1) 35%, rgba(87,147,255,1) 100%)')
        $('#login-btn').attr('style', 'color:gray')
        $('#register-btn').attr('style', 'color:white')

        //document.getElementById("imagenes").removeAttribute("style");
        //document.getElementById("imagenes").className = "collapsed collapse";
    }

    const login = () => {
        $('#login').attr('style', 'right:0px')
        $('#register').attr('style', 'right:-500px')
        $('#btn').removeAttr('style')
        $('#login-btn').attr('style', 'color:white')
        $('#register-btn').attr('style', 'color:gray')
    }

    const select = (n: number, path: NodeRequire) => {
        setAvatarSeleccionado(path);
        (document.getElementById('imgInput') as HTMLInputElement).value = n.toString()
    }

    return {
        avatares,
        avatarSeleccionado,
        login,
        register,
        daySelect,
        mouthSelect,
        yearsSelect
    }
}
