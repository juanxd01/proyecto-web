let cart_section = document.querySelector(".cart-section");
let cart_content = document.querySelector(".cart-content");
let modal_btn = document.querySelectorAll("[data-target]");
let modals = document.querySelectorAll(".modal");
let login_form = document.querySelector(".login-form");
let signup_form = document.querySelector(".signup-form");
let locations = document.querySelectorAll("[location]");
let btns_cart = document.querySelectorAll(".btn-cart");
let carts_products = document.querySelector(".cart-product-content");
let slideIndex = 1;
let forms = document.querySelectorAll('form[ajax]');

if(document.getElementsByClassName("mySlides").length > 0){
    showSlides(slideIndex);

    setInterval(() => {
        slideIndex += 1;
        showSlides(slideIndex);
    }, 3000);
}

forms.forEach(form => {
    form.addEventListener('submit', (e) => {
        e.preventDefault();
        let data = new FormData(form);
        let action = form.action;
        let canReload = (form.hasAttribute('reload')) ? true: false;
        fetch(action, {
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
                if(form.hasAttribute('target-dismiss')) hideModal(document.querySelector('#' + form.getAttribute('target-dismiss')));
                if(form.hasAttribute('message')) toastr.success(form.getAttribute('message'))
                if(canReload) location.reload();
                form.clear();
            } else {
                errorCodes(text);
            }
        })
        .catch(function(err){
            console.log(err);
        });

    });
});

btns_cart.forEach(btn => {
    btn.addEventListener('click', () => {
        if(document.querySelector(".quantity")) {
            let id = btn.getAttribute("id_record");
            addCart(id, document.querySelector(".quantity").value);
        } else {
            let id = btn.parentElement.parentElement.getAttribute('id_product');  
            addCart(id);
        }
    });
});

locations.forEach(div => {
    div.addEventListener('click', () => {
        location.href = div.getAttribute('location');
    });
});

modals.forEach(modal => {
    modal.addEventListener('click', (e) => {
        if(e.target == modal) hideModal(modal);
    });
});

modal_btn.forEach(btn => {
    btn.addEventListener('click', () => {
        let modal_id = btn.getAttribute("data-target");
        let modal = document.querySelector("#"+modal_id);
        showModal(modal);
    });
});

cart_section.addEventListener('click', (e) => {
    if(e.target == cart_section){
        hideDisplayCartSection();
    } 
});

function errorCodes(code){
    switch(code){
        case 'BAD_PASS':
            break;
    }
}

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

function hideDisplayCartSection(){
    cart_section.classList.toggle('d-none');
    if(cart_section.classList.contains('d-none')) cart_content.classList.remove('fade-in-cart');
    else cart_content.classList.add('fade-in-cart');
}

function plusSlides(n) {
    showSlides(slideIndex += n);
}

function currentSlide(n) {
    showSlides(slideIndex = n);
}

function showSlides(n) {
    let i;
    let slides = document.getElementsByClassName("mySlides");
    let dots = document.getElementsByClassName("dot");
    if (n > slides.length) {slideIndex = 1}    
    if (n < 1) {slideIndex = slides.length}
    for (i = 0; i < slides.length; i++) {
        slides[i].style.display = "none";  
    }
    for (i = 0; i < dots.length; i++) {
        dots[i].className = dots[i].className.replace(" active", "");
    }
    slides[slideIndex-1].style.display = "block";  
    dots[slideIndex-1].className += " active";
}

function showsignUpForm(){
    signup_form.classList.remove('d-none');
    login_form.classList.add('d-none');
    document.querySelector('.btn-log').classList.remove('btn-form-login-active');
    document.querySelector('.btn-sign').classList.add('btn-form-login-active');
}

function showLoginForm(){
    signup_form.classList.add('d-none');
    login_form.classList.remove('d-none');
    document.querySelector('.btn-log').classList.add('btn-form-login-active');
    document.querySelector('.btn-sign').classList.remove('btn-form-login-active');
}

function addCart(id, quantity = 1){
    let data = new FormData();
    data.append("id_product", id);
    data.append('quantity', quantity);
    fetch('/ajax/add_cart.php', {
        method: 'POST',
        body: data
    })
    .then(function(response) {
    if(response.ok) {
        return response.text()
    } else {
        throw "Error en la llamada Ajax";
    }
    
    })
    .then(function(text) {
        console.log(text)
    let json = JSON.parse(text);
    console.log(json)
    if(json.status == true){
        let cart_count = document.querySelector(".cart-count");
        showToast("Articulo añadido al carrito correctamente");
        cart_count.textContent = parseInt(cart_count.textContent) + 1;
        addCartProduct(json.data[0]);
    } else {
        showModal(document.querySelector("#modal"));
        showToast('Inicia sesión para agregar al carrito');
    }
    })
    .catch(function(err) {
    console.log(err);
    });
}

function deleteProductCart(id, el){
    let data = new FormData();
    data.append("id", id);
    fetch('/ajax/delete_from_cart.php', {
        method: 'POST',
        body: data
    })
    .then(function(response) {
    if(response.ok) {
        return response.text()
    } else {
        throw "Error en la llamada Ajax";
    }
    
    })
    .then(function(text) {
        console.log(text)
        let json = JSON.parse(text);
        console.log(json)
        if(json.status == true){
            showToast("Articulo eliminado correctamente");
            el.parentElement.parentElement.remove();
        } else {
        }
        })
    .catch(function(err) {
    console.log(err);
    });
}

function addCartProduct(data){
    let content = "";
    content += '<div style="line-height: 25px;" class="display-flex flex-direction-row flex-align-items-center mt-2">';
    content += '<div>';
    content += '<img width="25%" height="25%" src="/src/img/cuyo.png">'
    content += '</div>'
    content += '<div>'
    content += '<p><b>'+data.name+'</b></p>';
    content += '<p><b>Cantidad:</b> '+data.quantity+'</p>';
    content += '<p>$'+data.price+'</p>';
    content += '<button onclick="deleteProductCart('+data.cart_prodcut+', this)" class="btn-confirm cursor-pointer">Eliminar</button>';
    content += '</div>';
    content += '</div>';
    carts_products.innerHTML += content;
    setTotal(data);
}

function setTotal(data){
    let t = document.querySelector(".total");
    let actual_value = t.textContent;
    t.textContent = parseInt(actual_value) + (data.quantity * data.price);
}

function showToast(text) {
    var x = document.getElementById("snackbar");
    x.className = "show";
    x.textContent = text;
    setTimeout(function(){ x.className = x.className.replace("show", ""); }, 2200);
}

function filterForm(el, id){
    let type = el.parentElement.getAttribute('filter');
    let form = document.querySelector('.form-filter');
    form.querySelector('input[name="'+type+'"]').value = id;
    form.submit();
}
