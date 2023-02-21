import React, { useState } from 'react';
import{Link} from "react-router-dom";

const HeaderHome = () => {

const [isOpened, setIsOpened] = useState(false);
return (

<header className='header-home'>
<nav className="menu-container">

<h1 className="menu-title"><Link to="/">COGIP</Link></h1>


        <ul className="menu menu-list">
            <li><Link to="/">Home</Link></li>
            <li><Link to="/Invoices">Invoices</Link></li>
            <li><Link to="/Compagnies">Compagnies</Link></li>
            <li><Link to="/Contacts">Contacts</Link></li>
        </ul>
      <ul className="menu menu-log">
        <li className="menu-signup">Sign up</li>
        <li>login</li>
        </ul>


    <nav className="ham-menu">
        <button aria-label="Menu burger" className="hm-button" aria-controls="primary-navigation" aria-expanded="false" aria-expended={isOpened} onClick={() => setIsOpened(!isOpened)}>
            <svg className="ham" viewBox="0 0 100 100" width="50">
              <rect className="line top" width="80" height="10" x="10" y="25" rx="5" />
              <rect className="line middle" width="80" height="10" x="10" y="45" rx="5" />
              <rect className="line bottom" width="80" height="10" x="10" y="65" rx="5" />
            </svg>
          </button>
    </nav>

    <ul className="menu-list-mobile" style={{ marginLeft: isOpened ? '0%' : '-200%' }}>
        <li><Link to="/">Home</Link></li>
        <li><Link to="/Invoices">Invoices</Link></li>
        <li><Link to="/Compagnies">Compagnies</Link></li>
        <li><Link to="/Contacts">Contacts</Link></li>
        <li>Sign up</li>
        <li>login</li>
    </ul>
</nav>
</header>

)}

export default HeaderHome;