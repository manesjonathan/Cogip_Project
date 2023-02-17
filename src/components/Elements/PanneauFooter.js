import React from "react";
import rectyellow from '../../Images/rect-yellow.avif';
import panneaufooter from '../../Images/footer-img.avif';

const PanneauFooter = () => {

return (
        <div className="panneauFooter">
            <p className="title-panneauFooter">Work better in your company</p>
            <div className="wrapper-imgFooter">
                <img className="rect-yellow" src={rectyellow} alt="rect-yellow" ></img>
                <img className="footer-img" src={panneaufooter} alt="footer-img"></img>
            </div>
        </div>
    );
  };

export default PanneauFooter;