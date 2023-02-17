import { useEffect, useState } from "react";

function SearchBar({url,type}){
    
    //State
    const [dataBack, setDataBack] = useState([]);
    const [itemOffset, setItemOffset] = useState(0);
    const [searchTerm, setSearchTerm] = useState('');
  
    useEffect(() => {
        fetch(url)
        .then((res) => res.json())
        .then((dataBack) => {
        setDataBack(dataBack[type]);
        })
    },[]);  
  
    const currentData = dataBack
      .filter((elem) =>
        elem.names.toLowerCase().includes(searchTerm.toLowerCase())//le problème est ici au name
      )

    const handleSearch = (event) => {
      setSearchTerm(event.target.value);
      setItemOffset(0);
    };
  console.log(dataBack)
    return (
        <>
          <input
            placeholder="search company"
            size='sm'
            className='input'
            value={searchTerm}
            onChange={handleSearch}></input>
           
        </>
    );
  }
  export default SearchBar
  
  