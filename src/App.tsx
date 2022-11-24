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


      {/*-------------------------------------------------------------------------------------------------------------
        
        MALDITO ROUTE QUE ME ROMPE LA PAGINA >:(
  
          Opcion N° 1: Puede ser que no lo esté usando bien ya que no esta muy bien documentado como usar wouter con typescript
          Opcion N° 2: Algun componente me esta cagando
          Opcion N° 3: Algo me quiere cagar el trabajo y no hacerlo en React XD  
  
        */


      }

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

      {/*-------------------------------------------------------------------------------------------------------------*/}

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