import React from "react";
import Location from "../../Images/location.avif";
import Phone from "../../Images/phone.avif";
import Printer from "../../Images/printer.avif";
import Facebook from "../../Images/facebook.avif";
import Twitter from "../../Images/twitter.avif";
import Linkedin from "../../Images/linkedin.avif";
import Youtube from "../../Images/youtube.avif";
import Instagram from "../../Images/instagram.avif";
import Googleplus from "../../Images/googleplus.avif";
import Pinterest from "../../Images/pinterest.avif";
import RSS from "../../Images/rss.avif";


const Footer = () => {
  return (
    <footer classeName="footer">
      <nav className="social-container">
        <h1 className="footer-title">COGIP</h1>
        <ul className="social-contact">
          <li>
            <img className="logo-location" 
            src={Location} 
            alt="logo location" />
            Square des Martyrs, 6000 Charleroi
          </li><br />
          <li>
            <img className="logo-phone" 
            src={Phone} 
            alt="logo phone" />
            (123)456-7890<br />
          <li>
          </li>
            <img className="logo-printer" 
            src={Printer} 
            alt="logo printer " />
            (123)456-7890
          </li>
        </ul>
        <ul className="social-media">
          <h4>Social Media</h4>
          <li>
            <img className="logo-facebook" 
            src={Facebook} 
            alt="logo facebook" />
          </li>
          <li>
            <img className="logo-twitter" 
            src={Twitter} 
            alt="logo twitter" />
          </li>
          <li>
            <img className="logo-linkedin" 
            src={Linkedin} 
            alt="logo linkedin" />
          </li>
          <li>
            <img className="logo-youtube" 
            src={Youtube} 
            alt="logo youtube" />
          </li>
          <li>
            <img className="logo-instagram"
            src={Instagram} 
            alt="logo instagram" />
          </li>
          <li>
            <img
              className="logo-googleplus"
              src={Googleplus}
              alt="logo googleplus"
            />
          </li>
          <li>
            <img
              className="logo-pinterest"
              src={Pinterest}
              alt="logo pinterest"
            />
          </li>
          <li>
            <img className="logo-rss" 
            src={RSS} 
            alt="logo rss" />
          </li>
        </ul>
      </nav>
      <nav className="menu-footer">
        <ul className="link-footer">
          <li>
            <a href="" alt="link home" className="link-home">
              HOME
            </a>
          </li>
          <li>
            <a href="" alt="link invoices" className="link-invoices">
              INVOICES
            </a>
          </li>
          <li>
            <a href="" alt="link companies" className="link-companies">
              COMPANIES
            </a>
          </li>
          <li>
            <a href="" alt="link contact" className="link-contact">
              CONTACT
            </a>
          </li>
          <li>
            <a
              href=""
              alt="link privacy policy"
              className="link-privacy-policy"
            >
              PRIVACY POLICY
            </a>
          </li>
        </ul>
        <p className="copyright">Copyright © 2022 • COGIP Inc.</p>
      </nav>
    </footer>
  );
};

export default Footer;
