import DisplayArray from "./DisplayArray.js";
import Rect19yellow from '../../Images/rectangle-19.avif'
import SearchBar from "./SearchBar.js";

export default function DisplayAContactsArrays (){

    const contactsTitles = ["Name", "Phone", "Mail","Company","Created at"];
    const contactsKeys = ["name","phone","email","company_id","created_at"];
    const contactsUrl = "https://cogip.jonathan-manes.be/get-contacts";
    const companyUrlId = "https://cogip.jonathan-manes.be/get-company/";

    return  <div className="tab">
                <section className="tab02">
                    <h2 className="tab-title">All contacts</h2>
                    <img className ="img-yellow19" src={Rect19yellow} alt="img-rectyellow" ></img>
                    <SearchBar/>
                    <DisplayArray url={contactsUrl} companyUrl={companyUrlId} titles={contactsTitles} keysColumn={contactsKeys} type="contacts"/>
                </section>

            </div>;
}