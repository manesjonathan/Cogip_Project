import React from "react";
import panneau from '../Images/header-img.avif'

const PanneauHeader = () => {

return (

  <nav class="panneau-container">
      <h2 className="title-panneau">Manage your customers and invoices easly</h2>
      <img className ="img-panneau" src={panneau} alt="img-panneau" ></img>
  </nav>
     );
   };
   
export default PanneauHeader;