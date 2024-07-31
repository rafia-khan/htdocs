import React, { useContext } from "react";
import { ShopContext } from "../Context/ShopContext";
import { useParams } from "react-router-dom";
import Breadcrum from "../Components/Breadcrums/Breadcrum";
import ProductDisplay from "../Components/ProductDisplay/ProductDisplay";
import DescriptionBox from "../Components/DescriptionBox/DescriptionBox";
import RelatedProducts from "../Components/RelatedProducts/RelatedProducts";
import ReviewSection from "../Components/ReviewSection/ReviewSection";
import Navbar from '../Components/Navbar/Navbar';
import Footer from '../Components/Footer/Footer';
import ScrollToTop from "react-scroll-to-top";


const Product = () => {
  const {theme}=useContext(ShopContext);
  const { all_product } = useContext(ShopContext);
  const { productId } = useParams();
  const product = all_product.find((e) => e.id === Number(productId));
  return (
    <div className={`${theme}_app`}>
      <Navbar />
    <div>
      <Breadcrum product={product} />
      <ProductDisplay product={product} />
      <DescriptionBox />
      <ReviewSection />
      <RelatedProducts />
    </div>
    <Footer />
    
      <ScrollToTop smooth component={<p style={{ color: "blue" }}>↑</p>} />
    </div>
  );
};

export default Product;
