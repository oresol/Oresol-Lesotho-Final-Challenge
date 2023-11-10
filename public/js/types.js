const editItem = (e)=>{
    const item = document.getElementById(e.id);
    item.remove();

    const formId = e.id+"fm"
    const form = document.getElementById(formId);
    form.style.display = 'block'
}