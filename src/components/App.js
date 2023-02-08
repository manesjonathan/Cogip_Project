import '../styles/styles.css';
import Header from './Header';
import DisplayArray from './DisplayArray';

function App() {
  return (
    <div>
      <Header />
      <DisplayArray url={"https://catfact.ninja/facts"}/>
    </div>
  );
}

export default App;
