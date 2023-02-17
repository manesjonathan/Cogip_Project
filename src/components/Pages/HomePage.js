import React from "react";
import HeaderHome from '../Elements/HeaderHome.js';
import Footer from '../Elements/Footer.js';
import PanneauHeader from '../Elements/PanneauHeader.js';
import DisplayAllArrays from '../Elements/DiplayAllArrays.js';
import PanneauFooter from '../Elements/PanneauFooter.js';

function HomePage() {
  return (
    <div>
      <HeaderHome />
      <PanneauHeader/>
      <DisplayAllArrays />
      <PanneauFooter />
      <Footer />
    </div>
  );
}

export default HomePage;