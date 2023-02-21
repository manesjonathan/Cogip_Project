import React from 'react';
import DisplayInvoicesArrays from '../Elements/DisplayInvoicesArray.js';
import Footer from '../Elements/Footer.js';
import Header from '../Elements/Header.js';
import SearchBar from '../Elements/SearchBar.js';

const InvoicesPage = () => {

return (
    <div>
        <Header />

        <DisplayInvoicesArrays/>
        <Footer/>
    </div>
)}

export default InvoicesPage;