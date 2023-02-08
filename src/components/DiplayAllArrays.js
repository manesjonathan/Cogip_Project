import DisplayArray from "./DisplayArray.js";


export default function DisplayAllArrays (){
    // const invoicesTitles = ["Name", "TVA", "Country","Type","Created at"];
    // const invoicesKeys = ["name","tva","country","type_id","created_at"];
    // const invoicesUrl = "https://becode-cogip-2023.000webhostapp.com/get-data"

    const contactsTitles = ["Name", "Phone", "Mail","Compagny","Created at"];
    const contactsKeys = ["name","phone","email","company_id","created_at"];
    const contactsUrl = "https://becode-cogip-2023.000webhostapp.com/get-contacts"

    const companiesTitles = ["Name", "TVA", "Country","Type","Created at"];
    const companiesKeys = ["name","tva","country","type_id","created_at"];
    const companiesUrl = "https://becode-cogip-2023.000webhostapp.com/get-data"


    return  <div>
                <section class="tab01-container">
                    <h2 class="tab01-title">Last invoices</h2>
                    {/* <DisplayArray url={invoicesUrl} titles={invoicesTitles} keys={invoicesKeys}/> */}
                    <img class="tab01-img" src="" alt="" />
                </section>

                <section class="tab02-container">
                    <h2 class="tab02-title">Last contacts</h2>
                    <DisplayArray url={contactsUrl} titles={contactsTitles} keys={contactsKeys} type="contacts"/>
                    <img class="tab02-img" src="" alt="" />
                </section>

                <section class="tab03-container">
                    <h2 class="tab03-title">Last companies</h2>
                    <DisplayArray url={companiesUrl} titles={companiesTitles} keys={companiesKeys} type="companies"/>
                </section>
            </div>;
}