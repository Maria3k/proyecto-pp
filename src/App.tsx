import './App.css'
import $ from 'jquery'
import { Route } from 'wouter'
import { Home } from './pages/Home'
import { Form } from './pages/Form'
import { Perfil } from './pages/Perfil'
import { Seguridad } from './pages/Seguridad'
import { InfoGeneral } from './pages/InfoGeneral'
import { InfoPersonal } from './pages/InfoPersonal';
import { Especialidad } from './pages/Especialidad'

export const App = () => {
  return (
    <>

      <Route
        component={Home}
        path='/'
      />

      <Route
        component={Form}
        path='/form'
      />

      <Route
        path='/computacion'
        component={() => <Especialidad especialidad={1} />}
      />

      <Route
        path='/mecanica'
        component={() => <Especialidad especialidad={2} />}
      />

      <Route
        path='/automotores'
        component={() => <Especialidad especialidad={3} />}
      />

      <Route
        path='/perfil'
        component={Perfil}
      />

      <Route
        path='/perfil/infoGeneral'
        component={InfoGeneral}
      />

      <Route
        path='/perfil/infoPersonal'
        component={InfoPersonal}
      />

      <Route
        path='/perfil/seguridad'
        component={Seguridad}
      />

    </>
  )
}
