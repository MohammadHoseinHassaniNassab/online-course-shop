<div class="bg-dark w-100">
    <div class="container">
        <div class="bg-dark text-white d-flex d-xl-none justify-content-between align-items-center">
            <h2>پنل ادمین</h2>
            <label for="panel-admin-navbar-shower">
                <svg xmlns="http://www.w3.org/2000/svg" width="70" height="70" fill="currentColor" class="bi bi-list" viewBox="0 0 16 16">
                    <path fill-rule="evenodd" d="M2.5 12a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5zm0-4a.5.5 0 0 1 .5-.5h10a.5.5 0 0 1 0 1H3a.5.5 0 0 1-.5-.5z"/>
                </svg>
            </label>
        </div>
    </div>
</div>
<input type="checkbox" id="panel-admin-navbar-shower" hidden>
<aside class="bg-dark text-white p-5 d-flex flex-column justify-content-between my-nav z-3" style="width: 20%; height: 100vh; position: fixed!important; top: 0!important;">
    <div>
        <h2>
            پنل ادمین
        </h2>
        <div class="border my-2"></div>
        <div>
            <label class="nav-link fs-5 fw-bolder" data-bs-toggle="collapse" href="#collapseExample" for="dropdown">
                محصولات
                <input type="checkbox" class="dropdown d-none" id="dropdown">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                </svg>
            </label>
            <div class="collapse" id="collapseExample">
                <ul class="flex-column ps-5">
                    <li class="mt-2"><a href="./admin_panel_add_prodouct.php" class="text-decoration-none">افزودن محصول</a></li>
                    <li class="mt-2"><a href="./admin_panel_prodoucts.php" class="text-decoration-none">ویرایش و حذف محصول</a></li>
                </ul>
            </div>
        </div>
        <div>
            <label class="nav-link fs-5 fw-bolder" data-bs-toggle="collapse" href="#collapseExample1" for="dropdown1">
                کد های تخفیف
                <input type="checkbox" class="dropdown d-none" id="dropdown1">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                </svg>
            </label>
            <div class="collapse" id="collapseExample1">
                <ul class="flex-column ps-5">
                    <li class="mt-2"><a href="" class="text-decoration-none">افزودن کد تخفیف</a></li>
                    <li class="mt-2"><a href="" class="text-decoration-none">حذف کد تخفیف</a></li>
                </ul>
            </div>
        </div>
        <div>
            <label class="nav-link fs-5 fw-bolder" data-bs-toggle="collapse" href="#collapseExample2" for="dropdown2">
                دسته بندی ها
                <input type="checkbox" class="dropdown d-none" id="dropdown2">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                    <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                </svg>
            </label>
            <div class="collapse" id="collapseExample2">
                <ul class="flex-column ps-5">
                    <li class="mt-2"><a href="" class="text-decoration-none">افزودن دسته بندی</a></li>
                    <li class="mt-2"><a href="" class="text-decoration-none">ویرایش دسته بندی</a></li>
                    <li class="mt-2"><a href="" class="text-decoration-none">حذف دسته بندی</a></li>
                </ul>
            </div>
            <div>
                <label class="nav-link fs-5 fw-bolder" data-bs-toggle="collapse" href="#collapseExample3" for="dropdown3">
                    سفارش ها
                    <input type="checkbox" class="dropdown d-none" id="dropdown3">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </label>
                <div class="collapse" id="collapseExample3">
                    <ul class="flex-column ps-5">
                        <li class="mt-2"><a href="" class="text-decoration-none">سفارش های جاری</a></li>
                        <li class="mt-2"><a href="" class="text-decoration-none">سفارش های انجام شده</a></li>
                    </ul>
                </div>
            </div>
            <div>
                <label class="nav-link fs-5 fw-bolder" data-bs-toggle="collapse" href="#collapseExample4" for="dropdown4">
                    بنر های صفحه اصلی
                    <input type="checkbox" class="dropdown d-none" id="dropdown4">
                    <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-fill" viewBox="0 0 16 16">
                        <path d="M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z"/>
                    </svg>
                </label>
                <div class="collapse" id="collapseExample4">
                    <ul class="flex-column ps-5">
                        <li class="mt-2"><a href="./admin_panel_add_banner.php" class="text-decoration-none">افزودن بنر</a></li>
                        <li class="mt-2"><a href="" class="text-decoration-none">حذف بنر</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    <div>
        <div class="border mb-3"></div>
        <div class="dropdown">
            <a href="" data-bs-toggle="dropdown">
                <img src="img/logo.png" alt="" width="15%;">
            </a>
            <ul class="dropdown-menu dropdown-menu-dark">
                <li><a class="dropdown-item" href="#">پروفایل</a></li>
                <li><hr class="dropdown-divider"></li>
                <li><a class="dropdown-item" href="#">خروج</a></li>
            </ul>
        </div>
    </div>
</aside>