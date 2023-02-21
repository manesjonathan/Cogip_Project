import DisplayArray from "./DisplayArray.js";
import SearchBar from '../Elements/SearchBar.js';
import Rect19yellow from '../../Images/rectangle-19.avif';

export default function DisplayComapgniesArrays (){

    const companiesTitles = ["Name", "TVA", "Country","Type","Created at"];
    const companiesKeys = ["name","tva","country","type_id","created_at"];
    const companiesUrl = "https://cogip.jonathan-manes.be/get-companies";
    const companyUrlId = "https://cogip.jonathan-manes.be/get-company/";

    

    return  <div className="tab">
                <section className="tab03">
                    <h2 className="tab-title">All companies</h2>
                    <img className ="img-yellow19" src={Rect19yellow} alt="img-rectyellow" ></img>
                    <SearchBar/>
                    <DisplayArray url={companiesUrl} companyUrl={companyUrlId} titles={companiesTitles} keysColumn={companiesKeys} type="companies"/>
                </section>
            </div>;
}