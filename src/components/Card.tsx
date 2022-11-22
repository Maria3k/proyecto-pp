import { Link } from 'wouter';
import '../assets/css/Card.css'

interface Card {
    especialidad: 'Automotores' | 'Computacion' | 'Mecanica',
    description: String
}

export const Card = ({ especialidad, description }: Card) => {

    return (
        <Link to={`/${especialidad.toLowerCase()}`} className='card'>
            <div className="face front">
                <img src={require(`../assets/img/${especialidad.toLowerCase()}.png`)} alt={`${especialidad.toLowerCase()}.png`} />
                <h3>{especialidad}</h3>
            </div>
            <div className="face back">
                <h3>{especialidad}</h3>
                <p>{description}</p>
                <div className="link">¿Deseas preguntar algo?</div>
            </div>
        </Link>
    )
}
