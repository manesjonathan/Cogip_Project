import React from "react";

const Footer = () => {
    return (
            <footer classeName = "footer">

                <nav className="social-container">
                    <h1 className="footer-title">COGIP</h1>

                    <ul className="social-contact">
                        <li>
                            <img src="../src/Images/location.avif" alt="logo location" className="location"/>
                            Square des Martyrs, 6000 Charleroi
                        </li>
                        <li>
                            <img src="../src/Images/phone.avif" alt="logo phone" className="phone"/>
                            (123)456-7890
                        </li>
                        <li>
                            <img src="../src/Images/printer.avif" alt="logo printer " className="printer"/>
                            (123)456-7890
                        </li>
                    </ul>

                    <ul className="social-media">
                        <li>Social Media</li>
                        <li>
                            <img src="../src/Images/facebook.avif" alt="logo facebook" className="logo-facebook" />
                        </li>
                        <li>
                            <img src="../src/Images/twitter.avif" alt="logo twitter" className="logo-twitter" />
                        </li>
                        <li>
                            <img src="../src/Images/linkedin.avif" alt="logo linkedin" className="logo-linkedin" />
                        </li>
                        <li>
                            <img src="../src/Images/youtube.avif" alt="logo youtube" className="logo-youtube" />
                        </li>
                        <li>
                            <img src="../src/Images/instagram.avif" alt="logo instagram" className="logo-instagram" />
                        </li>
                        <li>
                        <img src="../src/Images/googleplus.avif" alt="logo googleplus" className="logo-googleplus" />
                        </li>
                        <li>
                        <img src="../src/Images/pinterest.avif" alt="logo pinterest" className="logo-pinterest" />
                        </li>
                        <li>
                        <img src="../src/Images/rss.avif" alt="logo rss" className="logo-rss" />
                        </li>
                    </ul>

                </nav>

                <nav className="menu-footer">

                    <ul className="link-footer">
                        <li>
                            <a href="" alt="link home" className="link-home">HOME</a>
                        </li>
                        <li>
                            <a href="" alt="link invoices" className="link-invoices">INVOICES</a>
                        </li>
                        <li>
                            <a href="" alt="link companies" className="link-companies">COMPANIES</a>
                        </li>
                        <li>
                            <a href="" alt="link contact" className="link-contact">CONTACT</a>  
                        </li>
                        <li>
                            <a href="" alt="link privacy policy" className="link-privacy-policy">PRIVACY POLICY</a>
                        </li> 
                    </ul>

                    <p className="copyright">Copyright © 2022 • COGIP Inc.</p>
                
                </nav>

            </footer>        
    )
}

export default Footer;