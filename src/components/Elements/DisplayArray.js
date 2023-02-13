import { useEffect, useState } from "react";
import GetCompanyName from "./GetCompanyName.js";


// Ce composant permet d'afficher les données d'un tableau à partir de son url et 
// de deux tableaux : l'un reprenant les titres des colonnes, et l'autre reprenant
// les clés des différentes colonnes dans les données json.
export default function DisplayArray ({url,companyUrl,titles,keysColumn,type}){
    
    //State
    const [dataBack, setDataBack] = useState([]);
    
    //Comportements
    useEffect(() => {
        fetch(url)
        .then((res) => res.json())
        .then((data) => {
            setDataBack(data[type]);
        })
    },[]);    
        
    //Affichage (render)
    return  <div>                
                <table>
                    <thead>
                        <tr key={`${type}-titles`} >
                            {titles.map((title) => (
                                <th key={`${type}-${title}`} >{title}</th>    
                            ))}
                        </tr>
                    </thead>
                    <tbody>
                        {dataBack.map((dataB) => (
                        <tr key={`${type}-${dataB.id}`}>
                            {keysColumn.map((keyColumn) => 
                            {
                                return ((keyColumn=='id_company') || (keyColumn=='company_id'))?
                                (<td key={`${type}-${dataB.id}-${keyColumn}`}>
                                    <GetCompanyName companyUrl={companyUrl} id={dataB[keyColumn]}/>
                                </td>) :
                                (<td key={`${type}-${dataB.id}-${keyColumn}`}>{dataB[keyColumn]}</td>);
                                }
                            )}
                        </tr>
                        ))}
                    </tbody>
                </table>               
            </div>;      
}