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
        console.log(dataBack)
        })
    },[]);  
  
    const currentData = e => {dataBack
      .filter(name => name ===searchTerm)
      .map(name => {
        return name;
      })
    };

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
  
  