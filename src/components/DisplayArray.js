import { useEffect, useState } from "react";

export default function DisplayArray ({url}){
    //State
    const [companies, setCompanies] = useState([]);

    //Comportements
    useEffect(() => {
        fetch(url)
        .then((res) => res.json())
        .then((data) => {
            setCompanies(data.data);
        })
    },[]);
   
    //Affichage (render)
    return  <div>                
                <table>
                    <thead>
                    <tr>
                        <th>Name</th>
                        <th>TVA</th>
                    </tr>
                    </thead>
                    <tbody>
                    {companies.map((companie) => (
                        <tr>
                            <td>{companie.fact}</td>
                            <td>{companie.length}</td>
                        </tr>
                    ))}
                    </tbody>
                </table>
               
            </div>;      

}