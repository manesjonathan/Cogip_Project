import React from "react";
import Header from '../Elements/Header.js';
import Footer from '../Elements/Footer.js';
import PanneauHeader from '../Elements/PanneauHeader.js';
import DisplayAllArrays from '../Elements/DiplayAllArrays.js';


function HomePage() {
  return (
    <div>
      <Header />
      <PanneauHeader/>
      <DisplayAllArrays />
      <Footer />
    </div>
  );
}

export default HomePage;