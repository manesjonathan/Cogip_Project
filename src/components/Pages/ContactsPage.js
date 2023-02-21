import React from 'react';
import DisplayAContactsArrays from '../Elements/DisplayContactsArray.js';
import Footer from '../Elements/Footer.js';
import Header from '../Elements/Header.js';
import SearchBar from '../Elements/SearchBar.js';
const ContactsPage = () => {

return (
    <div>
        <Header />
        <SearchBar/>
        <DisplayAContactsArrays/>
        <Footer/>
    </div>
)}

export default ContactsPage;