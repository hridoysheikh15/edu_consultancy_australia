<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\Admin\CourseController;
use App\Http\Controllers\Admin\FooterController;
use App\Http\Controllers\Admin\AboutUsController;
use App\Http\Controllers\Admin\ProfileController;
use App\Http\Controllers\Admin\ContactUsController;

use App\Http\Controllers\Admin\DashboardController;
use App\Http\Controllers\Admin\UniversityController;
use App\Http\Controllers\Admin\ScholarshipController;
use App\Http\Controllers\Admin\SiteContentController;
use App\Http\Controllers\Admin\SitesettingController;
use App\Http\Controllers\Admin\SliderImageController;
use App\Http\Controllers\Admin\HeaderSliderController;
use App\Http\Controllers\Admin\StudyDestinationController;
use App\Http\Controllers\front_controllers\HomeController;

// frontend route 
Route::get('/', [HomeController::class, 'index'])->name('index');
Route::prefix('frontend/')->group(function () {
    Route::get('about-us', [HomeController::class, 'about'])->name('about');
    Route::get('destination', [HomeController::class, 'destination'])->name('destination');
    Route::get('universities', [HomeController::class, 'universities'])->name('universities');
    Route::get('courses', [HomeController::class, 'courses'])->name('courses');
    Route::get('scholarship', [HomeController::class, 'scholarship'])->name('scholarship');
});




// backend route
Route::post('/contact-us', [HomeController::class, 'contactUs'])->name('contact_us.store');
Route::post('/subscribe', [HomeController::class, 'subscribe'])->name('frontend.subscribe');

Route::get('/dashboard', [DashboardController::class, 'index'])->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {
    Route::prefix('profile')->name('profile.')->group(function () {
        Route::get('/', [ProfileController::class, 'index'])->name('index');
        Route::post('/update', [ProfileController::class, 'update'])->name('update');
        Route::post('/image/update', [ProfileController::class, 'imageUpdate'])->name('image.update');
        
    });
    Route::prefix('header-slider')->name('slider.')->group(function () {
        Route::get('/', [HeaderSliderController::class, 'index'])->name('index');
        Route::post('/store', [HeaderSliderController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [HeaderSliderController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [HeaderSliderController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [HeaderSliderController::class, 'destroy'])->name('delete');
    });

    Route::prefix('site-contents')->name('site_contents.')->group(function () {
        Route::get('/', [SiteContentController::class, 'index'])->name('index');
        Route::post('/update-section-two', [SiteContentController::class, 'updateSectionTwo'])->name('updateSectionTwo');
        Route::post('/update-section-three', [SiteContentController::class, 'updateSectionThree'])->name('updateSectionThree');
        Route::post('/update-section-four', [SiteContentController::class, 'updateSectionFour'])->name('updateSectionFour');
        Route::post('/update-section-five', [SiteContentController::class, 'updateSectionfive'])->name('updateSectionfive');
    });

    Route::prefix('slider-image')->name('slider_image.')->group(function () {
        Route::get('/', [SliderImageController::class, 'index'])->name('index');
        Route::post('/store', [SliderImageController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [SliderImageController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [SliderImageController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [SliderImageController::class, 'destroy'])->name('delete');
    });

    // Route::prefix('university')->name('university.')->group(function () {
    //     Route::get('/', [UniversityController::class, 'index'])->name('index');
    //     Route::post('/store', [UniversityController::class, 'store'])->name('store');
    //     Route::get('/edit/{id}', [UniversityController::class, 'edit'])->name('edit');
    //     Route::post('/update/{id}', [UniversityController::class, 'update'])->name('update');
    //     Route::delete('/delete/{id}', [UniversityController::class, 'destroy'])->name('delete');
    // });

    Route::prefix('site-setting')->name('site_setting.')->group(function () {
        Route::get('/', [SitesettingController::class, 'index'])->name('index');
        Route::post('/update', [SitesettingController::class, 'update'])->name('update');
    });

    Route::prefix('contact_us')->name('contact_us.')->group(function () {
        Route::get('/', [ContactUsController::class, 'request'])->name('request');
        Route::get('/read/{id}', [ContactUsController::class, 'makeRead'])->name('makeRead');
    });

    Route::prefix('study-destination')->name('study_destination.')->group(function () {
        Route::get('/page-layout', [StudyDestinationController::class, 'pageLayout'])->name('page.layout');
        Route::post('/update/secton-one', [StudyDestinationController::class, 'sectionOneUpdate'])->name('section_one.update');
        Route::post('/update/secton-two', [StudyDestinationController::class, 'sectionTwoUpdate'])->name('section_two.update');
        Route::post('/update/secton-three', [StudyDestinationController::class, 'sectionThreeUpdate'])->name('section_three.update');
        Route::get('/card', [StudyDestinationController::class, 'cardIndex'])->name('card');
        Route::post('/card/store', [StudyDestinationController::class, 'cardStore'])->name('card.store');
        Route::get('/card/edit/{id}', [StudyDestinationController::class, 'cardEdit'])->name('card.edit');
        Route::post('/card/update/{id}', [StudyDestinationController::class, 'cardUpdate'])->name('card.update');
        Route::delete('/card/delete/{id}', [StudyDestinationController::class, 'cardDestroy'])->name('card.delete');
        Route::post('/card/section/heading', [StudyDestinationController::class, 'cardSectionHeading'])->name('card.section.heading');
    });

    Route::prefix('university')->name('university.')->group(function () {
        Route::get('/page-layout', [UniversityController::class, 'pageLayout'])->name('page.layout');
        Route::post('/page-layout', [UniversityController::class, 'updateLayout'])->name('layout.update');
        Route::post('university/logo', [UniversityController::class, 'universityLogo'])->name('logo.store');
        Route::get('university/logo/edit/{id}', [UniversityController::class, 'editLogo'])->name('logo.edit');
        Route::post('university/logo/update/{id}', [UniversityController::class, 'updateLogo'])->name('logo.update');
        Route::delete('university/logo/delete/{id}', [UniversityController::class, 'destroyLogo'])->name('logo.delete');
    
        Route::get('university/card', [UniversityController::class, 'cardIndex'])->name('card');
        Route::post('university/card/layout', [UniversityController::class, 'cardLayout'])->name('card.layout.update');
        Route::post('university/card/store', [UniversityController::class, 'cardStore'])->name('card.store');
        Route::get('university/card/edit/{id}', [UniversityController::class, 'cardEdit'])->name('card.edit');
        Route::post('university/card/update/{id}', [UniversityController::class, 'cardUpdate'])->name('card.update');
        Route::delete('university/card/delete/{id}', [UniversityController::class, 'cardDestroy'])->name('card.delete');
    });

    Route::prefix('course')->name('course.')->group(function () {
        Route::get('/', [CourseController::class, 'index'])->name('index');
        Route::post('/layout/update', [CourseController::class, 'layoutUpdate'])->name('layout.update');
        Route::post('/store', [CourseController::class, 'store'])->name('store');
        Route::get('/edit/{id}', [CourseController::class, 'edit'])->name('edit');
        Route::post('/update/{id}', [CourseController::class, 'update'])->name('update');
        Route::delete('/delete/{id}', [CourseController::class, 'destroy'])->name('delete');
    });

    Route::prefix('scholarship')->name('scholarship.')->group(function () {
        Route::get('/', [ScholarshipController::class, 'index'])->name('index');
        Route::post('/update/secton-one', [ScholarshipController::class, 'sectionOneUpdate'])->name('section_one.update');
        Route::post('/update/secton-two', [ScholarshipController::class, 'sectionTwoUpdate'])->name('section_two.update');
      
    });

    Route::prefix('about-us')->name('about_us.')->group(function () {
        Route::get('/', [AboutUsController::class, 'pageLayout'])->name('page.layout');
        Route::post('/update/secton-one', [AboutUsController::class, 'sectionOneUpdate'])->name('section_one.update');
        Route::post('/update/secton-two', [AboutUsController::class, 'sectionTwoUpdate'])->name('section_two.update');
        Route::get('/card', [AboutUsController::class, 'cardIndex'])->name('card');
        Route::post('/card/layout/update', [AboutUsController::class, 'cardLayoutUpdate'])->name('card.layout.update');
        Route::post('/card/store', [AboutUsController::class, 'cardStore'])->name('card.store');
        Route::get('/card/edit/{id}', [AboutUsController::class, 'cardEdit'])->name('card.edit');
        Route::post('/card/update/{id}', [AboutUsController::class, 'cardUpdate'])->name('card.update');
        Route::delete('/card/delete/{id}', [AboutUsController::class, 'cardDestroy'])->name('card.delete');
    });

    Route::prefix('footer-setting')->name('footer_setting.')->group(function () {
        Route::get('/', [FooterController::class, 'index'])->name('index');
        Route::post('/update', [FooterController::class, 'footerSettingUpdate'])->name('page_layout.update');
        Route::post('/card/store', [FooterController::class, 'cardStore'])->name('card.store');
        Route::get('/card/edit/{id}', [FooterController::class, 'cardEdit'])->name('card.edit');
        Route::post('/card/update/{id}', [FooterController::class, 'cardUpdate'])->name('card.update');
        Route::delete('/card/delete/{id}', [FooterController::class, 'cardDestroy'])->name('card.delete');
    
    
    });
});



require __DIR__.'/auth.php';
