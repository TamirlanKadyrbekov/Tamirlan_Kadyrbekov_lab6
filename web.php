<?php
use App\Models\Student;
use Illuminate\Support\Facades\Route;

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


Route::get('/insert', function () {
    DB::insert('insert into students(ID,Name,Date_of_birth,GPA,Advisor) values(?,?,?,?,?)',
    [1,'Tamirlan','2021-03-08',3.3,'Marzhan']);
});

Route::get('/select', function () {
    $result=DB::select('select * from students where id=?',[1]);
    foreach($result as $students)
    {
        echo "ID is: ".$students->ID;
        echo "<br>";
        echo "Name is: ".$students->Name;
        echo "<br>";
        echo "Date of birth: ".$students->Date_of_birth;
        echo "<br>";
        echo "GPA is: ".$students->GPA;
        echo "<br>";
        echo "Advisor is: ".$students->Advisor;
    }
});

Route::get('/update', function () {
    $updated=DB::update('update  students set Advisor="Kuanish" where id=?',[1]);
    return $updated;
});

Route::get('/delete', function () {
    $deleted=DB::delete('delete from students where id=?',[1]);
});

Route::get('/insert2',function(){
    $student=new Student;
    $student->ID=1;
    $student->Name='Bakit';
    $student->Date_of_birth='2021-03-03';
    $student->GPA=3.4;
    $student->Advisor='Marat';
    $student->save();
});

Route::get('/select2',function(){
    $students=Student::all();
    foreach($students as $student){
        echo "ID is: ".$student->ID;
        echo "<br>";
        echo "Name is: ".$student->Name;
        echo "<br>";
        echo "Date of birth: ".$student->Date_of_birth;
        echo "<br>";
        echo "GPA is: ".$student->GPA;
        echo "<br>";
        echo "Advisor is: ".$student->Advisor;
    }
});

Route::get('/update2',function(){
    $student=Student::find(1);
    $student->Name='Baga';
    $student->Date_of_birth='2021-03-06';
    $student->GPA=3.7;
    $student->Advisor='Marzhan';
    $student->save();
});

Route::get('/delete2',function(){
    Student::where('ID',1)->delete();
});

