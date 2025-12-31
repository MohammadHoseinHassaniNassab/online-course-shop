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
let iden = 0;
document.getElementById("btn_add_row").addEventListener("click", () => {
    if (iden === 0){
        document.getElementById("hint").style.display = "flex";
    }
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
let colors_var = [];
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

let sizes = [];
function size_func(item) {
    if (item.checked) {
        sizes.push(item.value);
        sizes.sort();
        document.getElementById("prodouct_size").value = sizes;
    } else {
        i2 = 0;
        sizes.forEach((part) => {
            if (part == item.value) {
                sizes.splice(i2, 1);
                sizes.sort();
                document.getElementById("prodouct_size").value = sizes;
            }
            i2++;
        })
    }
}