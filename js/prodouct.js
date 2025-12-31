function btn_add_to_cart_shower() {
    document.getElementsByName("color").forEach((item) => {
        if (item.checked) {
            document.getElementById("selected_color").value = item.value;
        }
    })
    document.getElementsByName("size").forEach((item) => {
        if (item.checked) {
            document.getElementById("selected_size").value = item.value;
        }
    })

    let part_color = document.querySelectorAll(".part_color");
    let part_size = document.querySelectorAll(".part_size");
    let i = 0;
    let add = true;
    part_color.forEach(() => {
        if (part_color[i].value === document.getElementById("selected_color").value && part_size[i].value === document.getElementById("selected_size").value) {
            part_size[i].parentElement.style.display = "flex";
            add = false;
        } else {
            part_size[i].parentElement.style.display = "none";
        }
        i++;
    });

    if (add) {
        document.getElementById("btn-add-to-cart").style.display = "block";
    } else {
        document.getElementById("btn-add-to-cart").style.display = "none";
    }
}