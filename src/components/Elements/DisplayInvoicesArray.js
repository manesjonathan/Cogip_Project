import DisplayArray from "./DisplayArray.js";
import Rect19yellow from '../../Images/rectangle-19.avif'

//Ce composant permet de gÃ©rer l'affichage des 3 tableaux : "last invoices", "last contacts", "last companies"
export default function DisplayInvoicesArrays (){
    const invoicesTitles = ["Invoice number", "Dates due", "Company","Created at"];
    const invoicesKeys = ["id","ref","id_company","created_at"];
    const invoicesUrl = "https://cogip.jonathan-manes.be/get-invoices";
    const companyUrlId = "https://cogip.jonathan-manes.be/get-company/";


    return  <div className="tab">
                <section className="tab01">
                    <h2 className="tab-title">All invoices</h2>
                    <img className ="img-yellow19" src={Rect19yellow} alt="img-rectyellow" ></img>
                    {/* <input className="input input-invoices" placeholder="Search company"></input> */}
                    <DisplayArray url={invoicesUrl} companyUrl={companyUrlId} titles={invoicesTitles} keysColumn={invoicesKeys} type="invoices"/>
                </section>
            </div>;
}
