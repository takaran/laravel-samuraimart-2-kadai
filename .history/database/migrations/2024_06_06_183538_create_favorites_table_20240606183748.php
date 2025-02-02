use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateFavoritesTable extends Migration
{
/**
* Run the migrations.
*
* @return void
*/
public function up()
{
Schema::create('favorites', function (Blueprint $table) {
$table->id();
$table->unsignedBigInteger('user_id');
$table->morphs('favoriteable');
$table->timestamps();

$table->foreign('user_id')->references('id')->on('users')->onDelete('cascade');

$table->unique(['user_id', 'favoriteable_id', 'favoriteable_type']);
});
}

/**
* Reverse the migrations.
*
* @return void
*/
public function down()
{
Schema::dropIfExists('favorites');
}
}