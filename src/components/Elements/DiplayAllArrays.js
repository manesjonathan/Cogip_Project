import DisplayArray from "./DisplayArray.js";
import illuproject from '../../Images/illustration-project.avif';
import bulb from '../../Images/bulb.avif';

//Ce composant permet de gÃ©rer l'affichage des 3 tableaux : "last invoices", "last contacts", "last companies"
export default function DisplayAllArrays (){
    const invoicesTitles = ["Invoice number", "Dates due", "Company","Created at"];
    const invoicesKeys = ["id","ref","id_company","created_at"];
    const invoicesUrl = "https://cogip.jonathan-manes.be/get-latest-invoices";

    const contactsTitles = ["Name", "Phone", "Mail","Company","Created at"];
    const contactsKeys = ["name","phone","email","company_id","created_at"];
    const contactsUrl = "https://cogip.jonathan-manes.be/get-latest-contacts";

    const companiesTitles = ["Name", "TVA", "Country","Type","Created at"];
    const companiesKeys = ["name","tva","country","type_id","created_at"];
    const companiesUrl = "https://cogip.jonathan-manes.be/get-latest-companies";
    
    const companyUrlId = "https://cogip.jonathan-manes.be/get-company/";


    return  <div className="tab">
                <section className="tab01">
                    <h2 className="tab-title title01">Last invoices</h2>
                    <DisplayArray url={invoicesUrl} companyUrl={companyUrlId} titles={invoicesTitles} keysColumn={invoicesKeys} type="invoices"/>
                    <img className="tab01-img" src={illuproject} alt="image d'illu" />
                </section>

                <section className="tab02">
                    <h2 className="tab-title title02">Last contacts</h2>
                    <DisplayArray url={contactsUrl} companyUrl={companyUrlId} titles={contactsTitles} keysColumn={contactsKeys} type="contacts"/>
                    <img className="tab02-img" src={bulb} alt="bulb-image" />
                </section>

                <section className="tab03">
                    <h2 className="tab-title title03">Last companies</h2>
                    <DisplayArray url={companiesUrl} companyUrl={companyUrlId} titles={companiesTitles} keysColumn={companiesKeys} type="companies"/>
                </section>
            </div>;
}