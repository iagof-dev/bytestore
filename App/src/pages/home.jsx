import React from 'react';
import Menu from '../Components/menu.jsx';
import teste from '../Assets/img/placeholder.png';


const Home = () => {
  return (
    <div>
      <Menu />

      <div className='md:container mx-auto w-[50%]'>
        <div className='w-full h-5 mx-auto'>
          <div className="md:container w-full  flex flex-grow justify-center">
            <div className='grid grid-rows-1 grid-cols-5 grid-flow-row items-center justify-center '>

              <div className='bg-gray-500 h-1 rounded-md shadow-2xl w-[11rem] container m-1 mt-5'>
                <img src={teste} alt='aaaaaa' className='rounded-t-md' title='aaaaa' />
                <div className='p-2'>
                  <h1 className='text-[0.75rem]'>Processador Intel Core i7 12700KF 3.6GHz (5.0GHz Turbo), 12ª Geração, 12-Cores 20-Threads, LGA 1700</h1>
                  <div className='container'>
                    <h3 className='text-gray-500 text-[0.8rem] pt-5 mb-[-0.4rem]'><span className='line-through'>de: R$1.000</span> por:</h3>
                    <h2 className='text-green-500 pb-[-2rem] font-bold'>R$1.500,00 à vista</h2>
                    <h4 className='text-gray-600 text-[0.8rem] mt-[-0.5rem]'>96x de R$15,63 sem juros</h4>
                  </div>
                </div>
                <a href='/produtos/0'><button className=' bg-[#00A000] rounded-sm text-white w-full h-10 rounded-b-md'>Adicionar ao carrinho</button></a>
              </div>


            </div>
          </div>
        </div>
      </div>
    </div>
  );
}

export default Home;