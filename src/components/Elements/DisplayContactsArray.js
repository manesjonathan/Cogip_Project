import DisplayArray from "./DisplayArray.js";

export default function DisplayAContactsArrays (){

    const contactsTitles = ["Name", "Phone", "Mail","Company","Created at"];
    const contactsKeys = ["name","phone","email","company_id","created_at"];
    const contactsUrl = "https://cogip.jonathan-manes.be/get-contacts";
    const companyUrlId = "https://cogip.jonathan-manes.be/get-company/";

    return  <div className="tab">
                <section className="tab02">
                    <h2 className="tab-title">All contacts</h2>
                    <input className="input" placeholder="Search contacts"></input>
                    <DisplayArray url={contactsUrl} companyUrl={companyUrlId} titles={contactsTitles} keysColumn={contactsKeys} type="contacts"/>
                </section>

            </div>;
}