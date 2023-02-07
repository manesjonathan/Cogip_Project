function Burger() {

      return (
            <nav className="ham-menu">
                  <button className="hm-button" aria-controls="primary-navigation" aria-expanded="false">
                        <svg className="ham" viewBox="0 0 100 100" width="50">
                        <rect className="line top" width="80" height="10" x="10" y="25" rx="5" />
                        <rect className="line middle" width="80" height="10" x="10" y="45" rx="5" />
                        <rect className="line bottom" width="80" height="10" x="10" y="65" rx="5" />
                        </svg>
                  </button>
            </nav>
      )}

export default Burger