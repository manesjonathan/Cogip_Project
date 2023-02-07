function Burger() {

return (
    <nav className="ham-menu">
    <button className="hm-button" aria-controls="primary-navigation" aria-expanded="false">
        <svg class="ham" viewbox=" 0 0 100 100" width="40">
            <rect className="line top" 
                  width="30" height="5"
                   x="10" y="20" rx="5"> 
            </rect>
            <rect className="line middle" 
                  width="30" height="5"
                  x="10" y="30" rx="5">
            </rect>
            <rect className="line bottom" 
                  width="30" height="5"
                  x="10" y="40" rx="5">
            </rect>
        </svg> 
        </button>
        </nav>)};

export default Burger;