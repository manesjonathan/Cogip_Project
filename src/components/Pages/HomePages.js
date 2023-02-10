import React from "react";
import Header from '../Elements/Header.js';
import Footer from '../Elements/Footer.js';
import PanneauHeader from '../Elements/PanneauHeader.js';
import DisplayAllArrays from '../Elements/DiplayAllArrays.js';


function HomePages() {
  return (
    <div>
      <Header />
      <PanneauHeader/>
      <DisplayAllArrays />
      {/* <Footer /> */}
    </div>
  );
}

export default HomePages;