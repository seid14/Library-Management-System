const navSlide =()=>
{
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

   
    burger.addEventListener('click',()=>{
        //toggle
        nav.classList.toggle('nav-active');

        //activate links
    navLinks.forEach((link,index)=> {

        if(link.style.animation)
        {
            link.style.animation=''
        }
        else
        {
            link.style.animation='navLinkFade 0.5s ease forward ${index/7 +1.3}s';
            console.log(index/7);
        }
        
    });
        //burger Toggle
        burger.classList.toggle('toggle');
    });
    
}
navSlide(); 