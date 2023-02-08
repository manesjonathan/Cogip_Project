import '../styles/styles.css';
import Header from './Header.js';
import DisplayArray from './DisplayArray.js';
import Footer from './Footer.js';
import PanneauHeader from './PanneauHeader.js';
import DisplayAllArrays from './DiplayAllArrays.js';


function App() {
  return (
    <div>
      <Header />
      <PanneauHeader/>
   
      <DisplayAllArrays />
      <Footer />
    </div>
  );
}

export default App;
