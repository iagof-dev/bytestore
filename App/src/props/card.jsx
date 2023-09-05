import React from 'react';
import teste from '../Assets/img/placeholder.png';
import { FaCartShopping as Carrinho } from "react-icons/fa6";


export default function Card() {
    return (
        <div className='rounded-md drop-shadow-lg w-[11rem] bg-[#FDFDFD]'>
            <a href='/anuncio/x'>
                <img src={teste} alt='aaaaaa' className='rounded-t-md' title='aaaaa' />
                <div className='p-2'>
                    <h1 className='text-[0.75rem] font-medium'>Processador Intel Core i7 12700KF 3.6GHz (5.0GHz Turbo), 12ª Geração, 12-Cores 20-Threads, LGA 1700</h1>
                    <div className='container'>
                        <h3 className='text-gray-500 text-[0.8rem] pt-5 mb-[-0.4rem]'><span className='line-through'>de: R$1.000</span> por:</h3>
                        <h2><span className='text-[#42A000] pb-[-2rem] font-bold'>R$1.500,00 <span className='text-xs align-middle'>à vista</span></span></h2>
                        <h4 className='text-gray-600 text-[0.8rem] mt-[-0.5rem]'>96x de R$15,63 sem juros</h4>
                    </div>
                </div>
                <a href='/anuncio/x'><button className='bg-[#00A000] text-sm rounded-sm font-medium text-white w-full h-10 rounded-b-md transition-colors duration-300 ease-in-out hover:bg-[#00B000] hover:text-[#101010]'> Adicionar ao carrinho</button></a>
            </a>
        </div>
    )
}
