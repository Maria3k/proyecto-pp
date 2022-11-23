import { Link, useLocation } from "wouter";
import '../assets/css/Form.css'
import { useForm } from '../hooks/useForm';
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";
import { faPencil, faEnvelope, faLock } from "@fortawesome/free-solid-svg-icons"
import { Option } from '../interfaces/OptionsForm.inteface';
import { ErrorLogin } from '../components/ErrorLogin';
import { useState } from 'react';

export const Form = () => {

  const { avatares, avatarSeleccionado, login, register, mouthSelect, yearsSelect, daySelect } = useForm()
  const [errorLogin, setErrorLogin] = useState<JSX.Element>()
  const [loading, setLoading] = useState<JSX.Element>()
  const [loadingRegister, setLoadingRegister] = useState<JSX.Element>()
  const [location, setLocation] = useLocation();

  return (
    <div className="fondo-login">
      <div className="container cuerpo">
        <div className="myCard">
          <div className="row">
            <div className="col-md-6">
              <div className="myLeftCtn">
                <div className="form-group">
                  <div className="form-box">
                    <div className="button-box">
                      <div id="btn"></div>
                      <button id="login-btn" type="button" className="toggle-btn" onClick={() => login()}>Iniciar sesion</button>
                      <button id="register-btn" type="button" className="toggle-btn" onClick={() => register()}>Registrar</button>
                    </div>
                  </div>
                </div>
                <form
                  id="login"
                  className="myForm text-center"
                  onSubmit={
                    e => {
                      e.preventDefault();

                      setLoading(
                        <div className="loading">
                          <div className="spinner-border text-primary" role="status">
                            <span className="visually-hidden">Loading...</span>
                          </div>
                        </div>
                      )

                      const form = new FormData();

                      form.append("email", (document.getElementById('emailogin') as HTMLInputElement).value);
                      form.append("contraseña", (document.getElementById('contralogin') as HTMLInputElement).value);

                      const options: Option = {
                        method: 'POST',
                      };

                      options.body = form;

                      fetch('http://localhost:800/proyecto-pp/src/apis/login.php', options)
                        .then(response => response.json())
                        .then((response) => {

                          if (response.error) {
                            setLoading(<></>)
                            setErrorLogin(<ErrorLogin msg={response.error} />)
                          } else {
                            localStorage.setItem('user', JSON.stringify(response));
                            setLocation("/")
                          }

                        })
                        .catch(err => console.error(err));
                    }
                  }
                >
                  <div className="main">
                    <>
                      <FontAwesomeIcon className="icono" icon={faEnvelope} color={"#2853a1"} />

                      <label htmlFor="Correo Electronico">Correo Electronico</label>
                      <input className="input-field" id="emailogin" type="email" name="email" pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" placeholder="Correo" required />

                    </>
                    <>
                      <FontAwesomeIcon className="icono" icon={faLock} color={"#2853a1"} />
                      
                      <label htmlFor="Contraseña">Contraseña</label>

                      <input className="input-field" id="contralogin" type="password" name="contraseña" pattern="[A-Za-z-0-9]{2,16}" placeholder="Contraseña" required />

                    </>
                  </div>

                  {loading}
                  {errorLogin}
                  <input type="submit" className="butt my-3" value="Iniciar sesion" />
                </form>

                <form
                  id="register"
                  className="input-group"
                  onSubmit={
                    e => {
                      e.preventDefault();

                      setLoadingRegister(
                        <div className="loading">
                          <div className="spinner-border text-primary" role="status">
                            <span className="visually-hidden">Loading...</span>
                          </div>
                        </div>
                      )

                      const form = new FormData();
                      form.append("nombre", (document.getElementById('nombre') as HTMLInputElement).value);
                      form.append("apellido", (document.getElementById('apellido') as HTMLInputElement).value);
                      form.append("nickname", (document.getElementById('nickname') as HTMLInputElement).value);
                      form.append("email", (document.getElementById('email') as HTMLInputElement).value);
                      form.append("d", (document.getElementById('dia') as HTMLInputElement).value);
                      form.append("m", (document.getElementById('mes') as HTMLInputElement).value);
                      form.append("a", (document.getElementById('año') as HTMLInputElement).value);
                      form.append("contraseña", (document.getElementById('contraseña') as HTMLInputElement).value);
                      form.append("contraconfi", (document.getElementById('contraconfi') as HTMLInputElement).value);
                      form.append("imgInput", (document.getElementById('imgInput') as HTMLInputElement).value);

                      const options: Option = {
                        method: 'POST',
                      };

                      options.body = form;

                      fetch('http://localhost:800/proyecto-pp/src/apis/register.php', options)
                        .then(response => response.json())
                        .then(response => {
                          if (response.error) {
                            setLoading(<></>)
                            setErrorLogin(<ErrorLogin msg={response.error} />)
                          } else {
                            localStorage.setItem('user', JSON.stringify(response));
                            setLocation("/")
                          }
                        })
                        .catch(err => console.error(err));

                    }
                  }
                >
                  <div className="container">
                    <div className="row">
                      <div id="colImg" className="col text-center">
                        <input id="imgInput" name="imgInput" type="hidden" value="1" />
                        <img id="imgSeleccionada" className="img-fluid" src={avatarSeleccionado} width="75px" height="75px" alt="imagen.png" />
                        <a id="lapiz" data-bs-toggle="collapse" href="#imagenes" role="button" aria-expanded="false" aria-controls="imagenes" title="seleccionar imagen">
                          <FontAwesomeIcon icon={faPencil} />
                        </a>
                      </div>
                      <div className="collapse text-center" id="imagenes">
                        <div className="col py-2" id="lista">
                          {avatares}
                        </div>
                      </div>
                    </div>
                    <div className="row">
                      <div className="row justify-content-center">
                        <div className="input-group text-center">
                          <input className="input-field text-center col-5 mx-auto" id="nombre" type="text" name="nombre" pattern="[A-Za-z-0-9]{3,16}" placeholder="Nombre" />
                          <input className="input-field text-center col-5 mx-auto" id="apellido" type="text" name="apellido" pattern="[A-Za-z-0-9]{3,16}" placeholder="Apellido" />
                        </div>
                        <input className="input-field" id="nickname" type="text" name="nickname" pattern="[A-Za-z-0-9]{3,16}" placeholder="Nombre de usuario" required />
                        <div id="errorUsuario"></div>
                        <input className="input-field" id="email" type="email" name="email" pattern="[a-zA-Z0-9!#$%&'*_+-]([\.]?[a-zA-Z0-9!#$%&'*_+-])+@[a-zA-Z0-9]([^@&%$\/()=?¿!.,:;]|\d)+[a-zA-Z0-9][\.][a-zA-Z]{2,4}([\.][a-zA-Z]{2})?" placeholder="Correo" required />
                        <div id="errorEmail"></div>
                        <input className="input-field" id="contraseña" type="password" name="contraseña" pattern="[A-Za-z-0-9]{8,16}" placeholder="Contraseña" required />
                        <div className="chikitiko">* La contraseña debe ser mayor a 8 caracteres</div>
                        <input className="input-field" id="contraconfi" type="password" name="contraconfi" pattern="[A-Za-z-0-9]{8,16}" placeholder="Confirme su contraseña" required />
                        <div id="passwordError"></div>
                      </div>
                    </div>

                    <div className="description">
                      <div className="date">
                        <div className="input-content one">
                          {daySelect}
                        </div>
                        <div className="input-content two">
                          {mouthSelect}
                        </div>
                        <div className="input-content theree">
                          {yearsSelect}
                        </div>
                      </div>
                      {loadingRegister}
                      <input className="submit-btn butt" type="submit" value="Registrarse" />
                    </div>
                  </div>
                </form>
              </div>
            </div>
            <div className="col-md-6">
              <div className="myRightCtn">
                <div className="box">
                  <Link to="/">
                    <img id="img" className="img-fluid home-btn" src={require('../assets/img/logoblanco.png')} alt="imagen.png" width="400px" height="400px" />
                  </Link>
                </div>
              </div>
            </div>
          </div>
        </div >
      </div >
    </div>

  )
}
