import '../styles/styles.css';

import {Routes, Route} from "react-router-dom";
import HomePages from "./Pages/HomePages.js";

function App() {
  return (
    <div>
      <Routes>
        <Route path="/" element={<HomePages />} />
      </Routes>
    </div>
  );
}

export default App;
