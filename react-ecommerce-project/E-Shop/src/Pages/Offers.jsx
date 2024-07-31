import React from "react";
import Navbar from '../Components/Navbar/Navbar';
import Footer from '../Components/Footer/Footer';
import ScrollToTop from "react-scroll-to-top";

const Offers = () => {
  return <div>
    <Navbar />
    <div>Offers</div>

    <Footer />
    
      <ScrollToTop smooth component={<p style={{ color: "blue" }}>↑</p>} />
  </div>
};

export default Offers;
