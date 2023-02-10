import React from "react";
import panneau from '../Images/header-img.avif'
import rectwhite from '../Images/rect-white-10.avif'

const PanneauHeader = () => {

return (

  <nav class="panneau-container">
    <div className="panneau">
      <h2 className="title-panneau">Manage your customers and invoices easly</h2>
      <img className ="img-panneau" src={panneau} alt="img-panneau" ></img>
    </div>
      <img className ="img-rectwhite" src={rectwhite} alt="img-rectwhite" ></img>
  </nav>
     );
   };
   
export default PanneauHeader;