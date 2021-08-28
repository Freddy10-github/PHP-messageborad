const messages = document.querySelectorAll('.message');
const editPage = document.querySelector('#edit_page');
const editPageTextarea = document.querySelector('#edit_page textarea');
const editSubmit = document.querySelector('#edit_page button');

function edit(e){
  if(!Array.from(e.target.classList).includes('edit')){
    return ;
  }
  const originMessage = this.querySelector('.text pre');
  editPage.style.transform = 'translateX(0%)';
  editPageTextarea.value=originMessage.innerHTML;
  console.log(e)
  editSubmit.addEventListener('click',function(){
    editPage.style.transform = 'translateX(-100%)';
  })
}
messages.forEach(message =>{
  message.addEventListener('click',edit);
})