# Laravel REST API with Sanctum

This is an example of a REST API using auth tokens with Laravel Sanctum


## Routes

```
// Public routes
Route::post('/register', [AuthController::class, 'register']);
Route::post('/login', [AuthController::class, 'login']);
Route::post('/add-booking', [BookingController::class, 'createBooking']);


// Protected routes
Route::group(['middleware' => ['auth:sanctum']], function () {
    //admin
    Route::post('/parkir', [ParkirController::class, 'store']);
    Route::put('/parkir/{id_parkir}', [ParkirController::class, 'update']);
    Route::delete('/parkir/{id_parkir}', [ParkirController::class, 'destroy']);
    Route::put('/accept/{id}', [BookingController::class, 'verifikasiPembayaran']);
    //user
    Route::get('/parkir', [ParkirController::class, 'index']);
    Route::get('/parkir/{id_parkir}', [ParkirController::class, 'show']);
    Route::get('/parkir/search/{nama_parkir}', [ParkirController::class, 'search']);
    Route::get('/user', [UserController::class, 'index']);//belum bisa
    Route::get('/user/{id_user}', [UserController::class, 'show']);
    Route::put('/user/{id_user}', [UserController::class, 'update']);
    Route::get('/booking', [BookingController::class, 'getVA']);
    Route::post('/booking/add', [BookingController::class, 'createBooking']);
    Route::get('/riwayat/{id}', [BookingController::class, 'riwayat']);
    Route::delete('/booking/{id}', [BookingController::class, 'cancelBooking']);
    //admin+user
    Route::post('/logout', [AuthController::class, 'logout']);
