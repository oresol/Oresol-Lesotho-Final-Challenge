
const editItem = (id)=>{

    console.log("qwewqewq", id)
    const item = document.getElementById(id);
    item.remove();

    const formId = id+"fm"
    const form = document.getElementById(formId);
    form.style.display = 'block'
}