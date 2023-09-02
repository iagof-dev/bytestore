import logo from '../Assets/icons/logo/128.webp';
import { FaDoorClosed, FaDoorOpen } from "react-icons/fa6";
import { HiMenu } from "react-icons/hi";

export default function Menu() {
  return (
    <div className='w-full flex mt-[-5px] bg-[#353535] h-50'>

      <div className='md:container m-0 mt-1 flex xl:mx-auto rounded-md items-stretch'>
        <a href='/'><img src={logo} title='ByteStore Logo' className='md:w-16 grid-cols-1' /></a>

        <div className="md:container w-full  flex flex-grow justify-end">
          <div className='grid grid-rows-1 grid-cols-2 items-center justify-end'>
            
            <div className='grid-cols-1 m-1'><a href='#'><button className='w-32 h-8 text-center leading-tight align-middle rounded-lg text-white bg-red-500 hover:bg-blue-600'><div className='ml-3'><HiMenu className='align-middle mb-[-1.1rem]' />Categorias</div></button></a></div>
            <div className='grid-cols-1 m-1'><a href='/login'><button className='w-32 h-8 text-center leading-tight align-middle rounded-lg text-white bg-red-500 hover:bg-blue-600'><div className='ml-3'><FaDoorClosed className='align-middle mb-[-1.1rem] ml-[1rem]' />Logar</div></button></a></div>

          </div>
        </div>
      </div>
    </div>
  )
} 