i = 0;
document.getElementById("show_password").addEventListener("click", () => {
    if (i === 0){
        document.getElementById("password_login").type = "text";
        document.getElementById("show_password").innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-eye-fill\" viewBox=\"0 0 16 16\">\n" +
            "                <path d=\"M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z\"/>\n" +
            "                <path d=\"M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z\"/>\n" +
            "            </svg>";
        i++
    } else if (i === 1) {
        document.getElementById("password_login").type = "password";
        document.getElementById("show_password").innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-eye-slash-fill\" viewBox=\"0 0 16 16\">\n" +
            "                <path d=\"m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z\"/>\n" +
            "                <path d=\"M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z\"/>\n" +
            "            </svg>";
        i--;
    }
})
document.getElementById("show_password1").addEventListener("click", () => {
    if (i === 0){
        document.getElementById("password_signin").type = "text";
        document.getElementById("show_password1").innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-eye-fill\" viewBox=\"0 0 16 16\">\n" +
            "                <path d=\"M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z\"/>\n" +
            "                <path d=\"M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z\"/>\n" +
            "            </svg>";
        i++
    } else if (i === 1) {
        document.getElementById("password_signin").type = "password";
        document.getElementById("show_password1").innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-eye-slash-fill\" viewBox=\"0 0 16 16\">\n" +
            "                <path d=\"m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z\"/>\n" +
            "                <path d=\"M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z\"/>\n" +
            "            </svg>";
        i--;
    }
})
document.getElementById("show_re_password").addEventListener("click", () => {
    if (i === 0){
        document.getElementById("re_password_signin").type = "text";
        document.getElementById("show_re_password").innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-eye-fill\" viewBox=\"0 0 16 16\">\n" +
            "                <path d=\"M10.5 8a2.5 2.5 0 1 1-5 0 2.5 2.5 0 0 1 5 0z\"/>\n" +
            "                <path d=\"M0 8s3-5.5 8-5.5S16 8 16 8s-3 5.5-8 5.5S0 8 0 8zm8 3.5a3.5 3.5 0 1 0 0-7 3.5 3.5 0 0 0 0 7z\"/>\n" +
            "            </svg>";
        i++
    } else if (i === 1) {
        document.getElementById("re_password_signin").type = "password";
        document.getElementById("show_re_password").innerHTML = "<svg xmlns=\"http://www.w3.org/2000/svg\" width=\"20\" height=\"20\" fill=\"currentColor\" class=\"bi bi-eye-slash-fill\" viewBox=\"0 0 16 16\">\n" +
            "                <path d=\"m10.79 12.912-1.614-1.615a3.5 3.5 0 0 1-4.474-4.474l-2.06-2.06C.938 6.278 0 8 0 8s3 5.5 8 5.5a7.029 7.029 0 0 0 2.79-.588zM5.21 3.088A7.028 7.028 0 0 1 8 2.5c5 0 8 5.5 8 5.5s-.939 1.721-2.641 3.238l-2.062-2.062a3.5 3.5 0 0 0-4.474-4.474L5.21 3.089z\"/>\n" +
            "                <path d=\"M5.525 7.646a2.5 2.5 0 0 0 2.829 2.829l-2.83-2.829zm4.95.708-2.829-2.83a2.5 2.5 0 0 1 2.829 2.829zm3.171 6-12-12 .708-.708 12 12-.708.708z\"/>\n" +
            "            </svg>";
        i--;
    }
})
function login_form_func () {
    document.getElementById("btn-login").classList.add("disabled");
    document.getElementById("btn-signin").classList.remove("disabled");
    document.getElementById("login-form").classList.remove("d-none");
    document.getElementById("signin-form").classList.add("d-none");
}
function signin_form_func () {
    document.getElementById("btn-login").classList.remove("disabled");
    document.getElementById("btn-signin").classList.add("disabled");
    document.getElementById("login-form").classList.add("d-none");
    document.getElementById("signin-form").classList.remove("d-none");
}
document.getElementById("btn_submit_login").addEventListener("click", (event) => {
    if (document.getElementById("user_name_login").value.length <= 2 || document.getElementById("password_login").value.length < 8) {
        document.getElementById("fill-filds-show").checked = true;
        event.preventDefault();
    }
})
document.getElementById("btn_submit_signin").addEventListener("click", (event) => {
    if (document.getElementById("name_signin").value.length <= 2 || document.getElementById("user_name_signin").value.length <= 2 || document.getElementById("password_signin").value.length < 8 || document.getElementById("re_password_signin").value.length < 8 || document.getElementById("phone_number_signin").value.length !== 11) {
        document.getElementById("fill-filds-show").checked = true;
        event.preventDefault();
    } else if (document.getElementById("password_signin").value !== document.getElementById("re_password_signin").value) {
        document.getElementById("password-not-mach-show").checked = true;
        event.preventDefault();
    }
})