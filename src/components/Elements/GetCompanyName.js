import { useEffect, useState } from "react";

//Ce composant permet d'afficher le nom de la compagnie Ã  la place
//de l'id dans les "last invoices" et dans les "last contacts"
export default function GetCompanyName ({companyUrl,id}) {

    //State 
    const [companyName, setCompanyName] = useState({});

    //comportements
    useEffect(() => {
        fetch(`${companyUrl}${id}`)
        .then((res) => res.json())
        .then((data) => {
            setCompanyName(data.company);
        })
    },[]);

    //Affichage
    return  <div>
                {companyName.name}
            </div>;
}