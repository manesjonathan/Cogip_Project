import React from 'react';

const Header = () => {
  return (
    <header className='header'>

    <nav className="menu-container">

          <h1 className="menu-title">COGIP</h1>

          <nav className="ham-menu">
                  <button className="hm-button" aria-controls="primary-navigation" aria-expanded="false">
                        <svg className="ham" viewBox="0 0 100 100" width="50">
                        <rect className="line top" width="80" height="10" x="10" y="25" rx="5" />
                        <rect className="line middle" width="80" height="10" x="10" y="45" rx="5" />
                        <rect className="line bottom" width="80" height="10" x="10" y="65" rx="5" />
                        </svg>
                  </button>
            </nav>

        <ul className="menu-list">
            <li>Home</li>
            <li>Invoices</li>
            <li>Compagnies</li>
            <li>Contacts</li>
            <li>Compagnies</li>
            <li>Contacts</li>
        </ul>

        <ul className="log">          
          <li>login</li>
          <li>signup</li>
        </ul>
    </nav>
    </header>
  );
};

export default Header;