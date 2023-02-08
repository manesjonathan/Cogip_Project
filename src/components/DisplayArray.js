import { useEffect, useState } from "react";

export default function DisplayArray ({url,titles,keys}){
    //State
    const [companies, setCompanies] = useState([]);

    //Comportements
    useEffect(() => {
        fetch(url)
        .then((res) => res.json())
        .then((data) => {
            setCompanies(data.companies);
            console.log(companies);
        })
    },[]);
        
    //Affichage (render)
    return  <div>                
                <table>
                    <thead>
                    <tr>
                        {titles.map((title) => (
                            <th>{title}</th>    
                        ))}
                    </tr>
                    </thead>
                    <tbody>
                    {companies.map((companie) => (
                        <tr>
                            <td>{companie[keys[0]]}</td>
                        </tr>
                    ))}
                    </tbody>
                </table>
               
            </div>;      

}