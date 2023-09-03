import React from 'react';
import Menu from '../Components/menu.jsx';
import teste from '../Assets/img/placeholder.png';
import { FaCartShopping } from "react-icons/fa6";


const Login = () => {
  return (
    <div>
      <Menu />
      <div className='md:container bg-[#202020] mx-auto w-[50%]'>
        <h1 className='text-white'>Logar-se</h1>
        <form action='/' method='post'>
          <label className='text-white' htmlFor='user_email'>Email:</label>
          <input className='rounded-sm m-1' placeholder='email@gmail.com' type='email' name='user_email' id='user_email' /><br></br>
          <label className='text-white' htmlFor='user_pass'>Senha:</label>
          <input className='rounded-sm m-1' placeholder='**********' type='password' name='user_pass' id='user_pass' /> <br></br>
          <input className='rounded-md m-1 bg-gray-600 w-64 text-white h-10' type='submit' value='Logar' />
        </form>
        
      </div>

    </div>
  );
}

export default Login;