import { useEffect, useState } from "react";

export default function DisplayArray (){
    //State
    const [companies, setCompanies] = useState([]);

    //Comportements
    useEffect(() => {
        fetch("https://catfact.ninja/facts")
        .then((res) => res.json())
        .then((data) => {
            setCompanies(data.data);
        })
    },[]);
   
    //Affichage (render)
    return  <div>
                {companies.map((companie) => (
                    <table>
                        <thead>
                        <tr>
                            <th>Name</th>
                            <th>TVA</th>
                        </tr>
                        </thead>
                        <tbody>
                        <tr>
                            <td>{companie.fact}</td>
                            <td>{companie.length}</td>
                        </tr>
                        {/* <tr>
                            <td>{companie.name}</td>
                            <td>{companie.tva}</td>
                        </tr> */}
                        </tbody>
                    </table>
                ))}
            </div>;      

}