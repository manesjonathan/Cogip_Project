import '../styles/styles.css';
import Header from './Header';
import DisplayArray from './DisplayArray';
import PanneauHeader from './PanneauHeader';


function App() {
  return (
    <div>
      <Header />
      <PanneauHeader/>
      <DisplayArray url={"http://cogip.great-site.net/get-contacts"}/>

    </div>
  );
}

export default App;
