document.getElementById("prodouct_color").value = JSON.parse(document.getElementById("placeholder").value);
function img_deleter(i) {
    let imgs_url = JSON.parse(document.getElementById("imgs-url").value);
    let delete_url = i.parentElement.firstElementChild.getAttribute("src");
    iden = 0;
    let delete_index = 0;
    imgs_url.forEach((item) => {
        if (item === delete_url) {
            delete_index = iden;
        } else {
            iden++;
        }
    });
    imgs_url.splice(delete_index, 1);
    document.getElementById("imgs-url").value = JSON.stringify(imgs_url);
    i.parentElement.remove();
}
let i = 2;
function input_creator() {
    let print = true;
    document.querySelectorAll(".file-input").forEach((item) => {
        if (item.value === ""){
            print = false;
        }
    })
    if (print){
        let element = document.createElement("div");
        element.classList.add("d-flex","justify-content-center","p-2","border-5","border-bottom","w-100");
        let secelement = document.createElement("input");
        secelement.type = "file";
        secelement.name = "img_url_" + i;
        secelement.setAttribute("onchange", "input_creator()");
        secelement.classList.add("file-input", "form-control");
        element.appendChild(secelement);
        document.getElementById("parent").appendChild(element);
        i++;
    }
}
let iden = document.getElementById("more_description_input_names").value;
document.getElementById("btn_add_row").addEventListener("click", () => {
    document.getElementById("hint").style.display = "flex";
    iden++;
    let parent_div = document.createElement("div");
    parent_div.classList.add("input-group", "w-100", "mt-3");
    let input_1 = document.createElement("input");
    input_1.classList.add("form-control", "bg-light", "w-25");
    input_1.type = "text";
    input_1.name = "more_description_head_" + iden.toString();
    let input_2 = document.createElement("input");
    input_2.classList.add("form-control", "w-75");
    input_2.type = "text";
    input_2.name = "more_description_body_" + iden.toString();
    document.getElementById("more_description_input_names").value = iden.toString();
    parent_div.appendChild(input_1);
    parent_div.appendChild(input_2);
    document.getElementById("more_description_inputs_div").appendChild(parent_div);
});


document.getElementById("btn_remove_row").addEventListener("click", () => {
    if (iden > 0) {
        document.getElementById("more_description_inputs_div").lastChild.remove();
        iden--;
        document.getElementById("more_description_input_names").value = iden.toString();
        if (iden === 0) {
            document.getElementById("hint").style.display = "none";
        }
    }
});

function row_remover(item) {
    item.parentElement.remove();
    iden--;
    document.getElementById("more_description_input_names").value = iden.toString();
    if (iden === 0) {
        document.getElementById("hint").style.display = "none";
    }
}

colors_var = JSON.parse(document.getElementById("placeholder").value);
document.getElementById("prodouct_color").value = colors_var;
colors_var.forEach((item) => {
    document.getElementById(item).checked = true;
});
function colors(item) {
    if (item.checked) {
        colors_var.push(item.value);
        document.getElementById("prodouct_color").value = colors_var;
    } else {
        i2 = 0;
        colors_var.forEach((part) => {
            if (part == item.value) {
                colors_var.splice(i2, 1);
                document.getElementById("prodouct_color").value = colors_var;
            }
            i2++;
        })
    }
}

sizes = JSON.parse(document.getElementById("placeholder_size").value);
document.getElementById("prodouct_size").value = sizes;
sizes.forEach((item) => {
    document.getElementById(item).checked = true;
});
function size_func(item) {
    if (item.checked) {
        sizes.push(item.value);
        sizes.sort();
        document.getElementById("prodouct_size").value = sizes;
    } else {
        i3 = 0;
        sizes.forEach((part) => {
            if (part == item.value) {
                sizes.splice(i3, 1);
                sizes.sort();
                document.getElementById("prodouct_size").value = sizes;
            }
            i3++;
        })
    }
}