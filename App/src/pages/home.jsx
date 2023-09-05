import React from 'react';
import Menu from '../Components/menu.jsx';
import Card from '../props/card';

const Home = () => {
  return (
    <div>
      <Menu />

      <div className='md:container mx-auto w-[50%]'>
        <div className='w-full h-5 mx-auto'>
          <div className="md:container w-full mt-1 flex flex-grow justify-center">
            <div className='grid grid-rows-1 grid-cols-5 gap-5 items-center justify-center '>
              <Card />
              <Card />
              <Card />
              <Card />
              <Card />
            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Home;