import '../styles/styles.css';
import {Routes, Route} from "react-router-dom";
import HomePage from "./Pages/HomePage.js";
import InvoicesPage from './Pages/InvoicesPage.js';

function App() {
  return (
    <div>
      <Routes>
        <Route path="/" element={<HomePage />} />
        <Route path="/Invoices" element={<InvoicesPage />} />
      </Routes>
    </div>
  );
}

export default App;
