<?php
require_once __DIR__ . '/app/core/constants.php';
?>
<!DOCTYPE html>
<html lang="fa" dir="rtl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>پنل حسابداری شخصی</title>

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.rtl.min.css" rel="stylesheet" integrity="sha384-dpuaG1suU0eT09BZpEylU3++rBEnDkuTbGdsxbkwGylAdJfIZczẹ̀pOqn/ck+Co+" crossorigin="anonymous">
    <!-- Bootstrap Icons -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
    <!-- Custom CSS -->
    <link rel="stylesheet" href="<?= BASE_URL ?>/public/assets/css/style.css">

    <link href="https://fonts.googleapis.com/icon?family=Material+Icons+Sharp" rel="stylesheet">

</head>
<body data-bs-theme="dark">

<div class="d-flex">
    <!-- Sidebar -->
    <nav class="sidebar">
        <div class="sidebar-header">
            <a href="#" class="sidebar-brand">
                <i class="bi bi-wallet2 me-2"></i>
                حسابداری من
            </a>
        </div>
        <ul class="nav flex-column sidebar-nav">
            <li class="nav-item">
                <a class="nav-link active" href="#" data-page="dashboard">
                    <i class="bi bi-grid-1x2-fill"></i>
                    <span>داشبورد</span>
                </a>
            </li>

            <!-- Income Management Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#income-menu" role="button" aria-expanded="false" aria-controls="income-menu">
                    <i class="bi bi-cash-coin"></i>
                    <span>مدیریت درآمد</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="income-menu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-page="add-income"><i class="bi bi-plus-circle"></i> افزودن درآمد</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-page="manage-income"><i class="bi bi-pencil-square"></i> لیست درآمدها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-page="add-income-category"><i class="bi bi-tags"></i> افزودن دسته‌بندی</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Expense Management Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#expense-menu" role="button" aria-expanded="false" aria-controls="expense-menu">
                    <i class="bi bi-credit-card-2-front-fill"></i>
                    <span>مدیریت مخارج</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="expense-menu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-page="add-expense"><i class="bi bi-plus-circle"></i> افزودن هزینه</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-page="manage-expense"><i class="bi bi-pencil-square"></i> لیست هزینه‌ها</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-page="add-expense-category"><i class="bi bi-tags"></i> افزودن دسته‌بندی</a>
                        </li>
                    </ul>
                </div>
            </li>

            <!-- Savings & Goals Menu -->
            <li class="nav-item">
                <a class="nav-link collapsed" data-bs-toggle="collapse" href="#savings-menu" role="button" aria-expanded="false" aria-controls="savings-menu">
                    <i class="bi bi-piggy-bank-fill"></i>
                    <span>پس‌انداز و اهداف</span>
                    <i class="bi bi-chevron-down ms-auto"></i>
                </a>
                <div class="collapse" id="savings-menu">
                    <ul class="nav flex-column ms-3">
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-page="add-goal"><i class="bi bi-bullseye"></i> افزودن هدف مالی</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="#" data-page="vault"><i class="bi bi-safe2-fill"></i> صندوق پس‌انداز</a>
                        </li>
                    </ul>
                </div>
            </li>
        </ul>
    </nav>

    <!-- Main Content Wrapper -->
    <div class="main-content-wrapper">
        <!-- Header for Mobile Toggle -->
        <header class="main-header">
            <button class="btn btn-dark d-lg-none" id="sidebar-toggle">
                <i class="bi bi-list"></i>
            </button>
            <h5 class="mb-0 page-title">داشبورد</h5>
        </header>

        <!-- Main Content Area -->
        <main class="container-fluid p-4">

            <!-- Page: Dashboard (Visible by default) -->
            <div id="dashboard" class="content-page">
                <!-- Monthly Summary Cards from previous version -->
                <section class="row g-4 mb-4">
                    <div class="col-md-6">
                        <div class="card text-bg-dark h-100">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between"><span><i class="bi bi-graph-up-arrow text-success"></i> خلاصه درآمد ماهانه</span><span class="fs-6 text-muted">فروردین ۱۴۰۳</span></h5>
                                <p class="card-text display-5 fw-bold text-success">۴۰,۰۰۰,۰۰۰ <small class="fs-6">تومان</small></p>
                                <div class="d-flex align-items-center text-success"><i class="bi bi-arrow-up-short"></i><span class="me-1">۵.۲٪+</span><span class="text-white-50 small me-1">نسبت به ماه قبل</span></div>
                            </div>
                            <div class="card-footer bg-transparent border-top-0"><canvas id="incomeChart"></canvas></div>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="card text-bg-dark h-100">
                            <div class="card-body">
                                <h5 class="card-title d-flex justify-content-between"><span><i class="bi bi-graph-down-arrow text-danger"></i> خلاصه مخارج ماهانه</span><span class="fs-6 text-muted">فروردین ۱۴۰۳</span></h5>
                                <p class="card-text display-5 fw-bold text-danger">۱۵,۵۰۰,۰۰۰ <small class="fs-6">تومان</small></p>
                                <div class="d-flex align-items-center text-danger"><i class="bi bi-arrow-down-short"></i><span class="me-1">۱۲.۷٪-</span><span class="text-white-50 small me-1">نسبت به ماه قبل</span></div>
                            </div>
                            <div class="card-footer bg-transparent border-top-0"><canvas id="expenseChart"></canvas></div>
                        </div>
                    </div>
                </section>
                <!-- ========== START OF NEW CREATIVE BOXES SECTION WITH PLACEHOLDER DATA ========== -->
                <div class="insights-grid">

                    <!-- بخش خلاصه وضعیت -->
                    <div class="overview-card">
                        <h4>
                            خلاصه هفتگی مخارج
                        </h4>
                        <p>
                            نگاهی سریع به هزینه‌های شما در هفته جاری.
                        </p>

                        <!-- لیست مخارج روزانه -->
                        <div class="weekly-expenses-list">
                            <ul>
                                <!-- آیتم برای هر روز هفته -->
                                <li class="weekly-expense-item">
                                    <div class="day-info">
                                        <span class="day-name">شنبه</span>
                                        <span class="day-amount">۱۲۰,۰۰۰ تومان</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="expense" aria-valuenow="40" aria-valuemin="0" aria-valuemax="100" style="height: 6px">
                                        <div class="progress-bar bg-warning" style="width: 40%"></div>
                                    </div>
                                </li>
                                <!-- پایان آیتم -->

                                <li class="weekly-expense-item">
                                    <div class="day-info">
                                        <span class="day-name">یکشنبه</span>
                                        <span class="day-amount">۴۵,۰۰۰ تومان</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="expense" aria-valuenow="15" aria-valuemin="0" aria-valuemax="100" style="height: 6px">
                                        <div class="progress-bar bg-warning" style="width: 15%"></div>
                                    </div>
                                </li>

                                <li class="weekly-expense-item">
                                    <div class="day-info">
                                        <span class="day-name">دوشنبه</span>
                                        <span class="day-amount">۳۱۰,۰۰۰ تومان</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="expense" aria-valuenow="85" aria-valuemin="0" aria-valuemax="100" style="height: 6px">
                                        <div class="progress-bar bg-danger" style="width: 85%"></div>
                                    </div>
                                </li>

                                <li class="weekly-expense-item">
                                    <div class="day-info">
                                        <span class="day-name">سه‌شنبه</span>
                                        <span class="day-amount">۰ تومان</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="expense" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100" style="height: 6px">
                                        <div class="progress-bar bg-secondary" style="width: 0%"></div>
                                    </div>
                                </li>

                                <li class="weekly-expense-item">
                                    <div class="day-info">
                                        <span class="day-name">چهارشنبه</span>
                                        <span class="day-amount">۸۰,۰۰۰ تومان</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="expense" aria-valuenow="30" aria-valuemin="0" aria-valuemax="100" style="height: 6px">
                                        <div class="progress-bar bg-warning" style="width: 30%"></div>
                                    </div>
                                </li>

                                <li class="weekly-expense-item">
                                    <div class="day-info">
                                        <span class="day-name">پنجشنبه</span>
                                        <span class="day-amount">۱۷۵,۰۰۰ تومان</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="expense" aria-valuenow="55" aria-valuemin="0" aria-valuemax="100" style="height: 6px">
                                        <div class="progress-bar bg-warning" style="width: 55%"></div>
                                    </div>
                                </li>

                                <li class="weekly-expense-item">
                                    <div class="day-info">
                                        <span class="day-name">جمعه</span>
                                        <span class="day-amount">۲۵,۰۰۰ تومان</span>
                                    </div>
                                    <div class="progress" role="progressbar" aria-label="expense" aria-valuenow="10" aria-valuemin="0" aria-valuemax="100" style="height: 6px">
                                        <div class="progress-bar bg-success" style="width: 10%"></div>
                                    </div>
                                </li>
                            </ul>
                            <!-- کد جدید برای افزودن به انتهای کارت خلاصه -->
                            <div class="weekly-category-summary">
                                <hr>
                                <!-- یک خط جداکننده برای زیبایی -->
                                <h5 class="category-summary-title">
                                    مخارج بر اساس دسته‌بندی (هفتگی)
                                </h5>
                                <div class="category-badges-container">
                                    <!-- نمونه دسته‌بندی ۱: خوراک -->
                                    <div class="category-badge" style="background-color: #ffc10740; color: #ffc107;">
                                        <i class="bi bi-egg-fried"></i>
                                        <span>
                                            خوراک: ۳۵۰,۰۰۰
                                        </span>
                                    </div>

                                    <!-- نمونه دسته‌بندی ۲: حمل و نقل -->
                                    <div class="category-badge" style="background-color: #0dcaf040; color: #0dcaf0;">
                                        <i class="bi bi-train-front"></i>
                                        <span>
                                            حمل و نقل: ۱۵۰,۰۰۰
                                        </span>
                                    </div>

                                    <!-- نمونه دسته‌بندی ۳: قبوض -->
                                    <div class="category-badge" style="background-color: #fd7e1440; color: #fd7e14;">
                                        <i class="bi bi-receipt"></i>
                                        <span>
                                            قبوض: ۱۰۰,۰۰۰
                                        </span>
                                    </div>

                                    <!-- نمونه دسته‌بندی ۴: تفریح -->
                                    <div class="category-badge" style="background-color: #d6338440; color: #d63384;">
                                        <i class="bi bi-film"></i>
                                        <span>
                                            تفریح: ۱۲۵,۰۰۰
                                        </span>
                                    </div>
                                </div>
                            </div>

                        </div>

                    </div>
                    <!-- پایان بخش خلاصه وضعیت -->


                    <!-- بخش آخرین تراکنش‌ها -->
                    <div class="latest-transactions-card">
                        <h2>آخرین تراکنش‌ها</h2>
                        <div class="transactions-list">

                            <!-- داده نمونه 1: غذا -->
                            <div class="transaction-item">
                                <div class="icon food">
                                    <span class="material-icons-sharp">restaurant</span>
                                </div>
                                <div class="transaction-details">
                                    <div class="title">شام در رستوران</div>
                                    <div class="date">2023-10-27</div>
                                </div>
                                <div class="amount">۳۵۰,۰۰۰-</div>
                            </div>

                            <!-- داده نمونه 2: حمل و نقل -->
                            <div class="transaction-item">
                                <div class="icon transport">
                                    <span class="material-icons-sharp">directions_car</span>
                                </div>
                                <div class="transaction-details">
                                    <div class="title">بنزین خودرو</div>
                                    <div class="date">2023-10-27</div>
                                </div>
                                <div class="amount">۱۲۰,۰۰۰-</div>
                            </div>

                            <!-- داده نمونه 3: تفریح -->
                            <div class="transaction-item">
                                <div class="icon entertainment">
                                    <span class="material-icons-sharp">sports_esports</span>
                                </div>
                                <div class="transaction-details">
                                    <div class="title">بلیط سینما</div>
                                    <div class="date">2023-10-26</div>
                                </div>
                                <div class="amount">۱۸۰,۰۰۰-</div>
                            </div>

                            <!-- داده نمونه 4: متفرقه -->
                            <div class="transaction-item">
                                <div class="icon misc">
                                    <span class="material-icons-sharp">priority_high</span>
                                </div>
                                <div class="transaction-details">
                                    <div class="title">خرید کتاب</div>
                                    <div class="date">2023-10-25</div>
                                </div>
                                <div class="amount">۲۴۰,۰۰۰-</div>
                            </div>

                            <!-- داده نمونه 5: غذا -->
                            <div class="transaction-item">
                                <div class="icon food">
                                    <span class="material-icons-sharp">restaurant</span>
                                </div>
                                <div class="transaction-details">
                                    <div class="title">خرید هفتگی از فروشگاه</div>
                                    <div class="date">2023-10-24</div>
                                </div>
                                <div class="amount">۵۹۰,۰۰۰-</div>
                            </div>

                        </div>
                    </div>
                    <!-- پایان بخش آخرین تراکنش‌ها -->

                </div>
                <!-- ========== END OF NEW CREATIVE BOXES SECTION ========== -->

                <!-- Yearly Report from previous version -->
                <section>
                    <h3 class="mb-3">
                        <i class="bi bi-calendar-month me-2"></i>
                        گزارش سالانه به تفکیک ماه
                    </h3>
                    <div class="table-responsive">
                        <table class="table table-dark table-hover table-striped align-middle text-center">
                            <thead>
                            <tr>
                                <th scope="col">ماه</th>
                                <th scope="col" class="text-success">کل درآمد</th>
                                <th scope="col" class="text-danger">کل مخارج</th>
                                <th scope="col" class="text-danger">هزینه حمل و نقل</th>
                                <th scope="col" class="text-danger">هزینه تفریحات</th>
                                <th scope="col" class="text-danger">هزینه خوراک</th>
                                <th scope="col" class="text-info">مانده</th>
                            </tr>
                            </thead>
                            <tbody>
                            <tr>
                                <td>فروردین</td>
                                <td class="text-success">۴۰,۰۰۰,۰۰۰</td>
                                <td class="text-danger">۱۵,۵۰۰,۰۰۰</td>
                                <td class="text-danger">۱,۲۰۰,۰۰۰</td>
                                <td class="text-danger">۲,۰۰۰,۰۰۰</td>
                                <td class="text-danger">۴,۵۰۰,۰۰۰</td>
                                <td class="text-info">۲۴,۵۰۰,۰۰۰</td>
                            </tr>
                            <tr>
                                <td>اسفند</td>
                                <td class="text-success">۳۸,۰۰۰,۰۰۰</td>
                                <td class="text-danger">۱۷,۷۵۰,۰۰۰</td>
                                <td class="text-danger">۹۵۰,۰۰۰</td>
                                <td class="text-danger">۳,۵۰۰,۰۰۰</td>
                                <td class="text-danger">۵,۱۰۰,۰۰۰</td>
                                <td class="text-info">۲۰,۲۵۰,۰۰۰</td>
                            </tr>
                            <tr>
                                <td>بهمن</td>
                                <td class="text-success">۳۹,۵۰۰,۰۰۰</td>
                                <td class="text-danger">۱۴,۰۰۰,۰۰۰</td>
                                <td class="text-danger">۱,۱۰۰,۰۰۰</td>
                                <td class="text-danger">۱,۵۰۰,۰۰۰</td>
                                <td class="text-danger">۴,۰۰۰,۰۰۰</td>
                                <td class="text-info">۲۵,۵۰۰,۰۰۰</td>
                            </tr>
                            </tbody>
                        </table>
                    </div>
                </section>

            </div>

            <!-- Page: Add Income -->
            <div id="add-income" class="content-page" style="display: none;">
                <div class="card text-bg-dark"><div class="card-header"><h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>فرم افزودن درآمد جدید</h5></div><div class="card-body"><form><div class="row g-3"><div class="col-md-6"><label for="income-amount" class="form-label">مبلغ (تومان)</label><input type="number" class="form-control" id="income-amount" placeholder="مثلا: 2500000" required></div><div class="col-md-6"><label for="income-date" class="form-label">تاریخ</label><input type="text" class="form-control" id="income-date" placeholder="مثلا: ۱۴۰۳/۰۲/۱۵" required></div><div class="col-md-12"><label for="income-category" class="form-label">دسته بندی درآمد</label><select class="form-select" id="income-category"><option value="salary">حقوق</option><option value="project">پروژه</option><option value="gift">هدیه</option></select></div><div class="col-12"><button type="submit" class="btn btn-success w-100"><i class="bi bi-check-circle me-2"></i>ثبت درآمد</button></div></div></form></div></div>
            </div>

            <!-- Page: Manage Income -->
            <div id="manage-income" class="content-page" style="display: none;">
                <div class="card text-bg-dark"><div class="card-header"><h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>لیست درآمدها</h5></div><div class="card-body"><div class="table-responsive"><table class="table table-dark table-hover align-middle"><thead><tr><th>مبلغ</th><th>دسته بندی</th><th>تاریخ</th><th class="text-center">عملیات</th></tr></thead><tbody><tr><td>۱۰,۰۰۰,۰۰۰ تومان</td><td>حقوق</td><td>۱۴۰۳/۰۲/۰۵</td><td class="text-center"><button class="btn btn-sm btn-outline-warning me-2"><i class="bi bi-pencil-fill"></i> ویرایش</button><button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i> حذف</button></td></tr><tr><td>۲,۵۰۰,۰۰۰ تومان</td><td>پروژه</td><td>۱۴۰۳/۰۲/۱۱</td><td class="text-center"><button class="btn btn-sm btn-outline-warning me-2"><i class="bi bi-pencil-fill"></i> ویرایش</button><button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i> حذف</button></td></tr></tbody></table></div></div></div>
            </div>

            <!-- Page: Add Income Category -->
            <div id="add-income-category" class="content-page" style="display: none;">
                <div class="card text-bg-dark"><div class="card-header"><h5 class="mb-0"><i class="bi bi-tags me-2"></i>افزودن دسته‌بندی جدید برای درآمد</h5></div><div class="card-body"><form><div class="mb-3"><label for="new-income-cat" class="form-label">نام دسته‌بندی</label><input type="text" class="form-control" id="new-income-cat" placeholder="مثلا: فروش آنلاین" required></div><button type="submit" class="btn btn-primary">افزودن</button></form></div></div>
            </div>

            <!-- Page: Add Expense -->
            <div id="add-expense" class="content-page" style="display: none;">
                <div class="card text-bg-dark"><div class="card-header"><h5 class="mb-0"><i class="bi bi-plus-circle me-2"></i>فرم افزودن هزینه جدید</h5></div><div class="card-body"><form><div class="row g-3"><div class="col-md-6"><label for="exp-amount" class="form-label">مبلغ (تومان)</label><input type="number" class="form-control" id="exp-amount" placeholder="مثلا: 50000" required></div><div class="col-md-6"><label for="exp-date" class="form-label">تاریخ</label><input type="text" class="form-control" id="exp-date" placeholder="مثلا: ۱۴۰۳/۰۲/۱۵" required></div><div class="col-md-12"><label for="exp-category" class="form-label">دسته بندی هزینه</label><select class="form-select" id="exp-category"><option value="transport">حمل و نقل</option><option value="food">خوراک</option><option value="bills">قبوض</option></select></div><div class="col-md-12"><label class="form-label d-block">اولویت</label><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="exp-priority" id="exp-essential" value="essential" checked><label class="form-check-label" for="exp-essential">ضروری</label></div><div class="form-check form-check-inline"><input class="form-check-input" type="radio" name="exp-priority" id="exp-non-essential" value="non-essential"><label class="form-check-label" for="exp-non-essential">غیر ضروری</label></div></div><div class="col-12"><button type="submit" class="btn btn-danger w-100"><i class="bi bi-check-circle me-2"></i>ثبت هزینه</button></div></div></form></div></div>
            </div>

            <!-- Page: Manage Expense -->
            <div id="manage-expense" class="content-page" style="display: none;">
                <div class="card text-bg-dark"><div class="card-header"><h5 class="mb-0"><i class="bi bi-pencil-square me-2"></i>لیست هزینه‌ها</h5></div><div class="card-body"><div class="table-responsive"><table class="table table-dark table-hover align-middle"><thead><tr><th>مبلغ</th><th>دسته بندی</th><th>اولویت</th><th>تاریخ</th><th class="text-center">عملیات</th></tr></thead><tbody><tr><td>۵۰,۰۰۰ تومان</td><td>حمل و نقل</td><td><span class="badge text-bg-danger">ضروری</span></td><td>۱۴۰۳/۰۲/۱۲</td><td class="text-center"><button class="btn btn-sm btn-outline-warning me-2"><i class="bi bi-pencil-fill"></i> ویرایش</button><button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i> حذف</button></td></tr><tr><td>۱۲۰,۰۰۰ تومان</td><td>تفریحات</td><td><span class="badge text-bg-info">غیر ضروری</span></td><td>۱۴۰۳/۰۲/۱۰</td><td class="text-center"><button class="btn btn-sm btn-outline-warning me-2"><i class="bi bi-pencil-fill"></i> ویرایش</button><button class="btn btn-sm btn-outline-danger"><i class="bi bi-trash-fill"></i> حذف</button></td></tr></tbody></table></div></div></div>
            </div>

            <!-- Page: Add Expense Category -->
            <div id="add-expense-category" class="content-page" style="display: none;">
                <div class="card text-bg-dark"><div class="card-header"><h5 class="mb-0"><i class="bi bi-tags me-2"></i>افزودن دسته‌بندی جدید برای هزینه</h5></div><div class="card-body"><form><div class="mb-3"><label for="new-expense-cat" class="form-label">نام دسته‌بندی</label><input type="text" class="form-control" id="new-expense-cat" placeholder="مثلا: پوشاک" required></div><button type="submit" class="btn btn-primary">افزودن</button></form></div></div>
            </div>

            <!-- Page: Add Financial Goal -->
            <div id="add-goal" class="content-page" style="display: none;">
                <div class="card text-bg-dark"><div class="card-header"><h5 class="mb-0"><i class="bi bi-bullseye me-2"></i>تعریف هدف مالی جدید</h5></div><div class="card-body"><form><div class="row g-3"><div class="col-md-12"><label for="goal-name" class="form-label">عنوان هدف</label><input type="text" class="form-control" id="goal-name" placeholder="مثلا: خرید لپ‌تاپ جدید" required></div><div class="col-md-6"><label for="goal-amount" class="form-label">مبلغ هدف (تومان)</label><input type="number" class="form-control" id="goal-amount" placeholder="60000000" required></div><div class="col-md-6"><label for="goal-date" class="form-label">تاریخ هدف</label><input type="text" class="form-control" id="goal-date" placeholder="مثلا: ۱۴۰۳/۱۲/۲۹" required></div><div class="col-12"><button type="submit" class="btn btn-info w-100"><i class="bi bi-flag-fill me-2"></i>ثبت هدف</button></div></div></form></div></div>
            </div>

            <!-- Page: Vault -->
            <div id="vault" class="content-page" style="display: none;">
                <div class="row g-4">
                    <div class="col-lg-7">
                        <div class="card text-bg-dark h-100"><div class="card-header"><h5 class="mb-0"><i class="bi bi-safe2-fill me-2"></i>صندوق پس‌انداز</h5></div><div class="card-body"><p>در این بخش می‌توانید مبالغی را به پس‌انداز کل خود اضافه کنید.</p><form><div class="input-group mb-3"><input type="number" class="form-control" placeholder="مبلغ مورد نظر برای افزودن به پس‌انداز"><button class="btn btn-primary" type="button">افزودن</button></div></form><hr><h6 class="mt-4">موجودی فعلی صندوق:</h6><p class="display-6 text-info">۵,۰۰۰,۰۰۰ <small class="fs-6">تومان</small></p></div></div>
                    </div>
                    <div class="col-lg-5">
                        <div class="card text-bg-dark h-100"><div class="card-header"><h5 class="mb-0"><i class="bi bi-reception-4 text-warning"></i> قیمت روز طلا</h5></div><div class="card-body text-center d-flex flex-column justify-content-center"><div id="gold-price-loader"><div class="spinner-border text-warning" role="status"><span class="visually-hidden">Loading...</span></div><p class="mt-2">در حال بارگذاری قیمت...</p></div><div id="gold-price-content" class="d-none"><h6>هر گرم طلای ۱۸ عیار</h6><p class="display-5 fw-bold text-warning" id="gold-price-value">۳,۳۵۰,۰۰۰</p><p class="text-white-50 small" id="gold-price-update-time">آخرین بروزرسانی: چند لحظه پیش</p></div></div></div>
                    </div>
                </div>
            </div>
        </main>
    </div>
</div>


<!-- Bootstrap JS Bundle -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<!-- Chart.js -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<!-- Custom JS -->
<script src="<?= BASE_URL ?>/public/assets/js/script.js"></script>

</body>
</html>
