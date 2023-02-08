import '../styles/styles.css';
import Header from './Header';
import DisplayArray from './DisplayArray';
import Footer from './Footer';
import PanneauHeader from './PanneauHeader';


function App() {
  return (
    <div>
      <Header />
      <PanneauHeader/>
      <DisplayArray url={"https://catfact.ninja/facts"}/>
      <DisplayArray url={"http://cogip.great-site.net/get-contacts"}/>
      <Footer />
    </div>
  );
}

export default App;
