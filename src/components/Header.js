import React from 'react';

const Header = () => {
  return (
    <header className='header'>
     <nav className="menu-container">
        {/* <img src="" alt="" class="menu-logo"> */}
        <ul className="menu-list">
            <li>Home</li>
            <li>Invoices</li>
            <li>Compagnies</li>
            <li>Contacts</li>
            <li>Compagnies</li>
            <li>Contacts</li>
        </ul>
            <button className="button-sign-up">Login</button>
            <button className="button-login">Sign up</button>
    </nav>
    </header>
  );
};

export default Header;