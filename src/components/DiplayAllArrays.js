import DisplayArray from "./DisplayArray.js";


export default function DisplayAllArrays (){

    const companiesTitles = ["Name", "TVA", "Country","Type","Created at"];
    const companiesKeys = ["name","tva","country","type_id","created_at"];
    const companiesUrl = "https://becode-cogip-2023.000webhostapp.com/get-data"

    return  <div>
                <DisplayArray url={companiesUrl} titles={companiesTitles} keys={companiesKeys}/>
            </div>;
}