
import React, {useState }from "react";
import axios from "axios";
import { useNavigate } from "react-router-dom";
import {DashboardNav} from '../../Components/DashboardNav'
import { DashboardSideNav } from '../../Components/DashboardSideNav';
import DashboardFooter from '../../Components/DashboardFooter';
const Adduser = () => {
  const navigate= useNavigate();    
  const [formvalue, setFormvalue]= useState({name:'', email:'', phone:''});
  const [message, setMessage]= useState('');
  const handleInput =(e)=>{
      setFormvalue({...formvalue, [e.target.name]:e.target.value});
  }

  const handleSubmit =async(e)=>{
       e.preventDefault();
       console.log(formvalue);
       const formData= {name:formvalue.name, email:formvalue.email, phone:formvalue.phone}; 
       const res= await axios.post("http://localhost/react-ecommerce-project/php-api/user/insert.php",formData);
       //let jsonres= res.data.json();        
         if(res.data.success)
         {
          setMessage(res.data.success);
          setTimeout( ()=>{               
              navigate('/manage-user');
          }, 2000);
         
         }
      }   
    return (
      <div className="wrapper">
      <DashboardNav/>
      <DashboardSideNav/>
      <div className='content-wrapper'> 
      <div className="col-md-12">
  {/* general form elements */}
  <div className="card card-primary">
    <div className="card-header">
      <h3 className="card-title">Add User</h3>
    </div>
    {/* /.card-header */}
    {/* form start */}
    <p className="text-sucess"> { message }</p>                 
    <form onSubmit={handleSubmit}>
      <div className="card-body">
        <div className="form-group">
          <label htmlFor="exampleInputEmail1">Name</label>
          <input type="text" className="form-control" id="exampleInputEmail1" placeholder="Enter name" name="name" value={formvalue.name}  onChange={ handleInput} />
        </div>
        <div className="form-group">
          <label htmlFor="exampleInputPassword1">email</label>
          <input type="email" className="form-control" id="exampleInputPassword1" placeholder="email" name="email" value={formvalue.email}  onChange={ handleInput}  />
        </div>
        <div className="form-group">
          <label htmlFor="ex">phone</label>
          <input type="text" className="form-control" id="ex" placeholder="phone" name="phone" value={formvalue.phone}  onChange={ handleInput}  />
        </div>
      </div>
      {/* /.card-body */}
      <div className="card-footer">
      <button name="submit" className="btn btn-success">Submit</button>
      </div>
    </form>
  </div>
  {/* /.card */}
</div>
</div>
        <DashboardFooter/>
   
      </div>

    );
};

export default Adduser;