import "./App.css";

import { BrowserRouter, Routes, Route } from "react-router-dom";
import Shop from "./Pages/Shop";
import ShopCategory from "./Pages/ShopCategory";
import Product from "./Pages/Product";
import Cart from "./Pages/Cart";
import LoginSignup from "./Pages/LoginSignup";

import men_banner from "./Components/Assets/banner_mens.png";
import women_banner from "./Components/Assets/banner_women.png";
import kids_banner from "./Components/Assets/banner_kids.png";
import About from "./Pages/About";
import Contact from "./Pages/Contact";
import NotFound from "./Pages/NotFound";
import Manageuser from "./admin_pages/user/Manageuser";
import { useContext, useEffect } from "react";
import { ShopContext } from "./Context/ShopContext";
import Collections from "./Pages/Collections";
import Offers from "./Pages/Offers";
import Adduser from "./admin_pages/user/Adduser";
// import Management from "./admin/pages/user/Management";
import Dashboard from "./Components/Dashboard/Dashboard";
import ListProduct from "./admin_pages/Product/ListProduct";
import  Insert from "./admin_pages/Product/Insert";
import AddMen from "./admin_pages/men/AddMen";
function App() {
  const { theme } = useContext(ShopContext);
  return (

      <BrowserRouter>
      
        <Routes>
          <Route path="/" element={<Shop />} />
          <Route
            path="/men"
            element={<ShopCategory banner={men_banner} category="men" />}
          />
          <Route
            path="/women"
            element={<ShopCategory banner={women_banner} category="women" />}
          />
          <Route
            path="/kids"
            element={<ShopCategory banner={kids_banner} category="kids" />}
          />
          <Route path="/product" element={<Product />}>
            <Route path=":productId" element={<Product />} />
          </Route>
          <Route path="/dashboard" element={<Dashboard />} />
          <Route path="/cart" element={<Cart />} />
          <Route path="/login" element={<LoginSignup />} />
          <Route path="/about" element={<About />} />
          <Route path="/contact" element={<Contact />} />
          <Route path="*" element={<NotFound />} />
          <Route path="/offers" element={<Offers />} />
          <Route path="/collections" element={<Collections />} />
          <Route path="/add-user" element={<Adduser />} />
          <Route path="/productlist" element={<ListProduct/>} />
          <Route path="/addproduct" element={<Insert/>} />
          <Route path="/manage-user" element={<Manageuser/>} />
          <Route path="/men" element={<AddMen/>} />


          

          
          {/* <Route path="/manage-user" element={<Management />} /> */}
        </Routes> 
      </BrowserRouter>
  
  );
}

export default App;
