import React from "react";

const Footer = () => {
    return (
            <Footer classeName = "footer">
                <nav className="logo-social-container">
                    {/* <img src="" alt="" class="footer-logo"> */}
                    <ul className="contact-social">
                        <li>Address</li>
                        <li>Phone</li>
                        <li>Fax</li>
                    </ul>
                    <ul class="logo-social">
                        <li>Social Media</li>
                        <li>Facebook</li>
                        <li>Twitter</li>
                        <li>Linkedin</li>
                        <li>You tube</li>
                        <li>instagram</li>
                        <li>Google +</li>
                        <li>Pinterest</li>
                        <li>RSS</li>
                    </ul>
                </nav>
                <nav class="menu-footer">
                    <ul>
                        <li>HOME</li>
                        <li>INVOICES</li>
                        <li>COMPANIES</li>
                        <li>CONTACT</li>
                        <li>PRIVACY POLICY</li> 
                    </ul>
                    <p>Copyright © 2022 • COGIP Inc.</p>
                </nav>
            </Footer>        
    )
}