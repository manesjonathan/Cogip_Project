import React,{useEffect, useState} from "react";
import DisplayArray from "./DisplayArray.js";

function SearchBar(){

    return(
        <>
        <div>
        <input className="input input-invoices" placeholder="Search company" type="text"></input> 
        </div>
        <div></div>
        </>
    )
}

export default SearchBar