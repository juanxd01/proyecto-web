let modal_btn = document.querySelectorAll("[data-target]");
let modals = document.querySelectorAll(".modal");
let edit_records = document.querySelectorAll('.edit-record');
let delete_records = document.querySelectorAll('.delete');
let locations = document.querySelectorAll("[location]");

delete_records.forEach(btn => {
    btn.addEventListener('click', () => {
        let id = btn.parentElement.parentElement.getAttribute('id_record');
        document.querySelector('#modal-delete').setAttribute("id_record", id);
    })
})

locations.forEach(div => {
    div.addEventListener('click', () => {
        location.href = div.getAttribute('location');
    });
});

edit_records.forEach(td => {
    td.addEventListener('click', () => {
        if(td.hasAttribute('editing')) return;
        let input = document.createElement('input');
        let value = td.textContent;
        let table = td.parentElement.getAttribute('table');
        let id = td.parentElement.getAttribute('id_record');
        let id_name = td.parentElement.getAttribute('id_name');
        let field = td.getAttribute("field");
        td.setAttribute('editing', 'true');
        td.textContent = '';
        td.append(input);
        input.focus();
        input.addEventListener('blur', () =>{
            td.textContent = value;
            td.removeAttribute('editing');
            input.remove();
        })
        input.addEventListener('keydown', (e) => {
            if(e.keyCode == 13 && input.value != ''){
                let data = new FormData();
                data.append('id_name', id_name);
                data.append('id', id);
                data.append('table', table);
                data.append('value', input.value);
                data.append('field', field);
                fetch('/ajax/update.php', {
                    method: 'POST',
                    body: data
                })
                .then(function(response) {
                    if(response.ok){
                        return response.text();
                    } else {
        
                    }
                })
                .then(function(text) {
                    console.log(text);
                    if(text == "OK"){
                        td.removeAttribute('editing');
                        td.textContent = input.value;
                    } else {
                        //errorCodes(text);
                    }
                })
                .catch(function(err){
                    console.log(err);
                }); 
            }
        })
    });
});

modal_btn.forEach(btn => {
    btn.addEventListener('click', () => {
        let modal_id = btn.getAttribute("data-target");
        let modal = document.querySelector("#"+modal_id);
        showModal(modal);
    });
});

modals.forEach(modal => {
    modal.addEventListener('click', (e) => {
        if(e.target == modal) hideModal(modal);
    });
});

document.querySelector(".jsFilter").addEventListener("click", function () {
    document.querySelector(".filter-menu").classList.toggle("active");
});
  
document.querySelector(".grid").addEventListener("click", function () {
    document.querySelector(".list").classList.remove("active");
    document.querySelector(".grid").classList.add("active");
    document.querySelector(".products-area-wrapper").classList.add("gridView");
    document
      .querySelector(".products-area-wrapper")
      .classList.remove("tableView");
});
  
document.querySelector(".list").addEventListener("click", function () {
    document.querySelector(".list").classList.add("active");
    document.querySelector(".grid").classList.remove("active");
    document.querySelector(".products-area-wrapper").classList.remove("gridView");
    document.querySelector(".products-area-wrapper").classList.add("tableView");
});
  
var modeSwitch = document.querySelector('.mode-switch');
modeSwitch.addEventListener('click', function () {                      
    document.documentElement.classList.toggle('light');
    modeSwitch.classList.toggle('active');
});

function hideModal(modal){
    let modal_body = modal.querySelector('.modal-body');
    modal.style.display = 'none';
    modal.classList.add('show');
    modal_body.classList.add('show-modal');
}

function showModal(modal){
    let modal_body = modal.querySelector('.modal-body');
    modal.style.display = 'block';
    modal.classList.add('show');
    modal_body.classList.add('show-modal');
}

function confirmDelete(el){
    let id = el.parentElement.parentElement.parentElement.getAttribute('id_record');
    let id_name = el.parentElement.parentElement.parentElement.getAttribute('id_name');
    let table = el.parentElement.parentElement.parentElement.getAttribute('table');
    let data = new FormData();
    data.append('id', id);
    data.append('id_name', id_name);
    data.append('table', table);
    fetch('/ajax/delete.php', {
        method: 'POST',
        body: data
    })
    .then(function(response) {
        if(response.ok){
            return response.text();
        } else {

        }
    })
    .then(function(text) {
        console.log(text);
        if(text == "OK"){
            location.reload();
        } else {
            //errorCodes(text);
        }
    })
    .catch(function(err){
        console.log(err);
    }); 
}