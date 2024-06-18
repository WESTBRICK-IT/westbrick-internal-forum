//Programmed by Chris Barber June 6 2024
const MAX_NUMBER_OF_IMAGES = 5;
const checkIfNextEmpty = function(id, threadImageIndex) {
  //index +1 to see the next one, mod MAX_NUMBER_OF_IMAGES to wrap, + 1 to get -image 
  threadImageIndex = ((threadImageIndex + 1) % MAX_NUMBER_OF_IMAGES) + 1;
  const threadImage = document.querySelector(".thread" + id + "-image" + threadImageIndex);
  if(threadImage == null) {
    return true;
  }
  else {
    return false;
  }
}

const checkIfPrevEmpty = function(id, threadImageIndex) {
  // index +MAX_NUMBER_OF_IMAGES because js doesn't like mod negative, index -1 to see the previous one, mod MAX_NUMBER_OF_IMAGES to wrap, + 1 to get -image 
  threadImageIndex = ((threadImageIndex + MAX_NUMBER_OF_IMAGES - 1) % MAX_NUMBER_OF_IMAGES) + 1;
  const threadImage = document.querySelector(".thread" + id + "-image" + threadImageIndex);
  if(threadImage == null) {
    return true;
  }
  else {
    return false;
  }
}
const nextIndexTester = function(id, threadImageIndex) {
  if(threadImageIndex === 0) {
    const threadImage1 = document.querySelector(".thread" + id + "-image1");
    if(threadImage1 != null) {
      threadImage1.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadImageIndex)){
      //if the next one is empty just increment to the next one
      threadImageIndex = threadImageIndex +1;
    }else {
      const threadImage2 = document.querySelector(".thread" + id + "-image2");
      threadImage2.style.display = "block";
    }
  }
  if(threadImageIndex === 1){
    const threadImage2 = document.querySelector(".thread" + id + "-image2");
    if(threadImage2 != null) {
      threadImage2.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadImageIndex)){
      //if the next one is empty just increment to the next one
      threadImageIndex = threadImageIndex +1;
    }else {
      const threadImage3 = document.querySelector(".thread" + id + "-image3");
      threadImage3.style.display = "block";
    }
  }
  if(threadImageIndex === 2){
    const threadImage3 = document.querySelector(".thread" + id + "-image3");
    if(threadImage3 != null) {
      threadImage3.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadImageIndex)){
      //if the next one is empty just increment to the next one
      threadImageIndex = threadImageIndex +1;
    }else {
      const threadImage4 = document.querySelector(".thread" + id + "-image4");
      threadImage4.style.display = "block";
    }
  }
  if(threadImageIndex === 3){
    const threadImage4 = document.querySelector(".thread" + id + "-image4");
    if(threadImage4 != null) {
      threadImage4.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadImageIndex)){
      //if the next one is empty just increment to the next one
      threadImageIndex = threadImageIndex +1;
    }else {
      const threadImage5 = document.querySelector(".thread" + id + "-image5");
      threadImage5.style.display = "block";
    }
  }
  if(threadImageIndex === 4){
    const threadImage5 = document.querySelector(".thread" + id + "-image5");
    if(threadImage5 != null) {
      threadImage5.style.display = "none";
    }
    if(checkIfNextEmpty(id, threadImageIndex)){
      //if the next one is empty just increment to the next one
      threadImageIndex = threadImageIndex +1;
      threadImageIndex = threadImageIndex % MAX_NUMBER_OF_IMAGES;
      threadImageIndex = nextIndexTester(id, threadImageIndex);
    }else {
      const threadImage1 = document.querySelector(".thread" + id + "-image1");
      threadImage1.style.display = "block";
    }
  }
  return threadImageIndex
}

const nextSlide = function(id) {
  const thisThreadImages = document.querySelector(".thread" + id + "-images");
  //There is an alt variable that contains the picture index attached to thread$id-images
  let threadImageIndex = thisThreadImages.getAttribute("alt");
  threadImageIndex = parseInt(threadImageIndex);
  threadImageIndex = nextIndexTester(id, threadImageIndex);
  threadImageIndex = threadImageIndex + 1;
  // modulus 4 to keep it from going over
  threadImageIndex = threadImageIndex % MAX_NUMBER_OF_IMAGES;
  thisThreadImages.setAttribute("alt", threadImageIndex);
}

const prevIndexTester = function(id, threadImageIndex) {
    if(threadImageIndex === 4){
        const threadImage5 = document.querySelector(".thread" + id + "-image5");
        if(threadImage5 != null) {
          threadImage5.style.display = "none";
        }
        if(checkIfPrevEmpty(id, threadImageIndex)) {
          threadImageIndex = threadImageIndex - 1;
        }else {
          const threadImage4 = document.querySelector(".thread" + id + "-image4");
          threadImage4.style.display = "block";
        }
      }
      if(threadImageIndex === 3){
        const threadImage4 = document.querySelector(".thread" + id + "-image4");
        if(threadImage4 != null) {
          threadImage4.style.display = "none";
        }
        if(checkIfPrevEmpty(id, threadImageIndex)) {
          threadImageIndex = threadImageIndex - 1;
        }else {
          const threadImage3 = document.querySelector(".thread" + id + "-image3");
          threadImage3.style.display = "block";
        }
      }
      if(threadImageIndex === 2){
        const threadImage3 = document.querySelector(".thread" + id + "-image3");
        if(threadImage3 != null) {
          threadImage3.style.display = "none";
        }    
        if(checkIfPrevEmpty(id, threadImageIndex)) {
          threadImageIndex = threadImageIndex - 1;
        }else {
          const threadImage2 = document.querySelector(".thread" + id + "-image2");
          threadImage2.style.display = "block";
        }
      }
      if(threadImageIndex === 1){
        const threadImage2 = document.querySelector(".thread" + id + "-image2");
        if(threadImage2 != null) {
          threadImage2.style.display = "none";
        }    
        if(checkIfPrevEmpty(id, threadImageIndex)) {
          threadImageIndex = threadImageIndex - 1;
        }else {
          const threadImage1 = document.querySelector(".thread" + id + "-image1");
          threadImage1.style.display = "block";
        }
      }
      if(threadImageIndex === 0) {
        const threadImage1 = document.querySelector(".thread" + id + "-image1");
        if(threadImage1 != null) {
          threadImage1.style.display = "none";
        }    
        if(checkIfPrevEmpty(id, threadImageIndex)) {
            threadImageIndex = threadImageIndex - 1;            
            threadImageIndex = (threadImageIndex + MAX_NUMBER_OF_IMAGES) % MAX_NUMBER_OF_IMAGES;
            threadImageIndex = prevIndexTester(id, threadImageIndex);
        }else {
          const threadImage5 = document.querySelector(".thread" + id + "-image5");
          threadImage5.style.display = "block";
        }    
      }
    return threadImageIndex
}

const prevSlide = function(id) {
  const thisThreadImages = document.querySelector(".thread" + id + "-images");
  //There is an alt variable that contains the picture index attached to thread$id-images
  let threadImageIndex = thisThreadImages.getAttribute("alt");
  threadImageIndex = parseInt(threadImageIndex);     
  threadImageIndex = prevIndexTester(id, threadImageIndex);
  threadImageIndex = threadImageIndex + MAX_NUMBER_OF_IMAGES - 1;
  // modulus 4 to keep it from going over
  threadImageIndex = threadImageIndex % MAX_NUMBER_OF_IMAGES;
  thisThreadImages.setAttribute("alt", threadImageIndex);
}

const getIdAndImageNumber = function(classString) {
    const numbers = classString.match(/\d+/g);       
    return numbers;
}
const displayFirstImage = function(id, imageNumber) {
    const firstImage = document.querySelector(".thread" + id + "-image" + imageNumber);
    firstImage.style.display = "block";
}
const setImageIndex = function(id, imageNumber) {
    const threadImages = document.querySelector('.thread' + id + '-images');
    console.log(threadImages);
    threadImages.setAttribute('alt', imageNumber-1);
}
//on initial load of website displays first image in each thread
window.onload = function() {
    const allThreads = document.querySelectorAll(".thread");    
    for(let i = 0; i < allThreads.length; i++) {      
      const threadImagesDiv = allThreads[i].querySelector('div');      
      const nestedImgFirst =  threadImagesDiv.querySelector('img');
      if(nestedImgFirst != null) {        
        const classString = nestedImgFirst.getAttribute('class');
        const idAndImageNumber = getIdAndImageNumber(classString); 
        const id = idAndImageNumber[0];
        const imageNumber = idAndImageNumber[1];        
        displayFirstImage(id, imageNumber);
        setImageIndex(id, imageNumber);
      }
    }
};