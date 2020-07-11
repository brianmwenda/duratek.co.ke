 //==============menu bounce==================using intersection observer.
 const sections = document.querySelectorAll('section');
 const bubble = document.querySelector('.indicator');
 
 const options = {
   threshold: 0.1
 };
 let observer = new IntersectionObserver(navCheck, options);
 
 function navCheck(entries){
   entries.forEach(entry => {
     const className = entry.target.className;
     console.log(className);
     const activeAnchor = document.querySelector(`[data-page="${className}"]`);
     const gradientIndex = entry.target.getAttribute('data-index');
     if(gradientIndex != 5){
        const coords = activeAnchor.getBoundingClientRect();
        const directions = {
            width:coords.width,
            left:coords.left
          };
          if(entry.isIntersecting){
            bubble.style.setProperty('left',`${directions.left}px`);
            bubble.style.setProperty('width',`${directions.width}px`);
          }
     }
 
   });
 }
 
 //observe screen 
 sections.forEach(section => {
   observer.observe(section);
 
 });
 
 