<div dir="rtl">
<h1> پروژه فروشگاهی با فریمورک لاراول </h1>
<h1>Laravel Ecommerce Shop </h1>
<hr>

<details open>
<summary><h2>فهرست محتوا</h2></summary>

* [معرفی](#intro)
* [ساختار دیتابیس](#ساختار-دیتابیس)
* [منوی داینامیک سایت](#منوی-داینامیک-سایت)
* [احراز هویت](#احراز-هویت)
* [پنل حرفه ای ادمین](#پنل-حرفه-ای-ادمین)
* [ویژگی ها و قابلیت های پنل ادمین](#ویژگی-ها-و-قابلیت-های-پنل-ادمین)
* [ویژگی ها و قابلیت های پنل کاربر](#ویژگی-ها-و-قابلیت-های-پنل-کاربر)
* [پکیج های استفاده شده](#پکیج-های-استفاده-شده)
* [هلپر فانکشن ها و فایل تنظیمات فروشگاه](#هلپر-فانکشن-ها-و-فایل-تنظیمات-فروشگاه)
* [لیست روابط بین مدل ها](#لیست-روابط-بین-مدل-ها)
* [Faker]()
* [TODO]()
* []()
</details>

<hr>
<details id="intro"> 
<summary><h2>معرفی</h2></summary>
این پروژه توسط `لاراول 9` ایجاد شده و شما میتونید ازین پروژه رایگان استفاده کنید


</details>


##  ساختار دیتابیس

در این پروژه از ورژن ***phpMyAdmin 5.2.0*** استفاده شده است

در عکس زیر می توانید ***ساختار دیتابیس به همراه روابط*** بین جداول را مشاهده نمایید

___

## منوی داینامیک سایت 
* ساختار منوی های سایت به صورت داینامیک می باشد
* ادمین وظیفه تعریف منو و ساب منو ها را بر عهده دارد
* منوها پس از ایجاد در کش ذخیره میشوند تا دیگر نیازی به واکشی داده ها از جدول نباشد
<br>
__پس از هر ویرایش یا ایجاد یک منو کش به صورت خودکار از بین میرود و مجدد با داده های جدید جایگزین می شود__
  
<hr>

## احراز هویت 

کاربران میبایست جهت ثبت نام شماره موبایل خود را ثبت کنند
شماره موبایل باید منحصر به فرد باشد که پس از ثبت شماره موبایل یک کد یکبار مصرف OTP برای کاربر ارسال میشود
که این عملیات شبیه سازی شده و از پنل ارسال پیامک استفاده نشده است
ارسال هر کدتایید 120 ثانیه طول می کشد و کاربر نمیتواند زودتر از این بازه زمانی مجدد درخواست ارسال مجدد کد را داشته باشد

//عکس لاگین و otp  رو بذار

<hr>

## پنل حرفه ای ادمین 

در این پروژه از پنل ادمین Appzia_v2.0 استفاده شده است
>برای دانلود از این [لینک](d) ریپازیتوری استفاده کنید
> 
> پنل ادمین از بوت استرپ 5 استفاده می نماید

``چند نمونه تصویر پنل ادمین``
//عکس پنل ادمین اینجا بذار


## ویژگی ه و قابلیت های پنل ادمین 


### داشبرد 
1. نمایش تعداد محصولات
1. نمایش تعداد کاربران
1. تعداد سفارشات جدید
1. تعداد تمام سفارشات
1. تعداد منو های اصلی سایت


### کامنت 
1. مشاهده جدید ترین کامنت ها
1. امکان حذف کامنت
1.  امکان تایید یا عدم تایید کامنت جهت نمایش کامنت زیر محصول
1. توانایی پاسخ به یک کامنت



### سفارشات 
#### انواع حالت های سفارش 

1. >`new` پس از انتخاب کالا و ثبت آدرس یک order جدید با این وضعیت ایجاد میشود
1. >`paid` هزینه کالا با موفقیت پرداخت گردید
1. >`pending` کالا توسط ادمین تحویل پست داده شده است
1. >`delivered` کالا به دست مشتری رسید
1. >`fail` پرداخت با خطا مواجه شد
1. >`canceled` پردخت توسط کاربر کنسل پردید
   

#### مشاهده تمام سفارشات 
1. نمایش تمام سفارشات 
1. امکان مشاهده جزئیات سفارش نظیر نوع کالا و تعداد کالا به همراه نمایش اطلاعات آدرس و کد تخفیف و مقدار هزینه پرداخت شده و محاسبه مقدار هزینه تخفیف خورده


#### جستجوی یک سفارش 
* ادمین قادر است که یک سفارش را بر حسب Tracking Code یا Payment Code جستجو کند
>Tracking Code پس از پرداخت موفقیت آمیز یک کد به کاربر جهت پیگیری نشان داده می شود
> Payment Code کد برگشتی از درگاه پرداخت مبنی بر پرداخت موفقیت آمیز



### دسته بندی 
1. ایجاد و ویرایش منوی اصلی سایت
2. ایجاد و ویرایش ساب منو ها 
3. تمام موارد فوق به همراه اسلاگ می باشد

### برند 
1. ایجاد و ویرایش برند محصولات
1. آپلود عکس برند

### رنگ 
1. ایجاد و ویرایش رنگ
1. انتخاب کد رنگ به صورت هگزا

### سایز 

1. ایجاد و ویرایش سایز

### شهر و استان 

1. ایجاد و ویرایش شهر
1. ایجاد و ویرایش استان

### تخفیفات 
1. ایجاد و ویرایش تخفیف
1. اختیاری بودن انتخاب بنر تخفیف
1. نمایش تمام تخفیفات
1. انتخاب درصد و زمان شروع و پایان تخفیف
>لازم به ذکر است که چنانچه در سفاراشات یک مشتری محصولی باشد که دارای تخفیف روی محصول on_sale باشد، کد تخفیف بر روی این محصول محاسبه نمی شود اما بر روی سایر محصولات که تخفیف روی محصول on_sale ندارند، لحاظ می گردد

### محصولات 
#### ایجاد یک محصول جدید 
1. انتخاب عنوان و اسلاگ برای محصول
1. انتخاب دسته بندی مادر و دسته بندی فرزند به صورت ایجکس
1. افزودن ویژگی های محصول به صورت داینامیک
1. انتخاب سایز و رنگ کالا (اختیاری)
1. انتخاب برند یک محصول
1. تخصیص ارزش محصول
1. تخصیص هزینه محصول همراه با تخفیف در بازه های زمانی شروع و پایان
1. فعال یا غیر فعال کردن یک محصول
1. انتخاب تصویر(کاور) محصول
1. انتخاب گالری محصولات
1. تخصیص یادداشت خرید
1. درج توضیحات کوتاه محصول
1. درج شرح مفصل محصول در ویرایشگر TinyMce

#### نمایش تمام محصولات 
* نمایش تمام محصولات به همراه pagination




## ویژگی ها و قابلیت های پنل کاربر 
</div>


