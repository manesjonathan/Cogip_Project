import React,{useEffect, useState} from "react";
import DisplayArray from "./DisplayArray.js";

function SearchBar(){
    const [datas,setDatas] = useState([])

console.log(datas)

    return(
        <>
        <div>
        <input className="input input-invoices" placeholder="Search company" type="text" /*onChange={handleChange} value={value} {...props}*/></input> 
        </div>
        <div>
 
        </div>
        </>
    )
}
/*
const SearchBar =({list, setlist, filterfield = item => item, ...props}) => {

    const [value, setValue] = useState ("")
//useeffect sert a ce que dès qu'on mette une lettre ça fasse la recherche
    useEffect(() =>{
        if (value){
            setlist(filterList())
        }
    },[value])
//
    const filterList = () => {
        return list.filter(item => filterfield(item).toLowerCase().includes(value.toLocaleLowerCase()))
    }

    const handleChange = event => {
        setValue(event.target.value)
    }


}*/

export default SearchBar