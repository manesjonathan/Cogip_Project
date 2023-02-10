import '../styles/styles.css';
import {Routes, Route} from "react-router-dom";
import HomePage from "./Pages/HomePage.js";
import InvoicesPage from './Pages/InvoicesPage.js';
import ContactsPage from './Pages/ContactsPage.js';
import CompagniesPage from './Pages/CompagniesPage.js';

function App() {
  return (
    <div>
      <Routes>
        <Route path="/" element={<HomePage />} />
        <Route path="/Invoices" element={<InvoicesPage />} />
        <Route path="/Contacts" element={<ContactsPage />} />
        <Route path="/Compagnies" element={<CompagniesPage />} />
      </Routes>
    </div>
  );
}

export default App;
