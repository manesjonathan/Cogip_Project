import React from "react";
import Header from '../Header.js';
import Footer from '../Footer.js';
import PanneauHeader from '../PanneauHeader.js';
import DisplayAllArrays from '../DiplayAllArrays.js';


function HomePages() {
  return (
    <div>
      <Header />
      <PanneauHeader/>
      <DisplayAllArrays />
      <Footer />
    </div>
  );
}

export default HomePages;