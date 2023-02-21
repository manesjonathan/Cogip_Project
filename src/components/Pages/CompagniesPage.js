import React from 'react';
import DisplayComapgniesArrays from '../Elements/displayCompagniesArray.js';
import Footer from '../Elements/Footer.js';
import Header from '../Elements/Header.js';
import SearchBar from '../Elements/SearchBar.js';

const CompagniesPage = () => {

return (
    <div>
        <Header />
        <SearchBar url={"https://cogip.jonathan-manes.be/get-companies"} type={"companies"}/>
        <DisplayComapgniesArrays/>
        <Footer/>
    </div>
)}

export default CompagniesPage;