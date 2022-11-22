import { faCircleExclamation } from "@fortawesome/free-solid-svg-icons";
import { FontAwesomeIcon } from "@fortawesome/react-fontawesome";

interface ErrorProps {
    msg: string
}

export const ErrorLogin = ({ msg }: ErrorProps) => {
    return (
        <div className="error">
            <FontAwesomeIcon icon={faCircleExclamation} className="mx-2"/>
            {msg}
        </div>
    )
}
