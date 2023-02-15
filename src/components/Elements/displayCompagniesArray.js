import DisplayArray from "./DisplayArray.js";
import SearchBar from "./SearchBar.js";

export default function DisplayComapgniesArrays (){

    const companiesTitles = ["Name", "TVA", "Country","Type","Created at"];
    const companiesKeys = ["name","tva","country","type_id","created_at"];
    const companiesUrl = "https://cogip.jonathan-manes.be/get-companies";
    const companyUrlId = "https://cogip.jonathan-manes.be/get-company/";

    return  <div className="tab">
                <section className="tab03">
                    <h2 className="tab-title">All companies</h2>
                    <SearchBar/>
                    <DisplayArray url={companiesUrl} companyUrl={companyUrlId} titles={companiesTitles} keysColumn={companiesKeys} type="companies"/>
                </section>
            </div>;
}