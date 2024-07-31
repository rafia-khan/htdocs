import React from 'react'
import CartItems from '../Components/CartItems/CartItems'
import Navbar from '../Components/Navbar/Navbar';
import Footer from '../Components/Footer/Footer';
import ScrollToTop from "react-scroll-to-top";

const Cart = () => {
  return (
    <div>
      <Navbar />
      <CartItems/>

      <Footer />
    
      <ScrollToTop smooth component={<p style={{ color: "blue" }}>↑</p>} />
    </div>
  )
}

export default Cart
