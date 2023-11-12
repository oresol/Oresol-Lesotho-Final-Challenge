let indexedDB = window.indexedDB || window.mozIndexDB || window.webkitIndexDB || window.msIndexDB


document.addEventListener("DOMContentLoaded", function(){
    document.querySelectorAll('.sidebar .nav-link').forEach(function(element){
      
      element.addEventListener('click', function (e) {
  
        let nextEl = element.nextElementSibling;
        let parentEl  = element.parentElement;	
  
          if(nextEl) {
              e.preventDefault();	
              let mycollapse = new bootstrap.Collapse(nextEl);
              
              if(nextEl.classList.contains('show')){
                mycollapse.hide();
              } else {
                  mycollapse.show();
                  var opened_submenu = parentEl.parentElement.querySelector('.submenu.show');
                  if(opened_submenu){
                    new bootstrap.Collapse(opened_submenu);
                  }
              }
          }
      }); 
    })
  }); 


const setFlag = (e)=> {
    if(e == "home"|| e == "select" || e == "home" || "create")
    {
        var request = indexedDB.deleteDatabase('MyDbase')
        request.onsuccess = ()=>{
            console.log("Deleted Databsee")
        }
    }
    localStorage.setItem('flag', e);
}

const resetStorage = ()=>{
  console.log("herere out")
  var request = indexedDB.deleteDatabase('MyDbase')
  localStorage.clear();

}

const loggedIn = ()=>{
  console.log("herere in")
  localStorage.setItem('flag', 'home'); 
}