import '../styles/styles.css';
import Header from './Header';
import DisplayArray from './DisplayArray';
import Footer from './Footer';

function App() {
  return (
    <div>
      <Header />
      <DisplayArray url={"https://catfact.ninja/facts"}/>
      <Footer />
    </div>
  );
}

export default App;
