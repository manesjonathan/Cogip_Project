import '../styles/styles.css';
import Burger from './Burger';
import DisplayArray from './DisplayArray';

function App() {
  return (
    <div>
      <Burger />
      <DisplayArray url={"https://catfact.ninja/facts"}/>
    </div>
  );
}

export default App;
