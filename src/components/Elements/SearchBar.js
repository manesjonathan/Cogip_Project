import { useEffect, useState } from "react";

function SearchBar({url,type}){
    
    //State
    let [dataBack, setDataBack] = useState([]);
    const [itemOffset, setItemOffset] = useState(0);
    const [searchTerm, setSearchTerm] = useState('');
  
    useEffect(() => {
        fetch(url)
        .then((res) => res.json())
        .then((dataBack) => {
        setDataBack(dataBack[type]);
        console.log(dataBack)
        })
    },[]);  
  
    const currentData = e=> {dataBack = dataBack
    .filter((elem) =>
      elem.name.toLowerCase().includes(searchTerm.toLowerCase())
    ).slice(itemOffset, dataBack.length); console.log(dataBack)};

    const handleSearch = (event) => {
      setSearchTerm(event.target.value);
      setItemOffset(0);
    };

    return (
        <>
          <input
            placeholder="search company"
            size='sm'
            className='input'
            value={searchTerm}
            onChange={e => {setSearchTerm(e.target.value);currentData()}}></input>
           
        </>
    );
  }
  export default SearchBar
  
  