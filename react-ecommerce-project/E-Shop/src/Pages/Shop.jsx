import React from 'react'
import Hero from '../Components/Hero/Hero'
import Popular from '../Components/Popular/Popular'
import Offers from '../Components/Offers/Offers'
import NewCollections from '../Components/NewCollections/NewCollections'
import NewsLetter from '../Components/NewsLetter/NewsLetter'
import Navbar from '../Components/Navbar/Navbar';
import Footer from '../Components/Footer/Footer';
import ScrollToTop from "react-scroll-to-top";


const Shop = () => {
  return (
    <div>
      <Navbar />
      <Hero/>
      <Popular/>
      <Offers/>
      <NewCollections/>
      <NewsLetter/>

      <Footer />
    
      <ScrollToTop smooth component={<p style={{ color: "blue" }}>↑</p>} />
    </div>
  )
}

export default Shop
