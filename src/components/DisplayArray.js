import { useEffect, useState } from "react";

export default function DisplayArray ({url,titles,keys,type}){
    //State
    const [companies, setCompanies] = useState([]);

    //Comportements
    useEffect(() => {
        fetch(url)
        .then((res) => res.json())
        .then((data) => {
            setCompanies(data[type]);
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
                        {companies.map((company) => (
                        <tr>
                            {keys.map((key) => 
                            <td>{company[key]}</td>
                            )}
                        </tr>
                        ))}
                    </tbody>
                </table>               
            </div>;      
}