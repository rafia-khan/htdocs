import React, { useContext } from 'react';
import './CSS/Contact.css'
import { ShopContext } from '../Context/ShopContext';
import Navbar from '../Components/Navbar/Navbar';
import Footer from '../Components/Footer/Footer';
import ScrollToTop from "react-scroll-to-top";

const Contact = () => {
  const {theme}=useContext(ShopContext);
  return (
    <div className={"container-my_"+theme}>
      <Navbar />
      <h1 id="myheading">
        Contact Us
      </h1>
      <p>
      This is the official page of Shopnix, where you can share all your queries, feedback, complaints, or any concern you may have about our products.
      </p>
      <p>
      In Case of any grievance, don't hesitate to get in touch with us on our official contact number xxxxxxxxxx. Or you can write to us at xyz@gmail.com.
      </p>
      <Footer />
    
    <ScrollToTop smooth component={<p style={{ color: "blue" }}>↑</p>} />
      </div>
  );
};

export default Contact;