
//select elements
const selectElement = {
  open:".open",
  close:".close",
  navlist:'.nav-list',
  intro:'.intro',
  vid:'.video',
  text:'text'
}

//animate navlink
const navlink = document.querySelectorAll('.nav-item');

//open menu

let navopen = document.querySelector(selectElement.open);
document.querySelector(selectElement.open).addEventListener('click',()=>{
  document.querySelector(selectElement.navlist).classList.add('active');

  //delay navlinks
  navlink.forEach((link,index) => {
      link.style.animation = `navLinkFade 1s ease  forwards ${index/7}s`;
  });
});
//close menu
document.querySelector(selectElement.close).addEventListener('click',()=>{
  document.querySelector(selectElement.navlist).classList.remove('active');
    //delay navlinks
    navlink.forEach((link,index) => {
      link.style.animation = '';
  });

});
//get all the list of the nav bar and close the animation on click
navlink.forEach(cur =>{
  let eliminate = cur.hasAttribute("onclick");
  //if the navlist has no attribute of onclick the execute the close command
  if(!eliminate ){
    cur.addEventListener("click",() => {
      document.querySelector(selectElement.navlist).classList.remove('active');
    });
  }
 
})




//talk animation
const talkbtn = document.querySelector('#talk');
const text = document.querySelector('#text');
const greetings = 'hello too, welcome to my website, my name is brian mwenda and  I am a webdeveloper who fell in love with programming. In my free time i enjoy learning about new technology and have a passion for software development. I am currently working towards my bachelors degree in computer science in kirinyaga university. If i am not on my computer, I spend time with loved ones or have some photography sessions with pals. So for any reason you need my services please feel free to call or leave a message to my whatsapp. Have a good time.';
  

  
const SpeechRecognition = window.SpeechRecognition || window.webkitSpeechRecognition;

const recognition = new SpeechRecognition();

recognition.onstart = function(){
  console.log('Ai activated');

};
recognition.onresult = function(event){
  console.log(event);
  const current = event.resultIndex;
  const transcript = event.results[current][0].transcript;
  text.textContent = transcript;
  readOutLoud(transcript);
};
//add listerner to bn

//add listerner to bn

// talkbtn.addEventListener('click',()=>{
//   recognition.start();
//  });
 
//  function readOutLoud(message){
//    const speech = new SpeechSynthesisUtterance();
 
//  if(message.includes('hello')){
    
//    speech.text = greetings;
//  };
//    // speech.text = message;
  
//    speech.volume = 1;
//    speech.rate = 1;
//    speech.pitch = 1;
//    window.speechSynthesis.speak(speech);
//  }


