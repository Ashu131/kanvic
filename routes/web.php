<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Auth::routes();
Route::get('admin','Auth\LoginController@adminLogin');
Route::get('logout', 'Auth\LoginController@logout');
Route::group(['namespace' => 'Admin','prefix' => 'admin', 'middleware' => 'admin'], function () {

 //Route::get('page/list', 'AdminPageController@getListPage']); 


    Route::get('dfp', ['as' =>'dfp', 'uses' => 'AdminPageController@Dfp']);
    Route::post('dfp', ['as' =>'post.dfp', 'uses' => 'AdminPageController@PostDfp']);


    Route::get('dashboard', 'AdminController@index');
    Route::get('page/create', ['as' =>'get.page.create', 'uses' => 'AdminPageController@getCreatePage']);
    Route::get('page/edit/{page_id}', ['as' => 'get.page.edit', 'uses' => 'AdminPageController@getEditPage']);
    Route::get('page/list', ['as' => 'get.page.list', 'uses' => 'AdminPageController@getListPage']);
    Route::post('page/edit/{page_id}', ['as' => 'post.page.edit', 'uses' => 'AdminPageController@postEditPage']);
    Route::post('page/create', ['as' => 'post.page.create', 'uses' => 'AdminPageController@postCreatePage']);
    Route::get('admin/viewoptions',['as' => 'viewoptions.page', 'uses' => 'AdminPageController@viewOptionsPage']);
    Route::get('get/reset/password',['as' => 'reset.password.view.auth', 'uses' =>'AdminLoginController@resetPasswordView']);
    //Route::any('reset/password',['as' => 'reset.password.view', 'uses' =>'Admin\AdminLoginController@resetPasswordView']);
    Route::post('password/change',['as'=>'reset.password','uses'=>'AdminLoginController@resetPassword']);
    Route::get('menu/type', ['as' => 'show.menu.type', 'uses' => 'AdminMenuController@showMenuType']);
    Route::post('order/menu/{menu_type_id}', ['as' => 'order.menu.single', 'uses' => 'AdminMenuController@orderMenuSingle']);
    Route::post('create/menu/{menu_type_id}', ['as' => 'create.menu.single', 'uses' => 'AdminMenuController@createMenuSingle']);
    Route::get('get/menu/edit/{menu_id}', ['as' => 'get.menu.edit', 'uses' => 'AdminMenuController@getEditMenu']);
    Route::post('menu/edit/{menu_id}', ['as' => 'menu.edit', 'uses' => 'AdminMenuController@editMenu']);
    Route::get('testimonial', ['middleware' => 'auth', 'as' => 'admin.testimonial', 'uses' => 'AdminTestimonialController@getTestimonial']);
    Route::get('testimonial/edit/{id}', ['middleware' => 'auth','as' => 'admin.testimonial.edit', 'uses' => 'AdminTestimonialController@EditTestmonial']);
    Route::post('testimonial/update/{id}', ['middleware' => 'auth', 'as' => 'admin.testimonial.update', 'uses' => 'AdminTestimonialController@UpadateTestimonial']);
    Route::get('testimonialsort', ['middleware' => 'auth', 'as' => 'admin.testimonialsort', 'uses' => 'AdminTestimonialController@TestimonialSort']);
    Route::get('get/testimonial/deletetesti/{id}',['middleware' => 'auth','as'=>'get.testimonial.delete','uses'=>'AdminTestimonialController@DeleteTesti']);
    Route::get('testimonial/create', ['middleware' => 'auth','as' => 'get.testimonial.create', 'uses' => 'AdminTestimonialController@CreateTestimonial']);
    Route::post('testimonial/create', ['middleware' => 'auth','as' => 'testimonial', 'uses' => 'AdminTestimonialController@postTestimonial']);
    Route::get('globalsetting', ['as' => 'globalsetting', 'uses' => 'AdminPageController@ShowGlobalSetting']);
    Route::post('globalupdate', ['as' => 'globalupdate', 'uses' => 'AdminPageController@UpdateGlobal']); 
 

Route::get('get/project/{id}',['middleware' => 'auth','as'=>'get.project.edit','uses'=>'Admin\AdminProjectpageController@getEditProject']);

Route::get('get/project/deletecentre/{id}',['middleware' => 'auth','as'=>'get.project.delete','uses'=>'Admin\AdminProjectpageController@DeleteCentre']);

Route::post('admin/updateproject/{id}',['as'=>'admin.updateproject.page','uses'=>'Admin\AdminProjectpageController@updateProject']);

Route::get('admin/products/create',['middleware' => 'auth','as'=>'view.create.project','uses'=>'Admin\AdminProjectpageController@viewCreateProject']);

Route::post('admin/project/post',['middleware' => 'auth','as'=>'post.create.project','uses'=>'Admin\AdminProjectpageController@postCreateProject']);

Route::get('admin/tasksortable', ['as' => 'admin/tasksortable', 'uses' => 'Admin\AdminProjectpageController@Tasksortable']);


Route::post('test/post',['middleware' => 'auth','as'=>'test.post','uses'=>'AdminBlogController@postTest']);
Route::get('admin/edit/test/{id}',['middleware' => 'auth','as'=>'edit.test.slug','uses'=>'AdminBlogController@editTest']);
Route::post('admin/test/edit/{id}', ['middleware' => 'auth','as' => 'post.test.edit', 'uses' => 'AdminBlogController@postEditTest']);
Route::get('get/test/delete/{id}',['middleware' => 'auth','as'=>'get.test.delete','uses'=>'AdminBlogController@DeleteTest']);


Route::get('admin/event/create',['middleware' => 'auth','as'=>'admin.event.create','uses'=>'AdminBlogController@createEvent']);
Route::post('event/post',['middleware' => 'auth','as'=>'event.post','uses'=>'AdminBlogController@postEvent']);

Route::get('press-release/list', ['middleware' => 'auth','as' => 'get.press-release.list', 'uses' => 'AdminBlogController@PressList']);
Route::get('edit/press-release/{id}',['middleware' => 'auth','as'=>'edit.press-release.slug','uses'=>'AdminBlogController@editPressRelease']);
Route::post('press-release/edit/{id}', ['middleware' => 'auth','as' => 'post.press-release.edit', 'uses' => 'AdminBlogController@UpdatePress']);
Route::get('press-release/create',['middleware' => 'auth','as'=>'press-release.create','uses'=>'AdminBlogController@createPress']);
Route::post('press-release/post',['middleware' => 'auth','as'=>'press-release.post','uses'=>'AdminBlogController@postPress']);
Route::get('admin/event/delete/image/{id}',['as' => 'admin.delete.image.event','uses' => 'Admin\AdminBlogController@deleteEventImage']);


Route::get('admin/gallery/gallerylist',['as'=>'admin.show.gallery.type.list','uses'=>'Admin\AdminGalleryController@showGalleryList']);
Route::get('admin/gallery/gallerytype/{id}',['as'=>'admin.show.gallery.type','uses'=>'Admin\AdminGalleryController@showGalleryType']);
Route::get('admin/gallery/editgallery/{id}',['as'=>'admin.edit.gallery','uses'=>'Admin\AdminGalleryController@showGallery']);
Route::post('admin/gallerypost',['as'=>'gallery.post.page','uses'=>'Admin\AdminGalleryController@postGalleryType']);



Route::get('menu/{menu_type_id}', ['as' => 'show.menu.single', 'uses' => 'AdminMenuController@showMenu']);

Route::get('new/menu', ['as' => 'new.menu', 'uses' => 'Admin\AdminMenuController@newMenu']);

Route::post('create/menu/type', ['as' => 'create.menu.type', 'uses' => 'Admin\AdminMenuController@createMenuType']);





Route::get('form/list', ['as' => 'show.form.list.view', 'uses' => 'Admin\AdminFormMailController@showView']);

Route::get('form/mail/{form_id}', ['as' => 'show.form.view', 'uses' => 'Admin\AdminFormMailController@showForm']);

Route::post('form/mail/post/{form_id}', ['as' => 'form.mail.post', 'uses' => 'Admin\AdminFormMailController@postFormMail']);
Route::get('social/icon', ['as' => 'social.link.view', 'uses' => 'Admin\AdminSocialLinkController@showView']);
Route::post('social/icon/post', ['as' => 'post.social.icon', 'uses' => 'Admin\AdminSocialLinkController@postSocialIcon']);
Route::get('newsletter/list', ['as' => 'newsletter.list', 'uses' => 'Admin\AdminNewsLetterController@showView']);

Route::get('newsletter/download', ['as' => 'download.newsletter', 'uses' => 'Admin\AdminNewsLetterController@downloadList']);


    Route::get('home-slider', 'AdminController@showHomeSlider');
    Route::get('add-new-home-slide', ['as' => 'add.new.home.slide', 'uses' => 'AdminController@addNewHomeSlide']);
    Route::post('save-new-home-slide', ['as' => 'save.new.home.slide', 'uses' => 'AdminController@saveNewHomeSlide']);
    Route::get('admin-edit-home-slide/{id}', ['as'=>'admin-edit-home-slide','uses'=>'AdminController@editHomeSlide']);
    Route::post('update-home-slide', ['as' => 'update.home.slide', 'uses' => 'AdminController@updateHomeSlide']);
    Route::get('home-slide-delete/{id}', ['as' => 'home.slide.delete', 'uses' => 'AdminController@deleteHomeSlide']);


});


Route::get('captcha_src',function(){
    return captcha_src();
});

/**
 * Career Page Route
 */
route::get('career',['as'=>'career', 'uses'=>'ashutosh\CarrerController@index']);

Route::group(['namespace' => 'Web'], function () {

Route::get('event/{slug}',['as'=>'show.event.slug','uses'=>'Admin\AdminBlogController@getEvent']);
Route::get('gallery/{slug}',['as'=>'show.gallery.slug','uses'=>'Admin\AdminBlogController@getGallery']);
Route::get('grey-matter/{slug}',['as'=>'show.grey-matter.slug','uses'=>'PageController@getPress']);
Route::get('case-studies/{slug}',['as'=>'show.case-studies.slug','uses'=>'PageController@ShowCaseStudies']);
Route::post('/subscribe-newsletter', 'PageController@subscribeNewsLetter');

Route::post('submit/form/{form_id}',['as'=>'submit.form','uses'=>'FormController@submitForm']);

Route::get('','PageController@showHome');

Route::get('search',['as'=>'search','uses'=>'PageController@SearchQuery']);

Route::get('{page_slug}',['as'=>'show.page.slug','uses'=>'PageController@showPageBySlug']);

  /*  Route::get('/', 'HomeController@index');
    Route::get('/contact', 'HomeController@contact');
    Route::post('/submit-contact', 'HomeController@submitContact');
    Route::post('/submit-event-remind', 'HomeController@submitEventRemind');
    Route::get('thank-you-contact', 'HomeController@thankYouContact');

    Route::get('search-query', 'ProductController@SearchQuery');

*/

});


