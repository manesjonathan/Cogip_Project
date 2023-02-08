import '../styles/styles.css';
import Header from './Header';
import DisplayArray from './DisplayArray';
import Footer from './Footer';
import PanneauHeader from './PanneauHeader';


function App() {
  return (
    <div>
      <Header />
      <DisplayArray url={"https://catfact.ninja/facts"}/>
      <Footer />
      <PanneauHeader/>
      <DisplayArray url={"http://cogip.great-site.net/get-contacts"}/>

    </div>
  );
}

export default App;
